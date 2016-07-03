<!DOCTYPE html>
<html>

<?php
error_reporting(E_ALL);
include "../inc/head.php";


require_once "Voting.php";
require_once "../Vorlesung/Vorlesung.php";
require_once "../Mapper/VorlesungManager.php";
require_once "../Mapper/VotingManager.php";
include("../inc/cookie.php");

?>

<head>
    <link rel="stylesheet" href="../css/bootstrap_verzeichnis.css">
    <link rel="stylesheet" href="../css/bootstrap_Abstimmen.css">
</head>

<body>

<?php

//$Voting_ID = (int)htmlspecialchars($_GET["Voting_ID"], ENT_QUOTES, "UTF-8"); //funktioniert noch nicht, muss �ber QR Code �bergeben werden
$Voting_ID =2;
$VotingManager = new VotingManager();
$liste1 = $VotingManager->findById($Voting_ID);

$a_Student=$liste1->a_Student;

$b_Student= (int) $liste1->b_Student;
$c_Student=(int) $liste1->c_Student;
$d_Student=(int) $liste1->d_Student;

?>

<div id="kopfleiste">
    <div class="jumbotron">
        <h1>Voting: <br>
            <?php echo $liste1->Voting_Name;?>
        </h1>
    </div>
</div>

<div>
    <div colspan="2" class="pollTitle">Frage: <?php echo $liste1->Frage;?></div> <br>

    <?php


    $Voting_ID = (int)htmlspecialchars($_GET["Voting_ID"], ENT_QUOTES, "UTF-8");
    $VotingManager = new VotingManager();
    $Voting = $VotingManager->findById($Voting_ID)

    ?>



    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-stats"></span> clarovo</a>
                <a class="btn btn-default navbar-btn" href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="jumbotron" style=background:whitesmoke>
            <h1>Voting ID: <?php echo $voting_id ?></h1><br />
        </div>
    </div>

    <div class="container">

        <h2>Frage: <?php echo $voting->frage?> </h2><br />

        <form role="form" class="form-inlinecy" action="VotingVoting.php" method="post">

            <div class="form-group">
                <input type="submit" name="a" id="a" value="<?php echo $voting->a ?>"/>
            </div>

            <div class="form-group">
                <input type="submit" name="b" id="b" value="<?php echo $voting->b ?>"/>
            </div>

            <?php  if(isset($voting->c) && !empty($voting->c))
            { ?>
                <div class="form-group">
                    <input type="submit" name="c" id="c" value="<?php echo $voting->c ?>"/>
                </div>
            <?php } ?>

            <?php  if(isset($voting->d) && !empty($voting->d))
            { ?>
                <div class="form-group">
                    <input type="submit" name="d" id="d" value="<?php echo $voting->d ?>"/>
                </div>
            <?php } ?>

            <div class="form-group">
                <input type="hidden" value="<?php echo htmlspecialchars($voting_id); ?>" class="form-control" name="id_voting" id="id_voting" readonly>
            </div>
        </form>

    </div>

    <input type="hidden" id="refreshed" value="no">



    </body>
    </html>



