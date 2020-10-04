<?php

require("database/classes.php");

$file_path = $_GET['file_path'];

$result = (new Files)->exec(true, "SELECT * FROM file_uploads WHERE file_path = ? LIMIT 1", 'ss', $file_path);

header("Content-Type:application/octet-stream");
header("Content-Disposition:application;filename=" . basename($file_path));
header("Content-Length:" . filesize($file_path));
readfile($file_path);
