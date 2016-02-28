<?php
include 'conn.php';

$installsql = "
CREATE TABLE domain (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
domain VARCHAR(30) NOT NULL,
ip VARCHAR(15) NOT NULL,
priority INT(3)
)
"; //Create table

if (mysqli_query($conn, $installsql)) {
    echo "Install Success!";
} else {
    echo "Install Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>