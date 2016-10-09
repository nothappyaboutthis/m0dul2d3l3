<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Slet æ ressource</title>
</head>

<body>

<?php
$rid = filter_input(INPUT_POST, 'rid', FILTER_VALIDATE_INT) or die ('Missing/illegal parameter');
$pid = filter_input(INPUT_POST, 'pid', FILTER_VALIDATE_INT) or die ('Missing/illegal parameter');
require_once 'dbcon.php';
$sql = 'DELETE FROM project_has_resources WHERE resources_resources_id=? AND project_project_id=?';
$stmt = $link->prepare($sql);
$stmt->bind_param('ii', $rid, $pid);
$stmt->execute();
if ($stmt->affected_rows >0 ){
	echo 'Resource deleted from project';
}
else {
	echo 'No change - The resource does not exists';
}
?>
<br>
<a href="projectdetails.php?pid=<?=$pid?>">Detaljer om projekt her ik</a>
</body>
</html>
