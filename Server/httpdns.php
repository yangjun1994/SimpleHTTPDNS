<?php
include 'findip.php';
include 'cache.php';

$src = $_GET['src'] ?: null;
$reqdomain = $_GET['domain'] ?: null;
if ($reqdomain != null) {
    $ipfromcachedb = findcacheip($reqdomain) ?: null;
    if ($ipfromcachedb == null) {
        $ipfromdomaindb = finddomainip($reqdomain,$src) ?: null;
        if ($ipfromdomaindb == null) {
            $ipofreqdomain = gethostbyname($reqdomain);
            echojsconformat ($reqdomain, $ipofreqdomain);
            if ($reqdomain != $ipofreqdomain) {
                writecacheip ($reqdomain, $ipofreqdomain);
            }
        }
        else echojsconformat ($reqdomain, $ipfromdomaindb);
    }
    else echojsconformat ($reqdomain, $ipfromcachedb);
}
else echo "Wrong Request!";

function echojsconformat ($domain, $ip) {
    $respondarray = array('domain' => $domain, 'ip' => (($ip != $domain) ? $ip : null));
    $respondjson = json_encode($respondarray);
    echo $respondjson;
}

?>
