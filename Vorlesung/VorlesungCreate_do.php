<?php //include("../inc/session_check.php"); ?>

<?php
require_once("../Mapper/VorlesungManager.php");
require_once("Vorlesung.php");

$Voting_ID = htmlspecialchars($_POST["Vorlesung_ID"], ENT_QUOTES, "UTF-8");
$Vorlesung_Name = htmlspecialchars($_POST["Vorlesung_Name"], ENT_QUOTES, "UTF-8");


if (!empty($Vorlesung_Name)  ) {
    $vorlesungdaten = [
        "Vorlesung_Name" => $Vorlesung_Name,

    ];
    $Vorlesung = new Vorlesung($vorlesungdaten);
    $VorlesungManager = new VorlesungManager();
    $VorlesungManager->save($Vorlesung);
    header('Location: ../Vorlesung/Vorlesungverzeichnis.php');
} else {
    echo "Error: Bitte alle Felder ausf&uumlllen!<br/>";}
