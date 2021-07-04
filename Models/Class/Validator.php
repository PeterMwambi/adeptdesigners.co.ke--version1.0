<?php
defined("PATHNAME") === TRUE or exit(header("location:../../errors/"));
/**
 * @author Peter Mwambi
 * @content Validation Class
 * @time Wed Dec 30 2020 10:27:13 GMT+0300 (East Africa Time)
 * @updated on Sat Feb 20 2021 17:50:05 GMT+0300 (East Africa Time)
 * 
 */

class Validator extends Rules
{

    private $passed = false;
    private $errors = [];
    protected $conn = null;
    protected $data = [];

    protected function __construct(array $data, $form = "register")
    {
        parent::__construct($data);
        $this->data = $data;
        $this->conn = Database::getInstance();
        switch ($form) {
            case 'subscription':
                $this->generated_rules["email"]["table"] = "subscriptions";
            case 'login':
                $this->generated_rules["password"]["match-found"] = true;
                $this->generated_rules["username"]["unique"] = false;
            case 'update':
                $this->generated_rules["username"]["update"] = true;
                $this->generated_rules["email"]["update"] = true;
                $this->generated_rules["phone-number"]["update"] = true;
            case 'checkout':
                $this->generated_rules["email"]["table"] = "customers";
                $this->generated_rules["email"]["unique"] = false;
                $this->generated_rules["phone-number"]["unique"] = false;
        }
        $this->processValidation();
    }
    private function processValidation()
    {
        $_rules = $this->generated_rules;
        $data = $this->data;
        foreach ($_rules as $key => $item_value) {
            foreach ($item_value as $rule_key => $rule_value) {
                switch ($rule_key) {
                    case 'required':
                        switch ($item_value["required"]) {
                            case true:
                                if (empty($data[$key])) {
                                    $this->generateErrorMsg("{$item_value["name"]} field cannot be empty");
                                }
                                break;
                        }
                        break;
                    case 'pattern':
                        if ($data[$key] != '' && !preg_match($item_value["pattern"], $data[$key])) {
                            $this->generateErrorMsg("Your {$item_value["name"]} is invalid. Please check the field and try again");
                        }
                        break;
                    case 'min':
                        if ($data[$key] != '' && strlen($data[$key]) < $item_value["min"]) {
                            $this->generateErrorMsg("{$item_value["name"]} cannot be less than {$rule_value} characters");
                        }
                        break;
                    case 'max':
                        if ($data[$key] != '' && strlen($data[$key]) > $item_value["max"]) {
                            $this->generateErrorMsg("{$item_value["name"]} cannot be greater than {$rule_value} characters");
                        }
                        break;
                    case 'constant':
                        if ($data[$key] != '' && !filter_var($data[$key], $item_value["constant"])) {
                            $this->generateErrorMsg("{$item_value["name"]} is invalid");
                        }
                        break;
                    case 'unique':
                        switch ($item_value["unique"]) {
                            case true:
                                if ($data[$key] != '') {
                                    $this->conn->generateSelectQuery(array(str_replace("-", "_", $key)), $item_value["table"], 1, array(str_replace("-", "_", $key), "=", $data[$key]));
                                    $count = $this->conn->getUsercount();
                                    if (isset($item_value["update"]) && $item_value["update"] === true && Session::exists("username")) {
                                        $db_key = str_replace("-", "_", $key);
                                        $this->conn->generateSelectQuery(array(str_replace("-", "_", $key)), $item_value["table"], 1, array("username", "=", Session::getValue("username")));
                                        $count = $this->conn->getUsercount();
                                        $result = $this->conn->getOutput();
                                        if ($result !== false) {
                                            if ($data[$key] !== $result->$db_key) {
                                                if ($count) {
                                                    $this->generateErrorMsg("{$item_value["name"]} already exists. Please choose another one");
                                                } else {
                                                    $this->generateErrorMsg(null);
                                                }
                                            }
                                        }
                                    } elseif ($count) {
                                        $this->generateErrorMsg("{$item_value["name"]} already exists. Please choose another one");
                                    }
                                }
                        }
                        break;
                    case 'matches':
                        if ($data[$key] != '' && $data[$key] != $data[$item_value["matches"]]) {
                            $this->generateErrorMsg("{$item_value["name"]} does not match {$item_value["matches"]}");
                        }
                        break;
                    case 'match-found':
                        switch ($item_value['match-found']) {
                            case true:
                                if ($data[$key] != '') {
                                    $this->conn->generateSelectQuery(array("*"), $item_value["table"], 1, array($item_value['identifier'], "=", Sanitize::__string($data[$item_value['identifier']])));
                                    if ($this->conn->getUsercount()) {
                                        $result = $this->conn->getOutput();
                                        if (!password_verify($data[$key], $result->password)) {
                                            $this->generateErrorMsg("Wrong password");
                                        }
                                    } else
                                        $this->generateErrorMsg("Account does not exist");
                                }
                                break;
                        }
                        break;
                }
            }
        }
        return $this;
    }

    protected function generateErrorMsg($error)
    {
        $this->errors[] = $error;
    }

    /**
     * @param null
     * @return string
     * 
     * Process Validation Errors
     */

    protected function processErrorMsg()
    {
        if (count($this->errors)) {
            foreach ($this->errors as $error) {
                return $error;
            }
        }
        return '';
    }

    /**
     * @param null
     * @return bool
     * 
     * Confirms if validation has succeded. Returns true 
     * if validation has passed otherwise false
     */

    protected function confirmStatus()
    {
        if (empty($this->errors)) {
            $this->passed = true;
        }
        return $this->passed;
    }
}
