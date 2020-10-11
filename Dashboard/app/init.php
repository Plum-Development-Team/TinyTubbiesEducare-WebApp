<?php
//session_start();
$_SESSION['user_id'] = 5;

$db = new PDO('mysql:dbname=tinytubbieseducare;host=localhost', 'root', '');

if (!isset($_SESSION['user_id'])) {
    die('You are not signed in');
}
