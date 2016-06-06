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



<head>
 <link href="../css/bootstrap.css" rel="stylesheet">
</head>

<div id="main"> <!--div main-->

  <div id="kopfleiste">
       Hallo <?php print_r( $_SESSION ['dozent']); $_SESSION ['nachname'] ?> - Willkommen zu I will survey
  <div>

   <figure>

           <a href="../Vorlesung/Vorlesungsverzeichnis.php"> <img src="https://mars.iuk.hdm-stuttgart.de/~lv018/Vorlesungbild.jpg"
                                                                  width="100px" height="100px">

           <a href="../Voting/Votingverzeichnis.php"> <img src="https://mars.iuk.hdm-stuttgart.de/~lv018/Votingbild.jpg"
                                                           width="100px" height="100px">

   <figure>

</div> <!--div main-->

</html>