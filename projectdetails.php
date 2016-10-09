<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Deltajer om æ projekt</title>
</head>

<body>

<?php
$pid = filter_input(INPUT_GET, 'pid', FILTER_VALIDATE_INT) or die('Missing/illegal parameter');

require_once 'dbcon.php';
$sql = 'SELECT p.project_id, p.project_name, p.project_startdate, p.project_enddate, p.project_detail
FROM project p
WHERE p.project_id=?';
$stmt = $link->prepare($sql);
$stmt->bind_param('i', $pid);
$stmt->execute();
$stmt->bind_result($pid, $pnam, $psd, $ped, $pdetail);

while($stmt->fetch()) { }
?>
<h1><?=$pnam?></h1>
<p>
Start daw: <?=$psd?><br>
Slut daw: <?=$ped?><br>
</p>
<p>Smid en kommentar hvis du lyster: <?=$pdetail?></p>

<h2>Æ Ressourcer</h2>

<ul>
<?php
require_once 'dbcon.php';
$pid = filter_input(INPUT_GET, 'pid', FILTER_VALIDATE_INT) or die('Missing/illegal parameter');
$sql = 'SELECT r.resources_id, r.resources_name, rt.resource_type_name
FROM project_has_resources pr, resources r, resource_type rt
WHERE pr.project_project_id=?
AND pr.resources_resources_id = r.resources_id
AND rt.resource_type_id = r.resource_type_resource_type_id';
$stmt = $link->prepare($sql);
$stmt->bind_param('i', $pid);
$stmt->execute();
$stmt->bind_result($rid, $rnam, $rtnam);

while($stmt->fetch()) {
	echo '<li><a href="resourceslist.php?rid='.$rid.'">'.$rnam.','.$rtnam.'</a>';

?>

<!-- Delete form -->

<form action="deleteresourcefromproject.php" method="post">
<input type="hidden" name="pid" value="<?=$pid?>">
<input type="hidden" name="rid" value="<?=$rid?>">
<input type="submit" value="Delete">
</form>
	<?php
	echo '</li>';
	}
	?>
</ul>

<!-- Tilføj skidtet til projektet -->

<form action="addresourcetoproject.php" method="post">
	<input type="hidden" name="pid" value="<?=$pid?>">
    <select name="rid">

<?php
require_once 'dbcon.php';

$sql = 'SELECT r.resources_id, r.resources_name, rt. resource_type_name
FROM resources r, resource_type rt
WHERE r.resource_type_resource_type_id = rt.resource_type_id';
$stmt = $link->prepare($sql);
$stmt->execute();
$stmt->bind_result($rid, $rnam, $rtnam);

while($stmt->fetch()) {
echo '<option value="'.$rid.'">'.$rnam.' - '.$rtnam.'</option>'.PHP_EOL;
}
?>
</select>
<input type="submit" value="add">
</form>
</ul>

<h2>Her er lidt klienter da</h2>
<ul>
<?php
require_once 'dbcon.php';
$pid = filter_input(INPUT_GET, 'pid', FILTER_VALIDATE_INT) or die('Missing/illegal parameter');
$sql = 'SELECT c.client_id, c.client_name
FROM client c, project p
WHERE p.project_id=?
AND c.client_id = p.client_client_id';
$stmt = $link->prepare($sql);
$stmt->bind_param('i', $pid);
$stmt->execute();
$stmt->bind_result($cid, $cnam);
while($stmt->fetch()) {
echo '<li><a href="clientdetails.php?cid='.$cid.'">'.$cnam.'</a></li>';
}
?>
<br><br><br>
<a href="projectlist.php?pid=<?=$pid?>">Her findes æ liste over projekter. Føj</a><br>

</ul>
</body>
</html>
