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
<!DOCTYPE html>

<html lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Lagrenge的导航页">
    <meta name="author" content="Lagrenge">
    <meta name="theme-color" content="#0099cc">

    <title>Domain DB</title>

    <link href="https://www.lagtea.com/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://www.lagtea.com/css/lagtea.css" rel="stylesheet">
    <link href="./i.css" rel="stylesheet">
    <script src="https://www.lagtea.com/js/ie-emulation-modes-warning.js"></script>
</head>

<body>
    <div class="container-fluid">
<h1>Domain DB</h1>
<table class="table table-striped">
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
<form class="form-group" action="'.$_SERVER['PHP_SELF'].'" method="post">
Add Domain: <input class="form-control" type="text" name="domain">
IP: <input class="form-control" type="text" name="ip">
Priority: <input class="form-control" type="text" name="priority">
Src: <input class="form-control" type="text" name="src">
<input class="btn btn-default" type="submit">
</form>
';
echo "<a class='btn btn-danger' href=".$_SERVER['PHP_SELF']."?clear=1>Clear <b>ALL</b> data</a>";


echo <<<EOF

        <footer>
            <p>© Lagrenge 2016-2017</p>
        </footer>
    </div>
    <script src="https://www.lagtea.com/js/jquery.min.js"></script>
    <script src="https://www.lagtea.com/js/bootstrap.min.js"></script>
    <script src="https://www.lagtea.com/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
EOF;








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