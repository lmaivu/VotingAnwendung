<?PHP
require_once("../Mapper/User.php");
require_once ("../Mapper/Userdata.php"); /*noch �berpr�fen, ob dieses require n�tig ist*/

session_start();
if ($_SESSION ["login"]<>"1") { //wenn session start nicht gleich 1 ist
    $_SESSION = array(); //Neu erstellte session als leeres array
    session_destroy(); //session l�schen
    echo 'Bitte zuerst einloggen, um die Seite anzuschauen'; //�BERPR�FEN!
    header('Location: ../index.php'); //direkte Weiterleitung des Users auf login Seite
} else {
    $dozent = $_SESSION ["dozent"]; //ansonsten wird dem User eine Session zugewiesen
    header ('Location: ../Mapper/startseite.php');
}


