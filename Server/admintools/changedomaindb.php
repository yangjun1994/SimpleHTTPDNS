<?php
include '../conn.php';

if (isset($_GET['clear'])) {
    cleardata();
}
if (isset($_GET['delid'])) {
    deldata($_GET['delid']);
}
if (isset($_POST['domain'])) {
    adddata($_POST['domain'], $_POST['ip'], $_POST['priority'], $_POST['src']);
}
echo <<<EOF
<h1>Domain DB</h1>
<table border="1">
<tr>
<th>ID</th>
<th>Domain</th>
<th>IP</th>
<th>Priority</th>
<th>Src</th>
<th>Delete?</th>
</tr>
EOF;

$sql = " SELECT id, domain, ip, priority, src from domain ";

$result = mysqli_query ($conn, $sql);

while($resultline = mysqli_fetch_array($result)) {
    echo '<tr>
    <td>'.$resultline['id'].'</td>
    <td>'.$resultline['domain'].'</td>
    <td>'.$resultline['ip'].'</td>
    <td>'.$resultline['priority'].'</td>
    <td>'.$resultline['src'].'</td>
    <td>'."<a href=".$_SERVER['PHP_SELF']."?delid=".$resultline['id'].">delete</a>".'</td>
    </tr>';

}
echo '</table>';
echo '
<form action="'.$_SERVER['PHP_SELF'].'" method="post">
Add Domain: <input type="text" name="domain">
IP: <input type="text" name="ip">
Priority: <input type="text" name="priority">
Src: <input type="text" name="src">
<input type="submit">
</form>
';
echo "<a href=".$_SERVER['PHP_SELF']."?clear=1>Clear <b>ALL</b> data</a>";

function deldata($id) {
    include '../conn.php';
    $sql = " DELETE from domain WHERE id=$id ";
    mysqli_query ($conn, $sql);
}

function cleardata() {
    include '../conn.php';
    $sql = "truncate table domain";
    mysqli_query ($conn, $sql);
}

function adddata($domain, $ip, $priority, $src) {
    include '../conn.php';
    $sql = " INSERT into domain (domain, ip, priority, src) VALUES ('$domain','$ip','$priority','$src') ";
    mysqli_query ($conn, $sql);
}
?>