<?php

/**
 * @author Peter Mwambi
 * @time Sun Nov 22 2020 14:37:18 GMT+0300 (East Africa Time)
 * @content Sanitize library
 */
defined("PATHNAME") or exit(header("location:../../errors/"));

class Sanitize
{

    public static function __string($data)
    {
        $data = htmlspecialchars($data);
        $data = trim(strip_tags($data));
        $data = htmlentities($data, ENT_QUOTES, "UTF-8");
        $invalidChars = ["'", "<", "\""];
        $data = str_replace($invalidChars, '', $data);
        return $data;
    }
    public static function __int($data)
    {
        $data = filter_var($data, FILTER_VALIDATE_INT);
        return $data;
    }
    public static function __bool($data)
    {
        $data = filter_var($data, FILTER_VALIDATE_BOOLEAN);
        return $data;
    }
    public static function __email($email)
    {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        return $email;
    }
}
