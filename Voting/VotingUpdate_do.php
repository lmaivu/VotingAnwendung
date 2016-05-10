<?php include("inc/session_check.php"); ?>

<?php

require_once("Mapper/NotizManager.php");
require_once("Mapper/Notiz.php");

$notiz_id = htmlspecialchars($_POST["notiz_id"], ENT_QUOTES, "UTF-8");
$name = htmlspecialchars($_POST["name"], ENT_QUOTES, "UTF-8");
$betreff = htmlspecialchars($_POST["betreff"], ENT_QUOTES, "UTF-8");
$text = htmlspecialchars($_POST["text"], ENT_QUOTES, "UTF-8");

if (!empty($notiz_id) && !empty($name) && !empty($betreff) && !empty($text)) {
    $notizManager = new NotizManager();
    $notiz = $notizManager->findById($notiz_id);
    $notiz->name = $name;
    $notiz->betreff = $betreff;
    $notiz->text = $text;
    $notizManager->save($notiz);
    header('Location: index.php');
} else {
    echo "Error: Bitte alle Felder ausfüllen!";
}

