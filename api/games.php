<?php
require('../include/db.php');

$sql = "SELECT * FROM examgames";

$cmd->execute();
$games = $cmd->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($games);
$db = null;
?>