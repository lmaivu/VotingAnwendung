<?php
include("../inc/session_check.php");
include("../inc/head.php");
require_once ("DozentManager.php");
require_once("Dozent.php");


$hash = htmlspecialchars($_POST["hash"], ENT_QUOTES, "UTF-8");
$hash2 = htmlspecialchars($_POST["hash2"], ENT_QUOTES, "UTF-8");
$Dozent_ID = (int) htmlspecialchars($_POST["Dozent_ID"], ENT_QUOTES, "UTF-8");


if ($hash == $hash2 && !empty($hash) && !empty($hash2)) {
    $hash = password_hash($hash, PASSWORD_DEFAULT);
    $hash2 = password_hash($hash2, PASSWORD_DEFAULT);

    $DozentManager = new DozentManager();
    $dozent = $DozentManager->findById($Dozent_ID);

    $dozent->hash = $hash;
    $dozent->Dozent_ID = $Dozent_ID;

    //echo "<br>Neuer Dozent: " . $dozent->hash . "<br>" . $dozent->Dozent_ID . "<br>";

    $DozentManager->update($dozent);
    //header('Location: startseite.php');
    // echo "<br>Neuer Pasword-Hash: " . $hash;
    echo "Sie haben Ihr Passwort erfolgreich geändert. Melden Sie sich bitte erneut an";?> <br> <?php
    echo "<a href= ../index.php> Zur&uumlck zur Anmeldeseite </a> ";
}
else { ?>
    <div class="Fehlermeldung">
        <?php echo "Bitte alle Felder ausfüllen oder die Passwörter stimmen nicht überein.<br/>"; ?> <br>
        <a href="../Mapper/DozentPasswort_Form.php"> Zurück </a> <?php } ?>
    </div>





