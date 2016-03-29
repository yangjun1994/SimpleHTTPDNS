<?php
include 'config.php';

$conn = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connect Error!");
}
?>