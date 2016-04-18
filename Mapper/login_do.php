<!DOCTYPE html>
<html>

<?php
require_once("UserManager.php");
require_once("User.php");

$login = htmlspecialchars($_POST["login"], ENT_QUOTES, "UTF-8");
$password = htmlspecialchars($_POST["password"], ENT_QUOTES, "UTF-8");

if (!empty($login) && !empty($password)) {
    // Wenn Logindaten und Passwort übergeben wurden
    $userManager = new UserManager();
    //dann wird ein neues Objekt der Klasse instanziiert
    $dozent= $userManager->findByLogin($login, $password);
    //dann werden die Login und PW Daten mithilfe der Methode findByLogin geholt
    if ($dozent==null) {
        echo 'Logindaten stimmen nicht überein';
        header('Location: ../index.php'); //weiterleiten an index Seite
        die();
        //wenn die Userdaten gleich null sind, also nicht übereinstimmen, wird der Nutzer direkt auf die Loginseite umgeleitet
    } else {
        session_start();
        $_SESSION ['dozent'] = $dozent;
        $_SESSION ['login'] = "1";
        header('Location: startseite.php');
        die();
        //wenn die Userdaten nicht gleich null sind, wird eine Session gestartet und dem Login wird eine 1 übergeben,
        //es folgt eine Umleitung auf startseite.php
    }
} else {
    echo "Ups. Bitte alle Felder ausf&uumlllen! <br/>";
}

//wenn die Felder leer sind, d.h. nicht ausgefüllt sind, erscheint die Anzeige
// Error: blablah
?>
</html>
