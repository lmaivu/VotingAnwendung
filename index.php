<!DOCTYPE html>
<html>

<?php
include("inc/head.php");
include("inc/navbar.php")

?>


<head>
    <link href="css/bootstrap.css" rel="stylesheet">

</head>

<body>


<nav class="navbar navbar-default">
    <div class="container">
    </div>

    <!-- Logo-->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar">

            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <a href="#" class="navbar-brand"> I-will-Survey</a>
    </div>


    <!-- Menü-Items -->
    <div class="collapse navbar-collapse" id="mainNavBar">
        <ul class="nav navbar-nav">
            <li class="active"><a href="#">Startseite</a></li>
            <li> <a href="#">Irgendwas</a></li>

            <!-- Dropdown-Menü -->
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hallooo <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li> <a href="#">Mai</a></li>
                    <li> <a href="#">Lena</a></li>
                    <li> <a href="#">Luke</a></li>

                </ul>
            </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li> <a href="#">Logout</a></li>
        </ul>

    </div>
</nav>


<!-- Footer -->

<div class ="navbar navbar-default navbar-fixed-bottom">
    <div class="container">

        <a href="#" class="navbar-btn btn-default btn pull right">Kontakt</a>
        <a href="#" class="navbar-btn btn-default btn pull right">Impressum</a>

    </div>
</div>



    <!-- Inhalt-->
<div id="main">  <!-- div main �ffnen-->

        <div id="kopfleiste">
            <!-- 2 -->
            <h1> <strong> I will survey. </strong> </h1>
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
                    <input class="form-control" type="text" name='password' placeholder="Passwort"/>

                </div>


                </div><div class="form-group">
                    <div class="col-sm-offset-3 col-sm-7">
                        <button type="submit" class="btn btn-default">Login</button>
                    </div>

                </div>
        </form>
    </div>
</div> <!--div class =content-->

    <div class="info">
        <a href="Mapper/info.php"> Was steckt hinter "I will survey"? </a>
        <br>
        <br>
    </div>


</div> <!--div main schlie�en -->





<!-- Inhalt Ende-->

<footer class="container">
    <div class ="row">
        <p class="col-sm-4"> &copy; I will survey. </p>
        <ul class="col-sm-4">
            <li class="col-sm-2"> <a href="Mapper/Contact.php">Kontakt </a> </li>
            <li class="col-sm-2"> <a href="Mapper/Impressum.php">Impressum</a> </li>
        </ul>

    </div>
</footer>

</body>

</html>