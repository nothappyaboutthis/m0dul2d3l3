<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Satans ressourceliste</title>
</head>

<body>

<h1>Du kan ændre skidtet ved at klik' på det nå</h1>

<ul>
<?php
require_once 'dbcon.php';
$sql = 'SELECT r.resources_id, r.resources_name, rt.resource_type_name
FROM resources r, resource_type rt
where r.resource_type_resource_type_id=rt.resource_type_id';
$stmt = $link->prepare($sql);
$stmt->execute();
$stmt->bind_result($rid, $rnam, $rtnam);

while($stmt->fetch()) {
	echo '<li><a href="editresform.php?rid='.$rid.'">'.$rnam.' ('.$rtnam.')</a></li>'.PHP_EOL;
}


?>
</ul>
<br><br><br>
<a href="projectlist.php">Tilbaw til æ list med æ projekter</a><br>
</body>
</html>
