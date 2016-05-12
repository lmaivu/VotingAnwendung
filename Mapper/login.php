<!-- bisher unnötig, da der LOGIN über die startseite abläuft-->
<!DOCTYPE html>
<html>

<?php include("../inc/head.php"); ?>

<body>



<div class="container">
    <h2>Login</h2>

    <form class="form-horizontal" role="form" action="login_do.php" method="post">

        <div class="form-group">
            <label class="control-label col-sm-2" for="login">E-Mail Adresse:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="login" id="login" placeholder="Benutzername">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="password">Kennwort:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="password" id="password" placeholder="Kennwort">
            </div>
        </div>
        <!--Blöcke werden angesetzt bis die 12 Spaltenbreite voll sind, ansonsten wird der nächste Block unten angesetzt
        //ansonsten automatisch nebeneinander
        //durch div class= "form-group" wird also eine Zeile definiert
        //so kann man definieren, dass die Inhalte untereinander angeordnet werden -->

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Login</button>
            </div>
        </div>
    </form>

</div>

</body>
</html>