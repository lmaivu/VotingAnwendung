<?php require_once("../inc/session_check.php");
include("Dozent.php");
include ("Manager.php");
include ("UserManager.php");
?>

<!DOCTYPE html>
<html>

<?php
include("../inc/head.php");
include("../inc/navbar.php");
$dozent=$_SESSION ['dozent'];
print_r ($_SESSION['dozent']);
?>

<div class="content">

<h1>
 Hallo <?php print_r ($_SESSION ["dozent"]) ?> - Willkommen zu I will survey
</h1>

</div>



</html>
