<!-- Formular, um eine Voting zu erstellen
Werte werden an Voting Create do weitergeben, damit sie in der DB gespeichert werden-->

<?php // include("../inc/session_check.php"); ?>

<!DOCTYPE html>
<html>

<?php include("../inc/head.php"); ?>

<body>

<?php include("../inc/navbar.php"); ?>

<div class="container">

    <h2>Neuer Vorlesung-Eintrag</h2>

    <form class="form-horizontal" role="form" action="VorlesungCreate_do.php" method="post">

        <div class="form-group">
            <label class="control-label col-sm-2" for="vorlesung_name">Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="Vorlesung_Name" id="Vorlesung_Name" placeholder="Name der Vorlesung">
            </div>
        </div>



        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">hinzuf&uuml;gen</button>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-5"> </label>
            <div class="col-sm-6">
                <input type="hidden" value="<?php echo htmlspecialchars($dozent->Dozent_ID); ?>" class="form-control" name="Dozent_ID" id="Dozent_ID" readonly>
            </div>
        </div>
    </form>

</div>
</body>
</html>