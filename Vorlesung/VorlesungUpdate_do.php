
<?php include("../inc/session_check.php"); ?>
<!DOCTYPE html>
<html>

<body>
<?php
include ("../inc/head.php");
require_once("../Mapper/VorlesungManager.php");
require_once("Vorlesung.php");

$Vorlesung_ID = (int) htmlspecialchars($_POST["Vorlesung_ID"], ENT_QUOTES, "UTF-8");
$Dozent_ID = (int) htmlspecialchars($_POST["Dozent_ID"], ENT_QUOTES, "UTF-8");
$Vorlesung_Name = htmlspecialchars($_POST["Vorlesung_Name"], ENT_QUOTES, "UTF-8");
?>
<div id="standard">
<?php
echo $Vorlesung_ID;
if (!empty($Vorlesung_Name)) {
    $VorlesungManager = new VorlesungManager();
    $Vorlesung = $VorlesungManager->findById($Vorlesung_ID);
    if ($Vorlesung == null) {echo "Fehler";}

    $Vorlesung->Vorlesung_Name = $Vorlesung_Name;

    $VorlesungManager->save($Vorlesung);
    header('Location: Vorlesungsverzeichnis.php');
} else {
    echo "Bitte alle Felder ausf&umlllen!";
}

?>
</div>
</body>