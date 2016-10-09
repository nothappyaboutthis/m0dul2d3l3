<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Æ list over æ projekter</title>
</head>

<body>
<h1>Her er de pokkers projekter så</h1>
<ul>
<?php
require_once 'dbcon.php';
$sql = 'SELECT p.project_id, p.project_name FROM project p';
$stmt = $link->prepare($sql);
$stmt->execute();
$stmt->bind_result($pid, $pnam);
while($stmt->fetch()) {
	echo '<li><a href="projectdetails.php?pid='.$pid.'">'.$pnam.'</a></li>'.PHP_EOL;
}
?>
</ul>

</body>
</html>
