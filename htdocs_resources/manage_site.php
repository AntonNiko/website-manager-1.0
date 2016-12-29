<?php 
$statusStr = file_get_contents('C:\xampp\htdocs_resources\status.json');
$json = json_decode($statusStr,true);

$underMaintenance = (bool) $json['maintenance'];
