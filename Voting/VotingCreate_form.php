<!-- Formular, um eine Voting zu erstellen
Werte werden an Voting Create do weitergeben, damit sie in der DB gespeichert werden-->

<?php // include("../inc/session_check.php"); ?>

<!DOCTYPE html>
<html>

<?php include("../inc/head.php"); ?>

<body>

<?php include("../inc/navbar.php"); ?>

<div class="container">

    <h2>Neuer Notiz-Eintrag</h2>

    <form class="form-horizontal" role="form" action="VotingCreate_do.php" method="post">

        <div class="form-group">
            <label class="control-label col-sm-2" for="betreff">Betreff:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="betreff" id="betreff" placeholder="Betreff">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="name" placeholder="Name">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="text">Anzeigentext:</label>
            <div class="col-sm-10">
                <textarea rows="3" class="form-control" name="text" id="text" placeholder="Anzeigentext"></textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">hinzuf&uuml;gen</button>
            </div>
        </div>
    </form>

</div>
</body>
</html>