<?php
include 'findip.php';
include 'cache.php';

$reqdomain = $_GET['domain'] ?? null; //Get Method?
if ($reqdomain != null) { //Request format right?
    $ipfromdomaindb = finddomainip($reqdomain) ?? null; //In Domain DB?
    if ($ipfromdomaindb == null) { //If not in Domain DB
        $ipfromcachedb = findcacheip($reqdomain) ?? null; //In Cache DB?
        if ($ipfromcachedb == null) { //If not in Cache DB
            $ipofreqdomain = gethostbyname($reqdomain);
            echojsconformat ($reqdomain, $ipofreqdomain);
            writecacheip ($reqdomain, $ipofreqdomain);
        }
        else echojsconformat ($reqdomain, $ipfromcachedb); //If in Cache DB
    }
    else echojsconformat ($reqdomain, $ipfromdomaindb); //If in Domain DB
}
else echo "Wrong Request!";

function echojsconformat ($domain, $ip) {
    $respondarray = array('domain' => $domain, 'ip' => (($ip != $domain) ? $ip : null));
    $respondjson = json_encode($respondarray);
    echo $respondjson;
}

?>