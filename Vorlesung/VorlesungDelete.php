<?php include_once("../inc/session_check.php");; ?>

<?php
require_once("../Vorlesung/Vorlesung.php");
require_once("../Mapper/VorlesungManager.php");

$id = (int)htmlspecialchars($_GET["Vorlesung_ID"], ENT_QUOTES, "UTF-8");
$VorlesungManager = new VorlesungManager();
$Vorlesung = $VorlesungManager->findById($id);
$VorlesungManager->delete($Vorlesung);

header('Location: ../Vorlesung/Vorlesungsverzeichnis.php');