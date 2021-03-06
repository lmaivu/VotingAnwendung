<!-- Formular, um eine Voting zu erstellen
Werte werden an Voting Create do weitergeben, damit sie in der DB gespeichert werden-->

<?php include("../inc/session_check.php"); ?>

<!DOCTYPE html>
<html>

<?php include("../inc/head.php"); ?>

<body>

<?php
include("../inc/navbar.php");
include "../inc/sticky_footer.php";
?>

<div class="container">

    <h2>Vorlesung erstellen</h2>

    <form class="form-horizontal" role="form" action="VorlesungCreate_do.php" method="post">
     <br>
        <div class="form-group">
            <label class="control-label col-sm-2" for="vorlesung_name">Name: </label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="Vorlesung_Name" id="Vorlesung_Name" placeholder="Name der Vorlesung">
            </div>
        </div>

         <br>
     <div>
        <div class="form-group" style= "alignment: center">
            <div class="col-sm-offset-2 col-sm-8">
                <button style='background-color: #Cdbfa5; border-color: white; color: white' type="submit" class="btn btn-default">Vorlesung hinzufügen</button>
                <input style='background-color: #534532; border-color: white; color: white;' type="button" class="btn btn-default" value="Zurück" onClick="history.back()">
            </div>
        </div>



        <div class="form-group">
            <label class="control-label col-sm-5"> </label>
            <div class="col-sm-8">
                <input type="hidden" value="<?php echo htmlspecialchars($dozent->Dozent_ID); ?>" class="form-control" name="Dozent_ID" id="Dozent_ID" readonly>
            </div>
        </div>
    </form>

</div>
</body>
</html>