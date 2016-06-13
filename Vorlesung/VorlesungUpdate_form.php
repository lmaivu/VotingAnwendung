<?php include("../inc/session_check.php"); ?>

<?php

require_once("../Mapper/VorlesungManager.php");
require_once("Vorlesung.php");

$Vorlesung_ID = (int)htmlspecialchars($_GET["Vorlesung_ID"], ENT_QUOTES, "UTF-8");
$VorlesungManager = new VorlesungManager();
$Vorlesung = $VorlesungManager->findById($Vorlesung_ID);

?>

<!DOCTYPE html>
<html>


<?php include("../inc/head.php"); ?>

<body>

<?php include("../inc/navbar.php"); ?>

<div id="main">

<div class="container">
    <div id="standard">
    <h1>Vorlesung <i> <?php echo ($Vorlesung->Vorlesung_Name) ?></i> &aumlndern </h1>
    <form action='VorlesungUpdate_do.php' method='post'> <br>
        <input type='hidden' name='Vorlesung_ID' value='<?php echo ($Vorlesung->Vorlesung_ID) ?>' />
        <br>
        <input type='hidden' name='Vorlesung_ID' value='<?php echo ($Vorlesung->Dozent_ID) ?>' />
        <br>
        Name der Vorlesung: <input type='text' name='Vorlesung_Name' value='<?php echo ($Vorlesung_Name) ?>' /> <br>
        <br>

        <input type='submit' class='btn btn-danger'  role='button' value='Änderungen speichern' />
    </form>
    </div>
</div>

</div>

</body>
</html>