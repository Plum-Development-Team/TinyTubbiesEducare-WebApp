<?php

    define('ONLINE', 1);
    define('OFFLINE', 0);

    class User extends Table {
 
        private $name, $is_loggedin;

        public function __construct()
        {
            parent::__construct("user", "User");
        }
     
        function getName() {
            return $this->name;
        }
     
        function setName($name) {
            return $this->name = $name;
        }
    
        public  function register($firstname, $lastname, $email, $password){
            return $this->exec(false, "INSERT INTO $this->table_name (fullname, email, password_hash) VALUES (?,?,?);", "sss", 
            "$firstname $lastname", $email, password_hash($password, PASSWORD_BCRYPT));
        }



        public function getByEmail($email){
            return $this->exec(false, "SELECT * FROM $this->table_name WHERE email = ?;", "s", $email);
        }

        public function setLogin($status){
            if(gettype($this->id) === "integer" && isset($this->id)) {
                $this->is_loggedin = true;
                return $this->exec(false, "UPDATE user SET is_loggedin = ? WHERE id = ?;", "ii", $status, $this->id);
            }
        }

        public function isLoggedin(){
            return $this->is_loggedin;
        }

        public static function status(){
            return self::query("SELECT id, fullname, (SELECT IF(is_loggedin < 1 , '-o', '')) as icon, (SELECT IF(is_loggedin < 1 , 'Offline', 'Online')) as `status`  FROM user;");
        }
    }


?>