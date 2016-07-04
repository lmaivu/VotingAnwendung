<!--hdh -->
<!DOCTYPE html>


<html>

<?php include("../inc/head.php");?>

<body>

<?php include("../inc/navbar_Administrator.php")
; ?>

<link href="../css/bootstrap.css" rel="stylesheet">

<div class="container">
    <h2>Neuer Dozent</h2>

    <form class="form-horizontal" role="form" action="DozentCreate_Do.php" method="post">
        <div class="form-group">
            <label for="login" class="control-label col-sm-2">E-Mail Adresse: </label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="login" id="login" placeholder="Login">
            </div>
        </div>

        <div class="form-group">
            <label for="vorname" class="col-sm-2 control-label">Vorname: </label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="vorname" id="vorname" placeholder="Vorname">
            </div>
        </div>

        <div class="form-group">
            <label for="vorname" class="col-sm-2 control-label">Nachname: </label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="nachname" id="nachname" placeholder="Nachname">
            </div>
        </div>


        <div class="form-group">
            <label for="password" class="control-label col-sm-2">Passwort: </label>
            <div class="col-sm-8">
                <input type="password" class="form-control" name="password" id="password" placeholder="Passwort">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8">
                <button style='background-color: #Cdbfa5; border-color: white; color: white;' type="submit" class="btn btn-default">Fertig!</button>
                <input style='background-color: #534532; border-color: white; color: white;' type="button" class="btn btn-default" value="Zurück" onClick="history.back()">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-5"> </label>
            <div class="col-sm-6">
                <input type="hidden" value="<?php echo htmlspecialchars($dozent->Dozent_ID); ?>" class="form-control" name="Dozent_ID" id="Dozent_ID" readonly>


            </div> <!--�berpr�fen ob das klappt-->

    </form>

</div>

<div>
    <?php include "../inc/footer_Administrator.php"; ?>
</div>

</body>
</html>