<!-- Formular, um eine Voting zu erstellen
Werte werden an Voting Create do weitergeben, damit sie in der DB gespeichert werden-->

<?php
include_once("../inc/session_check.php");
require_once("../Mapper/VorlesungManager.php");
?>


<link href="../css/bootstrap.css" rel="stylesheet">


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
            <div class="col-sm-8">
                <input type="text" class="form-control" name="Voting_Name" id="Voting_Name" placeholder="Name">
            </div>
        </div>


        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Einschreibeschlüssel:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="Einschreibeschlussel" id="Einschreibeschlussel" placeholder="Einschreibeschlüssel:">
            </div>
        </div>


        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Ablaufzeit:</label>
            <div class="col-sm-8">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" name="Ablaufzeit" id="Ablaufzeit" placeholder="Ablaufzeit">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>

            <script type="text/javascript">
                $(function () {
                    $('#datetimepicker1').dateTime('show');
                });
            </script>
        </div>


    </form>

</div>


<!-- Erstellen von Frage-->

<div class="container">

    <h2>Erstellen Sie hier Frage und Antworten!</h2>

    <p>Formulieren Sie eine Frage und die möglichen Antworten<br>
    Wählen Sie anschließend aus, ob die jeweilige Antwort richtig oder falsch ist.<br>
    Geben Sie bitte mindestens zwei Antwortmöglichkeiten an.
    </p>

    <form class="form-horizontal" role="form" action="VotingCreate_do.php" method="post">

        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Frage:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="Frage" id="Frage" placeholder="Frage">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Antwort A:</label>
            <div class="col-sm-8">
                <input required type="text" class="form-control" name="Antwort_A" id="Antwort_A" placeholder="Antwort A">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Antowrt B:</label>
            <div class="col-sm-8">
                <input required type="text" class="form-control" name="Antwort_B" id="Antwort_B" placeholder="Antwort B">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Antwort C:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="Antwort_C" id="Antwort_C" placeholder="Antwort C">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Antwort D:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="Antwort_D" id="Antwort_D" placeholder="Antwort D">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8">
                <button type="submit" class="btn btn-default">hinzuf&uuml;gen</button>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-5"</label>
            <div class="col-sm-6">
                <input type="hidden" value="<?php echo htmlspecialchars($Vorlesung->Vorlesung_ID);?>" class="form-control" name="Vorlesung_ID" id="Vorlesung_ID" readonly>
            </div>
        </div>

    </form>
</body>
</html>