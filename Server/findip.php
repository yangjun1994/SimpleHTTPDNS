<?php
function findip($domain) {
include 'conn.php';
$sql = " SELECT ip from domain WHERE domain='$domain' ORDER BY priority ASC ";

$result = mysqli_query ($conn, $sql);

if($resultline = mysqli_fetch_array($result)) {
return $resultline['ip']; //return the result of highest priority
}
else return null;
}
?>