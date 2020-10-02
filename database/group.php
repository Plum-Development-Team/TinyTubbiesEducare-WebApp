<?php
    class Group extends Table {
 
        private $name;
     
        public function __construct(){
            parent::__construct("group_chat", "Group");
        }
     
        function getName() {
            return $this->name;
        }
     
        function setName($name) {
            return $this->name = $name;
        }
     
        public function create($type){
            return $this->exec(false, "INSERT INTO $this->table_name (group_type) VALUES (?);", "s", $type);
        }

    }
?>