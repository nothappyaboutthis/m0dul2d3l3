<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>KliÆntlist3</title>
</head>

<body>
<h2>cli3ntz</h2>
<?php
require_once 'dbcon.php';
$sql = 'SELECT c.client_id, c.client_name FROM client c';
$stmt = $link->prepare($sql);
$stmt->execute();
$stmt->bind_result($cid, $cnam);
while($stmt->fetch()) {
	echo '<li><a href="clientdetails.php?cid='.$cid.'">'.$cnam.'</a></li>'.PHP_EOL;
}


?>

</body>
</html>
