<?php
define("PATHNAME", TRUE);
require_once "../Models/Config/Core.php";
// error_reporting(0);

class Rules
{
    protected $generated_rules = array();
    protected $rule_keys = array();


    private $rules = [
        "username" => [
            "required" => true,
            "name" => "Username",
            "min" => 2,
            "max" => 20,
            "pattern" => "/^[A-Za-z]*$/",
            "table" => "users_bio_info",
            "exists" => true,
            "match-found" => false,
            "identifier" => "username"
        ],
        "firstname" => [
            "required" => true,
            "name" => "Firstname",
            "min" => 2,
            "max" => 20,
            "pattern" => "/^[A-Za-z]*$/",
        ],
        "lastname" => [
            "required" => true,
            "name" => "Lastname",
            "min" => 2,
            "max" => 20,
            "pattern" => "/^[A-Za-z]*$/",
        ],
        "email" => [
            "required" => true,
            "name" => "Email",
            "exists" => true,
            "constant" => FILTER_VALIDATE_EMAIL,
            "table" => "users_bio_info"
        ],
        "password" => [
            "name" => "Password",
            "required" => true,
            "pattern" => "/^[0-9A-Za-z$@#%!*?_,]*$/",
            "min" => 6,
            "table" => "users_bio_info",
            "match-found" => false,
            "identifier" => "username"
        ],
        "confirm-password" => [
            "required" => true,
            "name" => "Confirm password",
            "matches" => "password"
        ],
        "phone-number" => [
            "required" => false,
            "name" => "Phone number",
            "pattern" => "/^[0-9]{9,10}$/"
        ],
        "gender" => [
            "name" => "Gender",
            "required" => false,
            "values" => array("male", "female", "rather-not-say")
        ],
        "relation" => [
            "name" => "Kin",
            "required" => false,
            "values" => array("Mother", "Father", "Spouse", "Friend")
        ],
        "contact-mode" => [
            "required" => false,
            "name" => "Contact mode",
            "values" => array("Email", "Mobile")
        ],
        "nickname" => [
            "name" => "Nickname",
            "required" => true,
            "pattern" => "/^[a-zA-Z]*$/",
            "min" => 2,
            "max" => 20
        ],
    ];

    protected function __construct(array $data)
    {
        $this->data_keys[] = array_keys($data);
        foreach ($this->data_keys as $data_key => $keys) {
            foreach (array_values($keys) as $key) {
                if (!array_key_exists($key, $this->rules)) {
                    unset($data[$key]);
                    $this->data_keys = array_keys($data);
                } else
                    array_push($this->generated_rules, $this->rules[$key]);
            }
            if (count($this->generated_rules)) {
                $_keys = array_keys($this->generated_rules);
                $values = array_values($this->generated_rules);
                $_keys = array_replace($_keys, $this->data_keys);
                $this->generated_rules = array_combine($_keys, $values);
            }
        }
        return $this;
    }
}
class Validator extends Rules
{

    private $passed = false;
    private $errors = [];
    private $conn = null;
    protected $data = [];

    public function __construct(array $data, $form = "register")
    {
        if (count($data)) {
            array_pop($data);
            parent::__construct($data);
            $this->data = $data;
            $this->conn = Database::getInstance();
            switch ($form) {
                case 'subscription':
                    $this->generated_rules["email"]["table"] = "subscriptions";
                    break;
                case 'login':
                    $this->generated_rules["username"]["match-found"] = true;
                    $this->generated_rules["password"]["match-found"] = true;
                    $this->generated_rules["username"]["exists"] = false;
                    break;
            }
            $this->validate();
        }
        return false;
    }
    private function validate()
    {
        $_rules = $this->generated_rules;
        $data = $this->data;
        foreach ($_rules as $key => $item_value) {
            foreach ($item_value as $rule_key => $rule_value) {
                switch ($rule_key) {
                    case 'required':
                        if (empty($data[$key])) {
                            $this->generateErrorMsg("{$item_value["name"]} field cannot be empty");
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
                    case 'exists':
                        switch ($item_value["exists"]) {
                            case true;
                                if ($data[$key] != '') {
                                    $this->conn->generateSelectQuery(array($key), $item_value["table"], 1, array($key, "=", $data[$key]));
                                    $count = $this->conn->getUserCount();
                                    if ($count) {
                                        $this->generateErrorMsg("{$item_value["name"]} already exists. Please choose another one");
                                    }
                                    break;
                                }
                        }
                        break;
                    case 'matches':
                        if ($data[$key] != '' && $data[$key] != $data[$item_value["matches"]]) {
                            $this->generateErrorMsg("{$item_value["name"]} does not match {$item_value["matches"]}");
                        }
                        break;
                        // case 'match-found':
                        // switch ($item_value['match-found']) {
                        //     case true:
                        //         if ($data[$key] != '') {
                        //             $this->conn->generateSelectQuery(array("*"), $item_value["table"], 1, array($item_value['identifier'], "=", $data[$item_value['identifier']]));
                        //             if ($this->conn->getUserCount()) {
                        //                 $result = $this->conn->factory__DBgetOutput();
                        //                 if (!password_verify($data[$key], $result->password)) {
                        //                     $this->generateErrorMsg("Wrong password");
                        //                 }
                        //             }
                        //             $this->generateErrorMsg("Account does not exist");
                        //         }
                        //         break;
                        // }
                        // break;
                }
            }
        }
        return $this;
    }
    private function generateErrorMsg($error)
    {
        $this->errors[] = $error;
    }


    public function outputErrorToGUI()
    {
        if (count($this->errors)) {
            $this->errors = array_unique($this->errors);
            foreach ($this->errors as $error) {
                return $error;
            }
        }
    }

    public function confirmStatus()
    {
        if (empty($this->errors)) {
            $this->passed = true;
        }
        return $this->passed;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <style>
        body {
            padding: 0;
            margin: 0;
            display: flex;
        }

        .form-container {
            display: flex;
            min-height: 60vh;
            justify-content: center;
            margin: 0 auto;
            width: 100%;
            background: lightblue;
            box-sizing: border-box;
        }

        .form-input-wrapper {
            display: block;
            width: 100%;
            padding: 1rem 1rem 1rem 1rem;
        }

        .form-input {
            width: 100%;
            padding: 0.5rem 0.5rem 0.5rem 0.5rem;
            border: 1px solid black;
            background: transparent;
            transition: ease-in 0.3s;
            border-radius: 5px;
        }

        .form-input:focus {
            box-shadow: 0 0 3pt 2pt red;
            border: 1px solid lightskyblue;
            border-radius: 5px;
        }

        .form-button {
            width: 100%;
            padding: 1rem 1rem 1rem 1rem;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <?php
        $token = Token::createInstance("TOKEN");
        if (Input::getdata()) {
            if ($token->validate(Input::grab("login-token"))) {
                $authenticator = new Authenticator($_POST, "login");
                if (!$authenticator->assertStatus()) {
                    echo $authenticator->getErrorMsg();
                }
                if ($authenticator->authenticateUserSignIn()) {
                    $authenticationKey = $authenticator->getAuthKey();
                    if (isset($authenticationKey)) {
                        header("location:test.php?auth=" . $authenticationKey);
                    }
                }
                //Redirect to some error message page
            }
        }
        ?>
        <form action="" method="post">
            <div class="form-input-wrapper">
                <label for="username">Username:</label>
                <input type="text" name="username" class="form-input" value="<?php ?>">
                <span class="form-message" name="usernameErr"></span>
            </div>
            <!-- <div class="form-input-wrapper">
                <label for="email">Email:</label>
                <input type="text" name="email" class="form-input" value="<?php ?>">
                <span class="form-message" name="emailErr"></span>
            </div> -->
            <div class="form-input-wrapper">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-input" value="<?php ?>">
                <span class="form-message" name="passwordeErr"></span>
            </div>
            <!-- <div class="form-input-wrapper">
                <label for="confirm-password">Confirm-password:</label>
                <input type="password" name="confirm-password" class="form-input" value="<?php ?>">
                <span class="form-message" name="confirm-passwordeErr"></span>
            </div> -->

            <input type="hidden" name="login-token" value="<?php echo $token->getOutput(); ?>">
            <div class="form-input-wrapper">
                <input type="submit" name="login" value="register" class="form-button">
            </div>
        </form>
    </div>
    <div class="form-container">
        <?php  ?>
        <form action="" method="post">
            <div class="form-input-wrapper">
                <label for="firstname">Firstname</label>
                <input type="text" name="firstname" class="form-input">
                <span class="form-message" name="usernameErr"></span>
            </div>
            <div class="form-input-wrapper">
                <label for="Lastname">Lastname:</label>
                <input type="text" name="lastname" class="form-input">
                <span class="form-message" name="lastnameErr"></span>
            </div>
            <div class="form-input-wrapper">
                <label for="confirm-password">Nickname:</label>
                <input type="password" name="nickname" class="form-input">
                <span class="form-message" name="confirm-passwordeErr"></span>
            </div>

            <div class="form-input-wrapper">
                <input type="submit" name="update" value="Update &raquo" class="form-button">
            </div>
        </form>
    </div>
</body>

</html>