<!-- session als Kommentar, jquery??? warum klappt das verdammt nochmal nicht-->

<!DOCTYPE html>
<html>

<head>
    <title>Charts mit JQuery / HTML5 Canvas</title>
    <!--<script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
    <script type="text/javascript" src="../jqPlot/jquery.min.js"></script>
    <script type="text/javascript" src="../jquery.jqplot.min.js"></script>
    <link rel="stylesheet" type="text/css" hrf="../jquery.jqplot.min.css" />
</head>
<?php

include "../inc/head.php";
include "../inc/navbar.php";
include "../inc/footer.php";

?>

<?php // include ("../inc/session_check.php");
require_once("Voting.php");
require_once("../Mapper/VotingManager.php");
$Voting_ID = (int)htmlspecialchars($_GET["Voting_ID"], ENT_QUOTES, "UTF-8");
$VotingManager = new VotingManager();
$liste = $VotingManager->getVoting($Voting_ID);

$Antwort_A =$liste ['a_Student'];
$Antwort_B =$liste ['b_Student'];
$Antwort_C =$liste ['c_Student'];
$Antwort_D =$liste ['d_Student'];

$count = $Antwort_A+ $Antwort_B+ $Antwort_C+ $Antwort_D;

?>

<body>


$Voting = new Voting($votingdaten);
$VotingManager = new VotingManager();
$VotingManager->save($Voting); ?>



<div>
    <div id="chart" style="height: 400px; width: 400px"></div>



</div>

</body>