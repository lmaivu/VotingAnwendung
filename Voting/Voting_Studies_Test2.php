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

$Voting_ID = (int)htmlspecialchars($_GET["Voting_ID"], ENT_QUOTES, "UTF-8"); //funktioniert noch nicht, muss �ber QR Code �bergeben werden

$VotingManager = new VotingManager();
$Voting = $VotingManager->findById($Voting_ID);

$a_Student= $Voting->a_Student;

$b_Student= (int) $Voting->b_Student;


?>

<div id="kopfleiste">
    <div class="jumbotron">
        <h1>Voting: <br>
            <?php echo $Voting->Voting_Name;?>
        </h1>
    </div>
</div>




    <div class="container">

        <h2>Frage: <?php echo $Voting->Frage?> </h2><br />

        <form role="form" class="form-inlinecy" action="VotingStudent_Do.php" method="post">

            <div class="form-group">
                <input type="submit" name="A" id="A" value="<?php echo $Voting->a_Student ?>"/>
            </div>

            <div class="form-group">
                <input type="submit" name="B" id="B" value="<?php echo $Voting->b_Student ?>"/>
            </div>

            <?php  if(isset($Voting->Antwort_C) && !empty($Voting->Antwort_C))
            { ?>
                <div class="form-group">
                    <input type="submit" name="C" id="C" value="<?php echo $Voting->c_Student ?>"/>
                </div>
            <?php } ?>

            <?php  if(isset($Voting->Antwort_D) && !empty($Voting->Antwort_D))
            { ?>
                <div class="form-group">
                    <input type="submit" name="D" id="D" value="<?php echo $Voting->d_Student ?>"/>
                </div>
            <?php } ?>

            <div class="form-group">
                <input type="text" value="<?php echo htmlspecialchars($Voting_ID); ?>" class="form-control" name="Voting_ID" id="Voting_ID" readonly>
            </div>
        </form>

    </div>

    <input type="hidden" id="refreshed" value="no">



    </body>
    </html>



