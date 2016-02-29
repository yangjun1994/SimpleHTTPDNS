<?php
function writecacheip($domain, $ip) {
    include 'conn.php';
    $sql = " INSERT into cache (domain, ip) VALUES ('$domain','$ip') ";
    mysqli_query ($conn, $sql);
}

function clearcache() {
    include 'conn.php';
    $sql = "truncate table cache";
    mysqli_query ($conn, $sql);
}
?>