<?php
    class Classroom extends Table{
 
        private $name;
     
        function __construct() {
            parent::__construct("classroom", "Classroom");
        }
     
        function getName() {
            return $this->name;
        }
     
        function setName($name) {
            return $this->name = $name;
        }

        public function create($title, $teacher, $group_chat){
            return $this->exec(false, "INSERT INTO $this->table_name (title, teacher, group_chat) VALUES (?,?,?)", "sii", 
            $title, $teacher, $group_chat);
        }
     
    }
?>