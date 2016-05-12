<!-- zum Löschen von Daten, die sich in der Zwischentabelle Voting und Vorlesung befinden -->

<!--nicht nötig-->

<?php //include("../inc/session_check.php"); ?>

<?php
require_once("Mapper/NotizLeserManager.php");

$leser_id = (int)htmlspecialchars($_GET["leser_id"], ENT_QUOTES, "UTF-8");
$notiz_id = (int)htmlspecialchars($_GET["notiz_id"], ENT_QUOTES, "UTF-8");

$notizLeserManager = new NotizLeserManager();
$notizLeserManager->deleteNotizLeserById($notiz_id, $leser_id);

$location = "Location: LeserRead.php?leser_id=$leser_id";
header($location);
?>



