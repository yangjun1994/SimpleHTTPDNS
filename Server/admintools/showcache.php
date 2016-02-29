<?php
include '../conn.php';
include '../cache.php';
if (isset($_GET['clear'])) {
    clearcache();
}
echo <<<EOF
<h1>Cache</h1>
<table border="1">
<tr>
<th>Domain</th>
<th>IP</th>
</tr>
EOF;

$sql = " SELECT domain, ip from cache ";

$result = mysqli_query ($conn, $sql);

while($resultline = mysqli_fetch_array($result)) {
    echo '<tr>
    <td>'.$resultline['domain'].'</td>
    <td>'.$resultline['ip'].'</td>
    </tr>';

}
echo '</table>';
echo "<a href=".$_SERVER['PHP_SELF']."?clear=1>Clear Cache</a>";
?>