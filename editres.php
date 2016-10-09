<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Lav noget om her</title>
</head>

<body>
<?php
require_once 'dbcon.php';
$rnam = filter_input(INPUT_POST, 'rnam', FILTER_DEFAULT) or die('Missing/illegal parameter');
$rid = filter_input(INPUT_POST, 'rid', FILTER_VALIDATE_INT) or die('Missing/illegal parameter');


$sql = 'UPDATE resources SET resources_name=? WHERE resources_id=?';
$stmt = $link->prepare($sql);
$stmt->bind_param('si', $rnam, $rid);
$stmt->execute();
if ($stmt->affected_rows >0 ){
	echo 'The resource is now changed';
}
else {
	echo 'No changes, pick another name';
}
?>

<a href="resourceslist.php">Tilbaw til cl13ntl1st3</a><br>


</body>
</html>
