<?php
include 'findip.php';

$reqdomain = $_GET['domain'] ?? null; //Get Method?
if ($reqdomain != null) { //Request format right?
    $ipfromdb = findip($reqdomain) ?? null; //In DB?
    if ($ipfromdb == null){ //If not in DB
        $ipofreqdomain = gethostbyname($reqdomain);
        $respondarray = array('domain' => $reqdomain, 'ip' => (($ipofreqdomain != $reqdomain) ? $ipofreqdomain : null));
        $respondjson = json_encode($respondarray);
        echo $respondjson;
    }
    else echo $ipfromdb; //If in DB
}
else echo "Wrong Request!";
?>