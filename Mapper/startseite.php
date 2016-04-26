<?php //include ("../inc/session_check.php");
include("User.php"); ?>

<!DOCTYPE html>
<html>

<?php
include("../inc/head.php");
include("../inc/navbar.php");
$dozent=$_SESSION ["dozent"];
?>

<div class="content">

<h1>
 Hallo <?php echo '.$dozent' ?> - Willkommen zu I will survey;
</h1>

</div>



</html>
