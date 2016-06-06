<!-- Formular, um eine Voting zu erstellen
Werte werden an Voting Create do weitergeben, damit sie in der DB gespeichert werden-->

<?php // include("../inc/session_check.php"); ?>

<!DOCTYPE html>
<html>

<?php include("../inc/head.php"); ?>

<body>

<?php include("../inc/navbar.php"); ?>

<div class="container">

    <h2>Neuer Voting-Eintrag</h2>

    <form class="form-horizontal" role="form" action="VotingCreate_do.php" method="post">

        <div class="form-group">
            <label class="control-label col-sm-2" for="voting_name">Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="voting_name" id="Voting_ID" placeholder="Name">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Vorlesung:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="vorlesung" id="Vorlesung_ID" placeholder="Vorlesung">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Einschreibeschlüssel:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="Einschreibeschlussel" id="Einschreibeschlussel" placeholder="Einschreibeschlüssel:">
            </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Ablaufzeit:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="voting_ablaufzeit" id="Ablaufzeit" placeholder="Ablaufzeit">
            </div>



        </div> <!--Googeln, wie man das Datum und zeit angeben kann-->



        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">hinzuf&uuml;gen</button>
            </div>
        </div>
    </form>

</div>
</body>
</html>