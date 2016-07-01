<?php
include("../inc/session_check.php");
require_once ("DozentManager.php");
require_once("Dozent.php");
?>


<html>

<?php include("../inc/head.php"); ?>

<body>

<?php include("../inc/navbar.php");
$DozentManager = new DozentManager();
$dozent = $DozentManager->findById($Dozent_ID);?>

<div class="container">

    <h2>Hier k&oumlnnen Sie Ihr Passwort &aumlndern</h2><br />

    <form class="form-horizontal" role="form" action="DozentPasswort_Do.php" method="post">

        <div class="form-group">
            <label for="password" class="control-label col-sm-2">Neues Passwort:</label>
            <div class="col-sm-4">
                <input type="password" class="form-control" name="hash" id="hash">
            </div>
        </div>

        <div class="form-group">
            <label for="password2" class="control-label col-sm-2">Neues Passwort wiederholen:</label>
            <div class="col-sm-4">
                <input type="password" class="form-control" name="hash2" id="hash2">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-4">
                <button type="submit" class="btn btn-default">best&aumltigen</button>
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
    