<?php
    class Student extends Table {
 
        private $fullname;
        private $email;
     
        function __construct() {
            parent::__construct("student", "Student");
        }
     
        function getName() {
            return $this->fullname;
        }
     
        function setName($fullname) {
            return $this->fullname = $fullname;
        }

        function getEmail() {
            return $this->email;
        }
     
        function setEmail($email) {
            return $this->email = $email;
        }
     
        public function register($id, $firstname, $lastname, $parent, $classroom){
            // check $parent, $classroom
            $this->exec(false, "INSERT INTO $this->table_name (id, fullname, parent, classroom) VALUES (?,?,?,?);", "ssii", 
            $id, "$firstname $lastname", $parent, $classroom);
        }

    }
?>