<!-- Formular, um eine Voting zu erstellen
Werte werden an Voting Create do weitergeben, damit sie in der DB gespeichert werden-->

<?php include_once("../inc/session_check.php");

?>


    <link href="css/bootstrap.css" rel="stylesheet">


<!DOCTYPE html>
<html>

<?php include("../inc/head.php"); ?>

<body>

<link href="css/bootstrap.css" rel="stylesheet">

<?php include("../inc/navbar.php"); ?>

<div class="container">

    <h2>Neuer Voting-Eintrag</h2>

    <form class="form-horizontal" role="form" action="VotingCreate_do.php" method="post">

        <div class="form-group">
            <label class="control-label col-sm-2" for="voting_name">Name:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="voting_name" id="Voting_ID" placeholder="Name">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Vorlesung:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="vorlesung" id="Vorlesung_ID" placeholder="Vorlesung">
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
                <input type="datetime" class="form-control" name="voting_ablaufzeit" id="Ablaufzeit" placeholder="YYYY-MM-D - HH:MM:SS">
            </div>
        </div> <!--Googeln, wie man das Datum und zeit angeben kann-->



        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8">
                <button type="submit" class="btn btn-default">hinzuf&uuml;gen</button>
            </div>
        </div>
    </form>

</div>


<!-- Erstellen von Frage-->

<div class="container">

    <h2>Erstellen Sie hier Frage und Antworten!</h2>

    <p>Formulieren Sie eine Frage und die möglichen Antworten<br>
    Wählen Sie anschließend aus, ob die jeweilige Antwort richtig oder falsch ist.
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
            <div class="col-sm-6">
                <input required type="text" class="form-control" name="Antwort_A" id="Antwort_A" placeholder="Antwort A">
                <div class="col-sm-2"
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox1" value="richtig"checked> Richtig<br>
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox2" value="falsch"> Falsch
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Antowrt B:</label>
            <div class="col-sm-6">
                <input required type="text" class="form-control" name="Antwort_B" id="Antwort_B" placeholder="Antwort B">
                <div class="col-sm-2"
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox1" value="richtig"checked> Richtig<br>
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox2" value="falsch"> Falsch
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Antwort C:</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="Antwort_C" id="Antwort_C" placeholder="Antwort C">
                <div class="col-sm-2"
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox1" value="richtig"checked> Richtig<br>
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox2" value="falsch"> Falsch
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Antwort D:</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="Antwort_D" id="Antwort_D" placeholder="Antwort D">
                <div class="col-sm-2"
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox1" value="richtig"checked> Richtig<br>
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox2" value="falsch"> Falsch
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8">
                <button type="submit" class="btn btn-default">hinzuf&uuml;gen</button>
            </div>
        </div>

        <div class="form-group">
            <label>class="control-label col-sm-5"</label>
            <div class="col-sm-6">
                <input type="hidden" value="<?php echo htmlspecialchars($Vorlesung_ID);?>" class="form-control" name="Vorlesung_ID" id="Vorlesung_ID" readonly>
            </div>
        </div>
    </form>
</body>
</html>