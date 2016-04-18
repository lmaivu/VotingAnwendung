<?php include("../inc/session_check.php"); ?>

<?php

require_once("UserManager.php");
require_once("User.php");

$login = htmlspecialchars($_POST["login"], ENT_QUOTES, "UTF-8");
$vorname = htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");
$password = htmlspecialchars($_POST["password"], ENT_QUOTES, "UTF-8");
$password2 = htmlspecialchars($_POST["password2"], ENT_QUOTES, "UTF-8");

if (!empty($login) && !empty($email) && !empty($password) && !empty($password2)) {
    $nutzerdaten = [
        "login" => $login,
        "hash" => password_hash($password, PASSWORD_DEFAULT)
    ];
    $dozent = new Dozent($nutzerdaten);
    $userManager = new UserManager();
    $userManager->create($user);
    header('Location: ../index.php');
} else {
    echo "Error: Bitte alle Felder ausfüllen!<br/>";
}