<?php


class Authenticator extends Validator
{
    /**
     * Authentication Token
     * @var string $auth_token
     * 
     * Stores page authentication keys
     */

    private $auth_token = null;


    private $file_handler = null;



    /**
     * @param array $data - Data to be validated
     * @param string $form - Form generating data
     * 
     * Gets validation rules from the parent constructor
     * and performs validation on form data. Calls
     * an instance of the database connection
     */

    public function __construct(array $data, $form = "register")
    {
        parent::__construct($data, $form);
        $this->file_handler = new File;
    }

    /**
     * Output Error Message to GUI
     * @param null
     * @return string
     * 
     * Returns validation error messages from the parent
     * validator class
     * 
     */
    public function getMsg($message_control = null)
    {
        switch ($message_control) {
            case "file-upload-error":
                return $this->file_handler->outputToGUI();
                break;
            default:
                return $this->processErrorMsg();
                break;
        }
    }

    /**
     * Confirmation Status
     * @param null
     * @return bool
     * 
     * Checks if validation has succeeded and returns true
     * otherwise returns false
     */
    public function assertStatus()
    {
        return $this->confirmStatus();
    }

    /**
     * Create New Profile
     * @param null
     * @return bool
     * 
     * Check if a new user profile has been added to the 
     * database and return true if succeeded otherwise
     * returns false
     */

    public function createNewUserProfile()
    {
        if ($this->processNewUserProfile()) {
            return true;
        }
        return false;
    }
    /**
     * Login Authentication
     * @param null
     * @return bool
     * 
     * Checks if user login authentication has succeeded
     * and returns true otherwise returns false
     */

    public function authenticateUserSignIn()
    {
        if ($this->processUserLogin()) {
            return true;
        }
        return false;
    }

    /**
     * Account Recovery Authentication
     * @param null
     * @return bool
     * 
     * Checks if user account recovery has succeeded and returns
     * true otherwise returns false
     */

    public function autheticateAccountRecovery()
    {
        if ($this->processAccountRecovery()) {
            return true;
        }
        return false;
    }

    /**
     * Subscription Authentication
     * @param null
     * @return bool
     * 
     * Checks if user email subscription has succeeded and returns
     * true otherwise returns false
     */

    public function authenticateUserSubscription()
    {
        if ($this->processUserSubscription()) {
            return true;
        }
        return false;
    }


    public function authenticateContactInfoUpdate()
    {
        if ($this->processContactInfoUpdate()) {
            return true;
        }
        return false;
    }

    public function authenticatePersonalInfoUpdate()
    {
        if ($this->processPersonalInfoUpdate()) {
            return true;
        }
        return false;
    }

    public function authenticatePasswordUpdate()
    {
        if ($this->processPasswordUpdate()) {
            return true;
        }
        return false;
    }
    public function authenticateAdminProcessAdd()
    {
        if ($this->adminProcessAdd()) {
            return true;
        }
        return false;
    }
    public function authenticateCheckout()
    {
        if ($this->processCheckOut()) {
            return true;
        }
        return false;
    }

    public function generateUploadRequest($fileName, $targetDir)
    {
        if (!$this->callNewUpload($fileName, $targetDir)) {
            return false;
        }
        return true;
    }

    /**
     * Display Auth Key
     * @param null
     * @return string
     * 
     * Returns a generated authentication key
     */
    public function getAuthKey()
    {
        return $this->generateAuthKey();
    }

    /**
     * Generate Auth Key
     * @param null
     * @return string
     * 
     * Generates an authentication key
     */

    private function generateAuthKey()
    {
        return $this->auth_token = Token::createInstance("AUTHENTICATION_TOKEN")->getToken();
    }

    /**
     * @param null 
     * @return bool 
     * 
     * Authenticates a loggin in user and creates a 
     * new user session if validation has passed otherwise
     * returns false if user has not been authenticated 
     */
    private function processUserLogin()
    {
        if ($this->confirmStatus()) {
            if ($this->generateAuthKey()) {
                Session::generate("AUTHENTICATION_KEY", Functions::encrypt($this->auth_token));
            }
            $login_time = date("g") . ":" . date("i") . " " . date("A");
            $login_day = date("l");
            $login_date = date("F") . " " . date("j") . " " . date("Y");
            Session::generate("username", Sanitize::__string($this->data["username"]));
            Session::generate("password", Sanitize::__string($this->data["password"]));
            Session::generate("USER_PASSKEY", $this->auth_token);
            $result = $this->conn->generateSelectQuery(array("user_id"), "users_bio_info", 1, array("username", "=", Session::getValue("username")))->getOutput();
            Session::generate("user_id", $result->user_id);
            $this->conn->generateUpdateQuery("users_bio_info", array("login_time" => $login_time, "login_day" => $login_day, "login_date" => $login_date, "login_status" => "Active"), array(Session::getValue("username")));
            return true;
        }
        return false;
    }

    /**
     * @param null
     * @return bool
     * 
     * Adds a new user to the database and returns true on a
     * successful query otherwise false when query fails
     */

    private function processNewUserProfile()
    {
        if ($this->confirmStatus()) {
            $username = Sanitize::__string($this->data["username"]);
            $user_id = sanitize::__string("ADPT-" . rand(100, 1000) . "-USR-" . rand(200, 500));
            $login_time = date("g") . ":" . date("i") . " " . date("A");
            $login_day = date("l");
            $login_date = date("F") . " " . date("d") . " " . date("Y");
            $time_joined = date("g") . ":" . date("i") . " " . date("A");
            $day_joined_int = date("j");
            $day_joined = date("l");
            $month_joined = date("F");
            $year_joined = date("Y");
            $phone_number = Sanitize::__string($this->data['phone-number']);
            $email = Sanitize::__email($this->data["email"]);
            $password = password_hash(Sanitize::__string($this->data["password"]), PASSWORD_DEFAULT);
            $profileArray = array(
                "user_id" => $user_id, "login_day" => $login_day,
                "login_date" => $login_date, "login_time" => $login_time,
                "login_status" => "Active", "day_joined" => $day_joined,
                "day_joined_int" => $day_joined_int, "month_joined" => $month_joined,
                "year_joined" => $year_joined, "time_joined" => $time_joined,
                "username" => $username, "email" => $email, "phone_number" => $phone_number,
                "password" => $password
            );
            if ($this->generateAuthKey()) {
                Session::generate("AUTHENTICATION_KEY", Functions::encrypt($this->auth_token));
            }
            $this->conn->generateInsertQuery("users_bio_info", $profileArray);
            $this->conn->generateInsertQuery("users_personal_info", array("user_id" => $user_id));
            Session::generate("username", Sanitize::__string($this->data["username"]));
            Session::generate("password", Sanitize::__string($this->data["password"]));
            Session::generate("USER_PASSKEY", $this->auth_token);
            Session::generate("user_id", $user_id);
            Session::generate("registering-user", true);
            Session::generate("registering-user-id", $user_id);
            return true;
        }
    }
    /**
     * @param null
     * @return bool
     * 
     * Sends recovery email with link to forgotten user account
     */

    private function processAccountRecovery()
    {
        if ($this->confirmStatus()) {
            //Send email to user account
            return true;
        }
        return false;
    }
    /**
     * @param null
     * @return bool
     * 
     * Insert user email to subscription table 
     * and returns true if insert query was successful
     * Otherwise returns false
     */
    private function processUserSubscription()
    {
        if ($this->confirmStatus()) {
            $email = Sanitize::__email($this->data["email"]);
            $profileArray = array("email" => $email,);
            $this->conn->generateInsertQuery("subscriptions", $profileArray);
            return true;
        }
        return false;
    }

    private function processContactInfoUpdate()
    {
        if ($this->confirmStatus() && Session::exists("username")) {
            $username = Sanitize::__string($this->data["username"]);
            $mobile_number = Sanitize::__string($this->data["phone-number"]);
            $email = Sanitize::__string($this->data["email"]);
            $nickname = Sanitize::__string($this->data["nickname"]);
            $this->conn->generateSelectQuery(array("*"), "users_bio_info", 1, array("username", "=", Session::getValue("username")));
            $result = $this->conn->getOutput();
            if ($result !== null) {
                if (!empty($username) && $username !== $result->username) {
                    $this->conn->generateUpdateQuery("users_bio_info", array("username" => $username), array(Session::getValue("username")));
                }
                if (!empty($mobile_number) && $mobile_number !== $result->phone_number) {
                    $this->conn->generateUpdateQuery("users_bio_info", array("phone_number" => $mobile_number), array(Session::getValue("username")));
                }
                if (!empty($email) && $email !== $result->email) {
                    $this->conn->generateUpdateQuery("users_bio_info", array("email" => $email), array(Session::getValue("username")));
                }
                if (!empty($nickname) && $nickname !== $result->nickname) {
                    $this->conn->generateUpdateQuery("users_bio_info", array("nickname" => $nickname), array(Session::getValue("username")));
                }
                return true;
            }
        }
        return false;
    }
    private function processPersonalInfoUpdate()
    {
        if ($this->confirmStatus() && Session::exists("user_id")) {
            $firstname = Sanitize::__string(Input::grab("firstname"));
            $lastname = Sanitize::__string(Input::grab("lastname"));
            $gender = Sanitize::__string(Input::grab("gender"));
            $day = Sanitize::__string(Input::grab("day"));
            $month = Sanitize::__string(Input::grab("month"));
            $year = Sanitize::__string(Input::grab("year"));
            $this->conn->generateSelectQuery(array("*"), "users_personal_info", 1, array("user_id", "=", Session::getValue("user_id")));
            $result = $this->conn->getOutput();
            if ($result !== null) {
                if (!empty($firstname) && $firstname !== $result->firstname) {
                    $this->conn->generateUpdateQuery("users_personal_info", array("firstname" => $firstname), array(Session::getValue("user_id")));
                }
                if (!empty($lastname) && $lastname !== $result->lastname) {
                    $this->conn->generateUpdateQuery("users_personal_info", array("lastname" => $lastname), array(Session::getValue("user_id")));
                }
                if (!empty($gender) && $gender !== $result->gender) {
                    $this->conn->generateUpdateQuery("users_personal_info", array("gender" => $gender), array(Session::getValue("user_id")));
                }
                if (!empty($day) && $day !== $result->birth_day) {
                    $this->conn->generateUpdateQuery("users_personal_info", array("birth_day" => $day), array(Session::getValue("user_id")));
                }
                if (!empty($month) && $month !== $result->birth_month) {
                    $this->conn->generateUpdateQuery("users_personal_info", array("birth_month" => $month), array(Session::getValue("user_id")));
                }
                if (!empty($year) && $year !== $result->birth_year) {
                    $this->conn->generateUpdateQuery("users_personal_info", array("birth_year" => $year), array(Session::getValue("user_id")));
                }
                return true;
            }
        }
        return false;
    }
    private function processPasswordUpdate()
    {
        if ($this->confirmStatus() && Session::exists("username")) {
            $password = password_hash(Sanitize::__string($this->data["password"]), PASSWORD_DEFAULT);
            Session::generate("password", Sanitize::__string($this->data["password"]));
            $this->conn->generateSelectQuery(array("*"), "users_bio_info", 1, array("username", "=", Session::getValue("username")));
            $result = $this->conn->getOutput();
            if ($result !== null) {
                if (!empty($password) && $password !== $result->password) {
                    $this->conn->generateUpdateQuery("users_bio_info", array("password" => $password), array(Session::getValue("username")));
                }
                return true;
            }
        }
        return false;
    }
    private function processCheckOut()
    {
        if ($this->confirmStatus() && Session::exists("cart")) {
            $order_id = uniqid(rand(10000, 99999));
            $firstname = Sanitize::__string(ucfirst($this->data["firstname"]));
            $date = date("d") . "/" . date("n") . "/" . date("Y");
            $time = date("g") . " : " . date("i") . " " . date("A");
            $lastname = Sanitize::__string(ucfirst($this->data["lastname"]));
            $name = $firstname . " " . $lastname;
            $email = Sanitize::__string($this->data["email"]);
            $paymentMethod = isset($this->data["payment-mode"]) ? Sanitize::__string($this->data["payment-mode"]) : null;
            $amountPaid = Sanitize::__int(Session::getValue("total_price"));
            $phoneNumber = Sanitize::__string($this->data["phone-number"]);
            $national_id = Sanitize::__string($this->data["national-id"]);
            $orders = Session::exists("cart") ? Session::getValue("cart") : null;
            Session::generate("order_id", $order_id);
            Session::generate("name", $name);
            Session::generate("email", $email);
            Session::generate("phone_number", $phoneNumber);
            Session::generate("national_id", $national_id);
            $customer_data = array("order_id" => $order_id, "date" => $date, "time" => $time, "national_id" => $national_id, "amount_paid" => $amountPaid, "name" => $name, "email" => $email, "phone_number" => $phoneNumber, "payment_method" => $paymentMethod,  "payment_status" => "Pending");
            if ($this->conn->generateInsertQuery("customers", $customer_data)) {
                foreach ($orders as $order) {
                    $productId = $order["items"]["id"];
                    $productName = json_encode($order["items"]);
                    $quantity = $order["items"]["quantity"];
                    $totalPrice = Session::getValue("total_price");
                    $orders_data = array("order_id" => $order_id, "date" => $date, "time" => $time, "product_id" => $productId, "product_name" => $productName, "quantity" => $quantity, "total_price" => $totalPrice, "payment_status" => "pending");
                    $this->conn->generateInsertQuery("orders", $orders_data);
                    return true;
                }
            }
            return false;
        }
        return false;
    }
    private function adminProcessAdd()
    {
        if ($this->confirmStatus() && isset($this->file_id)) {
            $product_name = Sanitize::__string($this->data["product-name"]);
            $product_description = Sanitize::__string($this->data["product-description"]);
            $product_price = Sanitize::__string($this->data["product-price"]);
            $product_cartegory = Sanitize::__string($this->data["product-cartegory"]);
            $product_data = array("product_name" => $product_name, "product_description" => $product_description, "price" => $product_price, "product_status" => "Avilable", "product_cartegory" => $product_cartegory);
            $this->conn->generateUpdateQuery("products", $product_data, array("product_id" => $this->file_id));
            return true;
        }
        return false;
    }
    private function callNewUpload($fileName, $targetDir)
    {
        if (!$this->file_handler->getUploadRequest($fileName, $targetDir)) {
            return false;
        }
        if (!$this->file_handler->processUploadRequest()) {
            return false;
        }
        if (!$this->file_handler->processDbUpload("products", "product_url")) {
            return false;
        }
        return true;
    }
}
