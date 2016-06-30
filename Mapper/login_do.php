<!DOCTYPE html>
<html>

<?php
require_once("Manager.php");
require ("DozentManager.php");
require_once("Dozent.php");


$login = htmlspecialchars($_POST["login"], ENT_QUOTES, "UTF-8");
$hash = htmlspecialchars($_POST["hash"], ENT_QUOTES, "UTF-8");
/*$hash=password_hash($password, PASSWORD_DEFAULT);//PW hashen
$hash = htmlspecialchars($_POST["password"], ENT_QUOTES, "UTF-8"); //hash*/


if (!empty($login) && !empty($hash)) {
    // Wenn Logindaten und Passwort �bergeben wurden
    $DozentManager= new DozentManager();
    //dann wird ein neues Objekt der Klasse instanziiert
    $dozent= $DozentManager->findByLogin($login, $hash);
    //dann werden die Login und PW Daten mithilfe der Methode findByLogin geholt
    if ($dozent==null) {
        header('Location: FalseLogin.php'); //weiterleiten an FalseLogin Seite
        die();
        //wenn die Userdaten gleich null sind, also nicht �bereinstimmen, wird der Nutzer direkt auf die Loginseite umgeleitet
    } else {
        session_start();
        $_SESSION ["dozent"] = $dozent;
        $_SESSION ["login"] =1;

        if ($login == "Administrator") {
            header ('Location: startseite_Administrator.php');
        }
        else {
        header('Location: startseite.php');
        die(); }
        //wenn die Userdaten nicht gleich null sind, wird eine Session gestartet und dem Login wird eine 1 �bergeben,
        //es folgt eine Uleitung auf startseite.php
    }
} else {
    header ('Location: UncompleteLogin.php');
}

//wenn die Felder leer sind, d.h. nicht ausgef�llt sind, erscheint die Anzeige
// Error: blablah
?>
</html>
