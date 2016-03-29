<?php
function finddomainip($domain,$src) {
    include 'conn.php';
    if($src == null) {
        $sql = " SELECT id, ip, priority from domain WHERE domain = '$domain' ORDER BY priority ASC ";
    }
    else {
        $sql = " SELECT id, ip, priority from domain WHERE domain = '$domain' and src = '$src' ORDER BY priority ASC ";
    }
    $result = mysqli_query ($conn, $sql);

    if($resultline = mysqli_fetch_array($result)) {
        $newpriority = $resultline['priority']+1;
        $id = $resultline['id'];
        $changesql = "UPDATE domain SET priority = '$newpriority' WHERE id ='$id' ";
        mysqli_query ($conn, $changesql);
        return $resultline['ip'];
    }
    else return null;
}

function findcacheip($domain) {
    include 'conn.php';
    $sql = " SELECT ip from cache WHERE domain ='$domain' ";
    $result = mysqli_query ($conn, $sql);

    if($resultline = mysqli_fetch_array($result)) {
       return $resultline['ip'];
    }
    else return null;
}
?>