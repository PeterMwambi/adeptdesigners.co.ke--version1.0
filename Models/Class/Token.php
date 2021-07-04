<?php

/**
 * @author Peter Mwambi
 * @date Wed Sep 23 2020 21:49:59 GMT+0300 (East Africa Time)
 * @content CSRF protection class
 * Generates CSRF protection tokens
 */

class Token
{

    /**
     * @var string $token_name
     * 
     * The token name
     */
    private $token_name = null;

    /**
     * @var string $token
     * 
     * The token generated
     */
    private $token = null;

    /**
     * @var string $_instance
     * 
     * Instance of the token class
     */

    private static $instance = null;

    /**
     * Token Constructor
     * @param string $token_name
     * Generates a random token string and stores it 
     * in the static token variable. 
     */

    private function __construct($token_name)
    {
        $this->token_name = $token_name;
        $private_key = $token_name . session_id() . uniqid() . rand(1000, 10000);
        $this->token = hash_hmac("sha256", bin2hex(random_bytes(128)), $private_key);
    }

    /**
     * Token Instance
     * @param string $token_name
     * @return string/false 
     * 
     * Checks the token name, if the token is not a string it returns false.
     * This function also sets the token name and returns the token class
     * as an instance
     */

    public static function createInstance(string $token_name)
    {
        if (is_string($token_name)) {
            if (!isset(self::$instance)) {
                self::$instance = new Token($token_name);
            }
            return self::$instance;
        }
        return false;
    }

    public function getToken()
    {
        if (false !== $this->generate()) {
            return $this->generate();
        }
        return false;
    }

    /**
     * Token GUI display
     * @param null
     * @return string/false
     * 
     * Checks if the token variable is set, stores the 
     * contents of the token variable in a session and returns
     * the generated token as a string. If the token variable is not
     * set it returns false.
     */
    private function generate()
    {
        if (isset($this->token)) {
            $encrypted_token = Functions::encrypt($this->token);
            Session::generate($this->token_name, $encrypted_token);
            if (Session::exists($this->token_name)) {
                return $this->token;
            }
            return false;
        }
        return false;
    }

    /**
     * Token Validator
     * @param string $token the token to validate
     * @return bool
     * 
     * Gets the set token value and checks wheter it is a string. The function
     * compares it with the value stored in the token name 
     * Session. If the value is correct it returns true otherwise false
     * 
     */

    public function validate(string $token)
    {
        if (isset($token) && is_string($token)) {
            if (!Session::exists($this->token_name)) {
                return false;
            }
            $stored_token = Functions::decrypt(Session::getValue($this->token_name));
            if (!hash_equals($stored_token, $token)) {
                return false;
            }
            if (Session::destroy($this->token_name)) {
                return true;
            }
        }
        return false;
    }

    public static function compare($known_string, $user_string)
    {
        if (!empty($known_string) && !empty($user_string)) {
            if (!hash_equals($known_string, $user_string)) {
                return false;
            }
            return true;
        }
    }
}
