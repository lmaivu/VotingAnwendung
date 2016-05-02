<!DOCTYPE html>
<html>


<?Php
require_once("../Mapper/Manager.php");
/*require_once("../Mapper/Dozent.php");

session_start();
if ($_SESSION ["login"]<>"1") { //wenn session start nicht gleich 1 ist
    $_SESSION = array(); //Neu erstellte session als leeres array
    session_destroy(); //session löschen
    echo 'Bitte zuerst einloggen, um die Seite anzuschauen'; //ÜBERPRÜFEN!
    /* header('Location: ../index.php'); //direkte Weiterleitung des Users auf login Seite*/
/*} else {
    $dozent = $_SESSION ["dozent"]; //ansonsten wird dem User eine Session zugewiesen
    /*header ('Location: ../Mapper/startseite.php');*/
//}
