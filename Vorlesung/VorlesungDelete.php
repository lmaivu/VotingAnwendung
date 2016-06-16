<?php include_once("../inc/session_check.php");; ?>

<?php
require_once("../Vorlesung/Vorlesung.php");
require_once("../Mapper/VorlesungManager.php");

$Vorlesung_ID = (int)htmlspecialchars($_GET["Vorlesung_ID"], ENT_QUOTES, "UTF-8");
$VorlesungManager = new VorlesungManager();
$Vorlesung = $VorlesungManager->findById($Vorlesung_ID);
$VorlesungManager->delete($Vorlesung);

echo "Die Vorlesung wurde erfolgreich gelöscht.";
header('Location: ../Vorlesung/Vorlesungsverzeichnis.php');