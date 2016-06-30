<?php
include("../inc/session_check.php");
require_once ("DozentManager.php");
require_once("Dozent.php");


$hash = htmlspecialchars($_POST["hash"], ENT_QUOTES, "UTF-8");
$hash2 = htmlspecialchars($_POST["hash2"], ENT_QUOTES, "UTF-8");
$Dozent_ID = htmlspecialchars($_POST["Dozent_ID"], ENT_QUOTES, "UTF-8");

echo "$hash";
echo "$hash2";
echo "$Dozent_ID";
$hash = password_hash($hash, PASSWORD_DEFAULT);


//$DozentManager = new DozentManager();
//$DozentManager->updatePassword($dozent);

if ($hash==$hash2) {
    $daten = [
        "hash" => $hash,
        "Dozent_ID" => $Dozent_ID,

    ];
    $dozent = new Dozent($daten);
    $DozentManager = new DozentManager();
    $DozentManager->savePassword($dozent);
    echo "Sie haben Ihr Passwort erfolgreich ge&aumlndert. </br>
    Zum Fortfahren melden Sie sich bitte erneut an.";
} else {
    echo " Bitte alle Felder ausf&uumlllen!<br/> Erneut Versuchen.";}?>
<a href= "DozentPasswort_Form.php"> Passwort ändern </a>

<br>

<a href= "../index.php"> Anmeldeseite </a>





