<!DOCTYPE html>
<html>

<?php
include("inc/head.php");
?>

<head>
    <link href="css/bootstrap.css" rel="stylesheet">
</head>


<body>

<!-- Inhalt-->
<div id="main">  <!-- div main �ffnen-->

        <div id="kopfleiste">
            <img src="https://mars.iuk.hdm-stuttgart.de/~lv018/Logo_transparent.png" width="500" height="110" alt="Logo">
            <h3>Prüfen Sie das Wissen ihrer Studenten im Vorlesungssaal<br>
                - und haben Sie sofort Zugriff auf die Ergebnisse!</h3>
        </div>


    <div id="content">

        <div class="login">
        <form class="form-horizontal" role="form" action="Mapper/login_do.php" method="post">
            <!-- auf der Seite login_do werden die Userdaten �berpr�ft-->


            <div class="form-group input-group">
                <div class="col-sm-offset-4 col-sm-1">
                <span class="input-group-addon">
                    <i class="glyphicon glyphicon-user">
                    </i>
                </span>
                </div>
                <div class="col-sm-3">
                    <input class="form-control" type="text" name='login' placeholder="E-Mail Adresse"/>
                </div>
            </div>

            <div class="form-group input-group">
                <div class="col-sm-offset-4 col-sm-1">
                <span class="input-group-addon">
                    <i class="glyphicon glyphicon-lock"></i>
                </span>
                </div>
                <div class="col-sm-3">
                    <input class="form-control" type="password" name='hash' placeholder="Passwort"/>

                </div>


                </div>
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-4">
                        <button type="submit" class="btn btn-default">Login</button>
                    </div>
                </div>
        </form>
    </div>

    </div> <!--div id =content-->

    <div class="info">
        <a href="Mapper/info.php"> Was steckt hinter "I will survey"? </a>
    </div>

</div> <!--div main schlie�en -->





<!-- Inhalt Ende-->
    <div id="footer">
        <?php
        include("inc/footer.php");

        ?>
    </div>

</body>

</html>

