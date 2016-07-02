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
<?php $Dozent_ID = $dozent->Dozent_ID; ?>

<div id="kopfleiste"> <!--div kopfleiste-->

  <div id="kopfleiste">
      <p style="font-family: 'Open Sans', sans-serif"> Hallo <strong><?php echo $dozent->vorname, '&nbsp;',$dozent->nachname; ?> </strong>, <br>
          Willkommen zu <em>I will survey</em> !</p>
  </div>
</div>  <!--div kopfleiste-->


<div id="menu">
      <div class="row">

              <div class="col-sm-4">
                  <a style ="color: #000000"  href="../Vorlesung/Vorlesungsverzeichnis.php?Dozent_ID=$Dozent_ID"?> <img src="https://mars.iuk.hdm-stuttgart.de/~lv018/Vorlesungbild.png" width= "300px" height="300px" class="img-circle">
              </div>

          <div class="col-sm-4">
              <a style ="color: #000000" href="../Vorlesung/VorlesungCreate_form.php"> <img src="https://mars.iuk.hdm-stuttgart.de/~lv018/Vorlesungerstellen.png" width= "300px" height="300px" class="img-circle">
          </div>

          <div class="col-sm-4">
              <a style ="color: #000000" href="../Voting/Votingverzeichnis.php?Dozent_ID=$Dozent_ID"> <img src="https://mars.iuk.hdm-stuttgart.de/~lv018/Votingbild.png" width= "300px" height="300px" class="img-circle">
          </div>
      </div> <!-- div menu-->
</div>

<?php

echo "<a href='../Mapper/DozentPasswort_Form.php?Dozent_ID=$Dozent_ID' class='btn btn-primary btn-sm'>Passwort ändern</a>"
?>
<div>
    <?php include "../inc/sticky_footer.php"; ?>
</div>

</body>
</html>