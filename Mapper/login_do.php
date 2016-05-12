<!DOCTYPE html>
<html>

<?php
require_once("Manager.php");
require ("DozentManager.php");
require_once("Dozent.php");


$login = htmlspecialchars($_POST["login"], ENT_QUOTES, "UTF-8");
$password = htmlspecialchars($_POST["password"], ENT_QUOTES, "UTF-8");
/*$hash=password_hash($password, PASSWORD_DEFAULT);//PW hashen
$hash = htmlspecialchars($_POST["password"], ENT_QUOTES, "UTF-8"); //hash*/


if (!empty($login) && !empty($password)) {
    // Wenn Logindaten und Passwort übergeben wurden
    $dozent = new DozentManager();
    //dann wird ein neues Objekt der Klasse instanziiert
    $musterdozent= $dozent->findByLogin($login, $password);
    //dann werden die Login und PW Daten mithilfe der Methode findByLogin geholt
    if ($musterdozent==null) {
        header('Location: FalseLogin.php'); //weiterleiten an FalseLogin Seite
        die();
        //wenn die Userdaten gleich null sind, also nicht übereinstimmen, wird der Nutzer direkt auf die Loginseite umgeleitet
    } else {
        session_start();
        $_SESSION ['dozent'] = $dozent;
        $_SESSION ['session_steht'] = 1;
        $_SESSION ["login"] = $login;


        header('Location: startseite.php');
        die();
        //wenn die Userdaten nicht gleich null sind, wird eine Session gestartet und dem Login wird eine 1 übergeben,
        //es folgt eine Umleitung auf startseite.php
    }
} else {
    header ('Location: UncompleteLogin.php');
}

//wenn die Felder leer sind, d.h. nicht ausgefüllt sind, erscheint die Anzeige
// Error: blablah
?>
</html>
