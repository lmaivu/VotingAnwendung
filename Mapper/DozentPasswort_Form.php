<?php
include("../inc/session_check.php");
require_once ("DozentManager.php");
require_once("Dozent.php");
?>


<html>

<?php include("../inc/head.php"); ?>

<body>

<?php include("../inc/navbar.php");
include "../inc/sticky_footer.php";
$Dozent_ID = (int)htmlspecialchars($_GET["Dozent_ID"], ENT_QUOTES, "UTF-8");
echo "$Dozent_ID";
$DozentManager = new DozentManager();
$dozent = $DozentManager->findById($Dozent_ID);?>

<div class="container">

    <h2>Hier k&oumlnnen Sie Ihr Passwort &aumlndern</h2><br />

    <form class="form-horizontal" role="form" action="DozentPasswort_Do.php" method="post">

        <div class="form-group">
            <label for="password" class="control-label col-sm-2">Neues Passwort:</label>
            <div class="col-sm-8">
                <input type="password" class="form-control" name="hash" id="hash">
            </div>
        </div>

        <div class="form-group">
            <label for="password2" class="control-label col-sm-2">Neues Passwort wiederholen:</label>
            <div class="col-sm-8">
                <input type="password" class="form-control" name="hash2" id="hash2">
            </div>
        </div>

        <div class="form-group" style="alignment: center">
            <div class="col-sm-offset-2 col-sm-8">
                <button style='background-color: #534532; border-color: white; color: white;' type="submit" class="btn btn-default">bestätigen!</button>
                <input style='background-color: #534532; border-color: white; color: white;' type="button" class="btn btn-default" value="Zurück" onClick="history.back()">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-5"</label>
            <div class="col-sm-6">
                <input type="hidden" value="<?php echo htmlspecialchars($dozent->Dozent_ID); ?>" class="form-control" name="Dozent_ID" id="Dozent_ID" readonly>
            </div>
        </div>

    </form>


</body>
</html>
    