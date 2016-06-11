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

?>



<head>
    <link href="../css/bootstrap_startseite.css" rel="stylesheet">
</head>

<body>
<div id="main"> <!--div main-->

  <div id="kopfleiste">

      <p>
          Hallo <strong><?php echo $dozent->nachname; ?> </strong> ! <br>
          Willkommen zu 'I will survey' </p>
  <div>
  </div> <!--div main-->

  <div id="menu">
      <div class="row">

              <div class="col-sm-4">
              <a href="../Vorlesung/Vorlesungsverzeichnis.php"> Vorlesungsverzeichnis  <img src="https://mars.iuk.hdm-stuttgart.de/~lv018/Vorlesungbild.jpg" width= "230px" height="200px" class="img-circle">
              </div>

          <div class="col-sm-4">
              <a href="../Vorlesung/VorlesungCreate_form.php"> Vorlesung erstellen<img src="https://mars.iuk.hdm-stuttgart.de/~lv018/Vorlesungerstellen.jpg" width= "230px" height="200px" class="img-circle">
          </div>

          <div class="col-sm-4">
              <a href="../Voting/Votingverzeichnis.php"> Votingverzeichnis <img src="https://mars.iuk.hdm-stuttgart.de/~lv018/Votingbild.jpg" width= "230px" height="200px" class="img-circle">
          </div>
      </div> <!-- div menu-->

      <div id="footer">
          <?php include("../inc/footer.php"); ?>
    </div>



</body>
</html>