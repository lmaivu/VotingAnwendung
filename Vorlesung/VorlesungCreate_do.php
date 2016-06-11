<?php include("../inc/session_check.php"); ?>

<?php
require_once("../Mapper/VorlesungManager.php");
require_once("Vorlesung.php");

$Vorlesung_ID = htmlspecialchars($_POST["Vorlesung_ID"], ENT_QUOTES, "UTF-8");
$Vorlesung_Name = htmlspecialchars($_POST["Vorlesung_Name"], ENT_QUOTES, "UTF-8");
$Dozent_ID = htmlspecialchars($_POST["Dozent_ID"], ENT_QUOTES, "UTF-8");

if (!empty($Vorlesung_Name)  ) {
    $vorlesungdaten = [
        "Vorlesung_Name" => $Vorlesung_Name,
        "Dozent_ID" => $Dozent_ID,

    ];
    $Vorlesung = new Vorlesung($vorlesungdaten);
    $VorlesungManager = new VorlesungManager();
    $VorlesungManager->save($Vorlesung);
    header('Location: ../Vorlesung/Vorlesungsverzeichnis.php');
} else {
    echo "Error: Bitte alle Felder ausf&uumlllen!<br/>";}
