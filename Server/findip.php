<?php
function finddomainip($domain) { //find domain's ip in domain db
    include 'conn.php';
    $sql = " SELECT ip from domain WHERE domain='$domain' ORDER BY priority ASC ";

    $result = mysqli_query ($conn, $sql);

    if($resultline = mysqli_fetch_array($result)) {
        return $resultline['ip']; //return the result of highest priority
    }
    else return null;
}

function findcacheip($domain) { //find domain's ip in cache db
    include 'conn.php';
    $sql = " SELECT ip from cache WHERE domain='$domain' ";

    $result = mysqli_query ($conn, $sql);

    if($resultline = mysqli_fetch_array($result)) {
       return $resultline['ip']; //return the result
    }
    else return null;
}
?>