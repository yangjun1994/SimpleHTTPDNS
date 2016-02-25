<?php
$reqdomain = $_GET["domain"] ?? null;
if ($reqdomain != null) {
    $ipofreqdomain = gethostbyname($reqdomain);
    $respondarray = array('domain' => $reqdomain, 'ip' => (($ipofreqdomain != $reqdomain) ? $ipofreqdomain : null));
    $respondjson = json_encode($respondarray);
    echo $respondjson;
}
else echo "Wrong Request!";
?>