<!-- Kontakt-Seite mit integrierter Navbar_Administrator & Footer_Administrator

<head>
    <meta charset="UTF-8">
    <title> I will survey - Voting </title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <!--
     <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="main.css">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <!-- JQuery einbinden
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="js/bootstrap.min.js"></script>﻿
</head> -->

<!DOCTYPE html>
<html>

<body>
<div>
    <?php
        include "../inc/navbar_Administrator.php";
        include "../inc/head.php";
        include "../inc/footer_Administrator.php";
    ?>
</div>

<link href="../css/bootstrap_statisch.css" rel="stylesheet"/>

<div id="box">
    <h1 id="title"> Impressum </h1>

    <h3 id="title2"> Anbieter: </h3>
    <h4> <strong>Mai Vu</strong><br>
        Studentin Online-Medien-Management<br>
        3.Fachsemester<br>
        Matrikelnummer 30449<br>
        <br>
        <strong>Lukas Neuffer</strong><br>
        Student Online-Medien-Management<br>
        3.Fachsemester<br>
        Matrikelnummer 30444<br>
        <br>
        <strong>Lena Bogunovic</strong><br>
        Studentin Online-Medien-Management<br>
        3.Fachsemester<br>
        Matrikelnummer 30352<br>
    </h4>

    <h3 id="title2"> Verantwortlich nach § 6 Abs.2 MDStV: </h3>
    <h4> <strong>Hochschule der Medien Stuttgart</strong><br>
        Nobelstraße 10<br>
        70569 Stuttgart<br>
        <strong>Telefon: </strong>0711-892310<br>
    </h4>

</div>

<div id="footer">
    <?php include "../inc/footer_Administrator.php"; ?>
</div>

</body>
</html>