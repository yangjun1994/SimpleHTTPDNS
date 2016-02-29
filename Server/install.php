<?php
include 'conn.php';

$installdomaindbsql = "
CREATE TABLE domain (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
domain VARCHAR(30) NOT NULL,
ip VARCHAR(15) NOT NULL,
priority INT(3)
);

"; //Create Domain table

if (mysqli_query($conn, $installdomaindbsql)) {
    echo "Install Domain DB Success!";
} else {
    echo "Install Error: " . mysqli_error($conn);
}
$installcachedbsql = "
CREATE TABLE cache (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
domain VARCHAR(30) NOT NULL,
ip VARCHAR(15) NOT NULL
);

"; //Create Cache table

if (mysqli_query($conn, $installcachedbsql)) {
    echo "Install Cache DB Success!";
} else {
    echo "Install Error: " . mysqli_error($conn);
}
mysqli_close($conn);
?>