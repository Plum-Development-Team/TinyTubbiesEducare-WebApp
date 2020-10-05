<?php

define("FETCH_ONE", false);

abstract class Database
{
    protected static $user = 'root';
    protected static $pass = '';
    protected static $host = 'localhost';
    protected static $name = 'tinytubbieseducare';

    public static function get_connection()
    {
        $mysqli = new  mysqli(self::$host, self::$user, self::$pass, self::$name);

        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            exit();
        }
        return $mysqli;

    }
}

abstract class Table
{


    public $id;
    protected $table_name, $class_name;

    public function __construct($table_name, $class_name)
    {
        if (isset($id)) $this->id = $id;
        $this->class_name = $class_name;
        $this->table_name = $table_name;
    }

    public static function result($mysqli_result, $class_name = "stdClass", $fetch_all = true)
    {
        $result = null;
        if (gettype($mysqli_result) === "boolean") $result = $mysqli_result;
        else {
            if ($fetch_all) while ($data = $mysqli_result->fetch_object($class_name)) {
                $result[] = $data;
            } else $result = $mysqli_result->fetch_object($class_name);
        }
        unset($mysqli_result);
        return $result;
    }

    //delete an id from any table
    public function delete($id)
    {
        return self::query("DELETE FROM $this->table_name  WHERE id = $id;");
    }

    //database helper function to for the queries
    public static function query($statement, $class_name = "stdClass", $fetch_all = true)
    {
        $con = Database::get_connection();
        $result = self::result($con->query($statement), $class_name, $fetch_all);
        unset($con);
    //    var_dump($statement, $result);
        return $result;
    }

    public function exec($fetch_all, $statement, ...$args)
    {

        $result = null;
        $con = Database::get_connection();
        $query = $con->prepare($statement);
        if (gettype($query) === 'boolean') $result = $query;
        else {
            call_user_func_array(array($query, 'bind_param'), self::ref($args));
            if ($query->execute()) {
                $result = self::result($query->get_result(), $this->class_name, $fetch_all);
            }
        }
        unset($con, $query);
//        var_dump($statement, $result, ...$args);
        return $result;
    }

    //function gets all information from the database 
    public function getAll(&$array = null)
    {
        $result = self::query("SELECT * FROM $this->table_name;", $this->class_name);
        if (isset($array)) $array = $result;
        return $result;
    }

    //getting an id from any table

    /**
     * @param $id
     * @return mixed|array|null|false
     */
    public function getById($id)
    {
        return $this->exec(false, "SELECT * FROM $this->table_name WHERE id = ?;", "i", $id);
    }

    //getting from a table where
    public function getWhere($statement, ...$args)
    {
        return $this->exec(true, "SELECT * FROM $this->table_name WHERE $statement;", ...$args);
    }


    public static function ref($arr)
    {
        if (strnatcmp(phpversion(), '5.3') >= 0) {
            $refs = array();
            foreach ($arr as $key => $value)
                $refs[$key] = &$arr[$key];
            return $refs;
        }
        return $arr;
    }
}