<?php
defined("PATHNAME") or exit(header("location:../../errors/"));
/**
 * @author Peter Mwambi
 * @time Fri Sep 18 2020 18:24:39 GMT+0300 (East Africa Time)
 * 
 * @content Database constants
 * 
 * 
 * @var string DBHOST
 * 
 * defines the db host. Default is localhost
 */
define("DBHOST", "127.0.0.1");

/**
 * @var string DBUSERNAME
 * 
 * sets the db username. Default is root
 */
define("DBUSERNAME", "root");

/**
 * @var string DBPASSWORD
 * 
 * sets the db password. Default is an empty string
 */
define("DBPASSWORD", "");

/**
 * @var string DBNAME
 * 
 * sets the db name.
 */
define("DBNAME", "adeptdesigners.co.ke");

/**
 * @var array DBOPTIONS
 * 
 * returns a set of db options as an array
 * dafault database fetch mode is set to fetch
 * db data as an associative array. Default
 * Errormode is set to display exceptions and errors 
 * This should only be set in a development server 
 * For production server set Errmode to ERRMODE_SILENT
 */
define("DBCONOPTIONS", [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);


/**
 * Returns Database constants as an array
 */
class Config
{

    /**
     * @var null $constants
     * 
     * Stores the db constants as an array
     */
    private static $constants = null;
    /**
     * @var array $db_table_name
     * 
     * Stores table names found in database
     */
    private static $db_table_names = array(
        "subscribers" => "subscriptions",
        "bio" => "users_bio_info",
        "personal" => "users_personal_info",
    );
    /**
     * @param string $key required
     * @return mixed
     * 
     * Checks if the key passed as a parameter to the function exists
     * if the specified key does not exist, it returns a user level error
     * else it returns the database configuration data as a string
     */
    public static function getConstant($key)
    {
        self::$constants = [
            "host" => DBHOST,
            "username" => DBUSERNAME,
            "password" => DBPASSWORD,
            "dbname" => DBNAME,
            "PDOoptions" => DBCONOPTIONS
        ];
        if (!array_key_exists($key, self::$constants)) {
            return false;
        }
        return self::$constants[$key];
    }

    /**
     * @param string $table_alias 
     * @return string|bool
     * 
     * Returns a database table name when called from an alias. i.e 
     * personal => user_personal_info 
     * bio => users bio info and
     * subscribers => subscription 
     */
    public static function getTable($table_alias)
    {
        if (empty($table_alias)) {
            return false;
        }
        if (!array_key_exists($table_alias, self::$db_table_names)) {
            return false;
        }
        return self::$db_table_names[$table_alias];
    }
}
