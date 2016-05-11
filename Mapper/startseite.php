<?php include_once("../inc/session_check.php");
require_once ("Manager.php");
require_once("Dozent.php");
require_once ("DozentManager.php");
?>

<!DOCTYPE html>
<html>

<?php
include("../inc/head.php");
include("../inc/navbar.php");
include("../inc/footer.php");
?>

<?php
/**
$dsn='mysql:: host=localhost; dbname=u-lv018';
try {
    $pdo = new PDO($dsn,'lv018', 'naiT0ohd0e', array('charset'=>'utf8'));
$nachname = $_SESSION ['nachname'];
$stmt = $pdo -> prepare('SELECT nachname FROM Dozent WHERE $session_id = 1');
$stmt ->execute (array ($nachname));

 print_r($nachname);
}
catch(PDOException $e) {
    echo "Unable to connect Database";
}**/
?>


<head>
 <link href="../css/bootstrap.css" rel="stylesheet">
</head>

<div id="main"> <!--div main-->

  <div id="kopfleiste">
       Hallo <?php print_r( $_SESSION ['dozent']); $_SESSION ['nachname'] ?> - Willkommen zu I will survey
  <div>

   <div class="button">

    <div class="col-sm-offset-8">
        <a href="../Vorlesung/Vorlesungsverzeichnis.php"> <button type="button" class="btn btn-danger btn-lg btn-block">Vorlesung</button> </a>
        <a type="button" class="btn btn-primary" href="../Vorlesung/VorlesungCreate_form.php" role="button">Neue Vorlesung hinzuf&uumlgen</a>


        <a href="../Voting/Votingverzeichnis.php"><button type="button" class="btn btn-danger btn-lg btn-block">Voting</button> </a>
    </div>

   </div>

</div> <!--div main-->

</html>