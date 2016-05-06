<?php
include '../conn.php';
include '../cache.php';
if (isset($_GET['clear'])) {
    clearcache();
}
echo <<<EOF
<!DOCTYPE html>

<html lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Cache">
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
<h1>Cache</h1>
<table class="table table-striped" >
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
echo "<a class='btn btn-danger' href=".$_SERVER['PHP_SELF']."?clear=1>Clear Cache</a>";
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
?>