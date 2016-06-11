<!DOCTYPE html>
<html>


<?Php
require_once("../Mapper/Manager.php");
require_once("../Mapper/Dozent.php");

session_start();
//$login = $_POST ['login'];
if ($_SESSION ["login"]<>"1") { //wenn session start nicht gleich 1 ist
    $_SESSION = array(); //Neu erstellte session als leeres array
    session_destroy(); //session l�schen
    echo 'Bitte zuerst einloggen, um die Seite anzuschauen'; //�BERPR�FEN!
    header('Location: ../index.php'); //direkte Weiterleitung des Users auf login Seite
} else {
    $dozent = $_SESSION ["dozent"];
    /**
    session_id();
    $dsn='mysql:: host=localhost; dbname=u-lv018';
    $pdo = new PDO($dsn,'lv018', 'naiT0ohd0e', array('charset'=>'utf8'));
    $sql = $pdo-> prepare ("SELECT nachname FROM Dozent WHERE $login = :login");
    $sql-> execute();
    $result = $sql->fetch();

    $dozent = $_SESSION ["dozent"];
    $_SESSION ["nachname"] = $result;
    $_SESSION ["login"] = $login; **/
    //ansonsten wird dem User eine Session zugewiesen
    //header ('Location: ../Mapper/startseite.php');
}
