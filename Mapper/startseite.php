<?php //include_once("../inc/session_check.php");
/*require ("Manager.php");
require_once("Dozent.php");
require ("DozentManager.php");*/
?>

<!DOCTYPE html>
<html>

<?php
include("../inc/head.php");
include("../inc/navbar.php");
include("../inc/footer.php");
session_start();
//$pdo = new PDO('mysql:host=localhost;dbname=u-lv018', 'root', '');

if(isset($_POST['login'], $_POST['password'])) {

    $statement = $pdo->prepare("SELECT * FROM Dozent WHERE login = :login");
    $result = $statement->execute(array('login' => $login));
    $dozent = $statement->fetch();
}
//Überprüfung des Passworts
if ($dozent !== false && password_verify($password, $dozent['password'])) {
    $_SESSION['nachname'] = $dozent['nachname'];
    header('Location: ../Mapper/startseite.php');
} else {
    $errorMessage = "E-Mail oder Passwort war ungültig<br>";
}
$nachname = $_SESSION['nachname'];
$_SESSION['userid'] = $dozent['id'];

echo "Hallo User: ".$nachname;
?>


<head>
 <link href="../css/bootstrap.css" rel="stylesheet">
</head>

<div id="main"> <!--div main-->

  <div id="kopfleiste">
       Hallo <?php echo ($_SESSION ["nachname"]) ?> - Willkommen zu I will survey
  <div>

   <div class="button">

    <div class="col-sm-offset-8">
        <a href="../Verzeichnis/Vorlesungsverzeichnis.php"> <button type="button" class="btn btn-danger btn-lg btn-block">Vorlesung</button> </a>
        <a href="../Verzeichnis/Votingverzeichnis.php"><button type="button" class="btn btn-danger btn-lg btn-block">Voting</button> </a>
    </div>

   </div>

</div> <!--div main-->

</html>