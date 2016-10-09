<?php
const DB_HOST = 'mbsgraphic.dk.mysql';
const DB_USER = 'mbsgraphicdk_';
const DB_PASS = 'youshallnotpass020494';
const DB_NAME = 'mbsgraphicdk_';

$link = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($link->connect_error) {
   die('Connect Error ('.$link->connect_errno.') '.$link->connect_error);
}
$link->set_charset("utf8");
?>
