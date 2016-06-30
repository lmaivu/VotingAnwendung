<?php
include("../inc/session_check.php");
require_once ("DozentManager.php");
require_once("Dozent.php");


$hash = htmlspecialchars($_POST["hash"], ENT_QUOTES, "UTF-8");
$hash2 = htmlspecialchars($_POST["hash2"], ENT_QUOTES, "UTF-8");
$Dozent_ID = htmlspecialchars($_POST["Dozent_ID"], ENT_QUOTES, "UTF-8");


$hash = password_hash($hash, PASSWORD_DEFAULT);

$dozent = new Dozent($dozentdaten);
$DozentManager = new DozentManager();
$DozentManager->updatePassword($dozent);

if (!empty($hash)  ) {
    $daten = [
        "hash" => $hash,
        "Dozent_ID" => $Dozent_ID,

    ];
    $Dozent = new Dozent($daten);
    $DozentManager = new DozentManager();
    $DozentManager->savePassword($Dozent);
    echo "Sie haben Ihr Passwort erfolgreich ge&aumlndert. </br>
    Zum Fortfahren melden Sie sich bitte erneut an.";
} else {
    echo " Bitte alle Felder ausf&uumlllen!<br/>";}
?>



<a href= "../index.php"> Anmeldeseite </a>



