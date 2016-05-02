<?php include_once("../inc/session_check.php");
/*include("Dozent.php");
include ("Manager.php");
include ("DozentManager.php"); */
?>

<!DOCTYPE html>
<html>

<?php
include("../inc/head.php");
include("../inc/navbar.php");
include("../inc/footer.php");
$dozent=$_SESSION ['dozent'];
print_r ($_SESSION['dozent']);
?>


<head>
 <link href="../css/bootstrap.css" rel="stylesheet">
</head>

<div id="main"> <!--div main-->

  <div id="kopfleiste">
       Hallo <?php print_r ($_SESSION ["dozent"]) ?> - Willkommen zu I will survey
  <div>

   <div class="button">

    <div class="col-sm-offset-8">
    <button type="button" class="btn btn-danger btn-lg btn-block">Vorlesung</button>
    <button type="button" class="btn btn-danger btn-lg btn-block">Voting</button>
    </div>

   </div>

</div> <!--div main-->




</html>
