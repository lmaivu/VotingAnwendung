<?php //include("../inc/session_check.php"); ?>
<?php //include("User.php"); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title> I will survey - Voting </title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
</head>

<!-- Navigationsbar öffnen-->
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"> <strong> Feel free to vote! </strong></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Startseite</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- Navigationsbar schliessen-->

<div id="main">

<?php
$_POST= 'vorname';
$_POST= 'nachname';
echo '$vorname $nachname';
?>
<h1> Willkommen zu "I will survey" </h1>
</div>



</html>
