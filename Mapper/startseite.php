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
    <link href="../css/bootstrap_startseite.css" rel="stylesheet">
</head>

<div id="main"> <!--div main-->

  <div id="kopfleiste">
       Hallo <?php /**print_r( $_SESSION ['dozent']); $_SESSION ['nachname'] **/?> - Willkommen zu I will survey
  <div>

      <div class="menu">
          <div id="eins">
              <a href="../Vorlesung/Vorlesungsverzeichnis.php"> <img src="https://mars.iuk.hdm-stuttgart.de/~lv018/Vorlesungbild.jpg"
                                                                     width="280px" height="200px">
          </div>
          <div id="zwei">
              <a href="../Voting/Votingverzeichnis.php"> <img src="https://mars.iuk.hdm-stuttgart.de/~lv018/Votingbild.jpg"
                                                              width="280px" height="200px">
          </div>
          <div id="drei">
              <a href="../Dozent/DozentCreate_form.php"> <img src="https://cdn3.iconfinder.com/data/icons/line/36/person_add-512.png"
                                                              width="130px" height="120">
          </div>

</div> <!--div main-->




      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
</html>