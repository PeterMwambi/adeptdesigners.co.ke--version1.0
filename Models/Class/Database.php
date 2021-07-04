<?php
defined("PATHNAME") or exit(header("location:../../errors/"));

/**
 * @author Peter Mwambi
 * @date Fri Sep 18 2020 18:03:29 GMT+0300 (East Africa Time)
 * @updated on Wed Apr 28 2021 01:22:15 GMT+0300 (East Africa Time)
 * @content Database connection class
 */

class Database
{


    private $conn = null;

    /**
     * @var null $instance
     * 
     * Creates a new database instance
     */
    private static $instance = null;

    /**
     * @var null $stmt
     * 
     * The query to be executed by the result set
     */
    private $stmt = null;

    /**
     * @var bool $errors
     * 
     * Returns errors if there are any with database queries 
     */

    private $errors = false;

    /**
     * @var null $results
     * 
     * Returns results from the database
     */
    private $results = null;

    /**
     * @var int $count
     * 
     * Returns the count of database results
     */

    private $count = 0;

    /**
     * @param null
     * @return string
     * 
     * Private Database construct to limit the number 
     * of database connections. Returns the database connection string 
     */

    private function __construct()
    {
        try {
            $this->conn = new PDO(
                "mysql:host=" . Config::getConstant("host") .
                    ";dbname=" . Config::getConstant("dbname"),
                Config::getConstant("username"),
                Config::getConstant("password"),
                Config::getConstant("PDOoptions")
            );
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param null
     * @return mixed
     * 
     * Returns the database instance as a singleton object
     */

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Database;
        }
        return self::$instance;
    }

    /**
     * @param string $sql The SQL string
     * @param array $params The parameters to be executed in the SQL stmt
     * @param int $fetch Flow control. Sets the fetch mode i.e. 1. fetch(), 0.fetchAll, null return no results. 
     * @return object the current object
     * 
     * 
     * Binds parameters to their values and exequtes the SQL stmt
     * Returning the results and their count
     */


    public function buildQuery($sql, $params = array(), $fetch = 0)
    {
        $this->errors = false;
        $this->stmt = $this->conn->prepare($sql);
        if (count($params)) {
            $x = 1;
            $i = 0;
            foreach ($params  as $param) {
                $this->stmt->bindParam($x, $params[$i]);
                $x++;
                $i++;
            }
        }
        if ($this->stmt->execute()) {
            $this->count = $this->stmt->rowCount();
            if ($fetch === 0) {
                $this->results = $this->stmt->fetchAll();
            }
            if ($fetch === 1) {
                $this->results = $this->stmt->fetch();
            }
            if (is_null($fetch)) {
                $this->count = 0;
                $this->results = null;
            }
        } else {
            $this->errors = true;
        }
        return $this;
    }

    /**
     * @param string $action action to be performed aganist DB
     * @param string $table  table affected by the SQL action
     * @param array $where  field and value effected by the SQL action
     * @param string $fetch  the fetch mode
     * @param array $join_clause The SQL join clause
     * @param array  $db_conditional_query_factory conditional statement
     * 
     * Executes an SQL statement and returns the results;
     */

    private function action(
        $action,
        $table,
        $fetch = 0,
        $where = array(),
        $join_clause = array(),
        $db_conditional_query_factory = array()
    ) {
        if (count($where) === 3) {
            $operators = array("<", ">", "=", "<=", ">=");
            $field = $where[0];
            $operator = $where[1];
            $value = $where[2]; //string
            if (in_array($operator, $operators)) {
                $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";
                if (count($db_conditional_query_factory) === 4) {
                    $db_conditional_operator = $db_conditional_query_factory[0];
                    $conditional_field = $db_conditional_query_factory[1];
                    $conditional_operator = $db_conditional_query_factory[2];
                    $conditional_value = $db_conditional_query_factory[3];
                    $sql = "{$action}FROM{$table} WHERE {$field}{$operator} ?
                     {$db_conditional_operator}
                      {$conditional_field}
                      {$conditional_operator}
                      ?";
                    if (!$this->buildQuery($sql, array($value, $fetch, $conditional_value, $fetch))->error()) {
                        return $this;
                    }
                }
                if (count($join_clause)) {
                    $join_key = array_keys($join_clause);
                    $join_values = array_values($join_clause);
                    $join_type = $join_key[0];
                    $join_table_1 = $join_values[0];
                    $join_position = $join_key[1];
                    $join_columns = $join_values[1];

                    $sql = "{$action} FROM {$table} {$join_type} {$join_table_1} {$join_position} {$join_columns} WHERE {$field} {$operator} ?";
                }
                if (!$this->buildQuery($sql, array($value), $fetch)->error()) {
                    return $this;
                }
            }
        } else {
            $sql = "{$action} FROM {$table}";
            if (!$this->buildQuery($sql, array(), $fetch)->error()) {
                return $this;
            }
        }
        return false;
    }

    /**
     * @param string $table
     * @param string $where
     * @param int $fetch
     * @param array $where
     * @param array $join_clause
     * @param array $db_conditional_query_factory_builder
     * 
     * Returns a set of results from a select query
     */

    public function generateSelectQuery(
        $action_fields = array(),
        $table,
        $fetch = 0,
        $where = array(),
        $join_clause = array(),
        $db_conditional_query_factory_builder = array()
    ) {
        if (count($action_fields)) {
            $action_field_value = '';
            $x = 1;
            foreach ($action_fields as $action_field) {
                $action_field_value .= $action_field;
                if ($x < count($action_fields)) {
                    $action_field_value .= ', ';
                }
                $x++;
            }
            if (count($where)) {
                if (count($join_clause)) {
                    return $this->action("SELECT {$action_field_value}", $table, $fetch, $where, $join_clause);
                }
                if (count($db_conditional_query_factory_builder)) {
                    return $this->action("SELECT {$action_field_value}", $table, $fetch, $where, $join_clause, $db_conditional_query_factory_builder);
                }
                return $this->action("SELECT {$action_field_value}", $table, $fetch, $where);
            } else {
                return $this->action("SELECT {$action_field_value}", $table, $fetch);
            }
            return false;
        }
    }

    /**
     * @param string $table
     * @param array $where
     * 
     * Deletes an item from the database 
     */

    public function generateDeleteQuery($table, $where)
    {
        return $this->action("DELETE", $table, null, $where);
    }

    /**
     * @param string $table table affected by the SQL stmt
     * @param array $fields fields affected and values to be inserted to DB
     * 
     * Inserts an item to the database
     */

    public function generateInsertQuery($table, $fields = array())
    {
        if (count($fields)) {
            $keys = array_keys($fields);
            $values = '';
            $x = 1;
            foreach ($fields as $field) {
                $values .= '?';
                if ($x < count($fields)) {
                    $values .= ',';
                }
                $x++;
            }
            $sql = "INSERT into {$table} (`" . implode('`, `', $keys) . "`) VALUES({$values})";
            if (!$this->buildQuery($sql, array_values($fields), null)->error()) {
                return $this;
            }
            die("false");
        }
        return false;
    }

    /**
     * @param string $table table affected by the SQL stmt
     * @param array $fields fields affected and values to be updated to DB
     * @param array $update_fields field and value
     * 
     * Updates a single record stored in the database
     */
    public function generateUpdateQuery($table, $fields = array(), $update_identifier = array())
    {
        if (count($fields)) {
            $set = "";
            $x = 1;
            foreach ($fields as $field => $value) {
                $set .= "{$field} = ?";
                if ($x < count($fields)) {
                    $set .= ", ";
                }
                $x++;
            }
            if (count($update_identifier)) {
                $where = "";
                foreach ($update_identifier as $update_field => $update_value) {
                    $where .= "{$update_field} = ?";
                }
                $sql = "UPDATE {$table} SET {$set} WHERE {$where}";
                array_push($fields, $update_value);
                if (!$this->buildQuery($sql, array_values($fields), null)->error()) {
                    return true;
                }
            }
            return false;
        }
        return false;
    }

    /**
     * @param null
     * 
     * Returns errors made by the SQL queries
     */
    public function error()
    {
        return $this->errors;
    }

    /**
     * @param null
     * 
     * Returns the count of elements in the DB
     */
    public function getUserCount()
    {
        return $this->count;
    }

    /**
     * @param null
     * 
     * Returns the results of the Database
     */
    public function getOutput()
    {
        return $this->results;
    }
}
