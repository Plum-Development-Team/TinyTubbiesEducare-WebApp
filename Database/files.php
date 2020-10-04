<?php
    class Files extends Table {

        public function __construct(){
            parent::__construct("file_uploads", "Files");
        }

        public function upload($fileName, $fileType, $fileSize, $fileNewPath){
            return $this->exec(false, "INSERT INTO $this->table_name (file_name, file_type, file_size, file_path) VALUES (?,?,?,?);", "ssss", $fileName, $fileType, $fileSize, $fileNewPath);
        }
    }
?>