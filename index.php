<!DOCTYPE html>
<html>

<?php
include("inc/head.php");
include("inc/footer.php");

?>

<head>
    <link href="css/bootstrap.css" rel="stylesheet">
</head>


<body>

<!-- Inhalt-->
<div id="main">  <!-- div main �ffnen-->

        <div id="kopfleiste">
            <h1> <strong> I will survey </strong> </h1>
            <h3> Kurzes Slogan mit Logo</h3>
        </div>


    <div class="content">

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
                    <input class="form-control" type="password" name='password' placeholder="Passwort"/>

                </div>


                </div>
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-4">
                        <button type="submit" class="btn btn-default">Login</button>
                    </div>

                </div>
        </form>

    </div>

    </div> <!--div class =content-->

    <div class="info">
        <a href="Mapper/info.php"> Was steckt hinter "I will survey"? </a>
    </div>

</div> <!--div main schlie�en -->



<!-- Inhalt Ende-->

</body>

</html>