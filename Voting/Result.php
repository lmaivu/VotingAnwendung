<!-- session als Kommentar, jquery??? warum klappt das verdammt nochmal nicht-->

<!DOCTYPE html>
<html>

<head>
    <title>Charts mit JQuery / HTML5 Canvas</title>
    <!--<script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
    <script type="text/javascript" src="../jqueryMai/jqPlot/dist/plugins/jquery.min.js"></script>
    <script type="text/javascript" src="../jquery.jqplot.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../jquery.jqplot.min.css" />
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
$Voting = $VotingManager->findbyId($Voting_ID);

$Antwort_A =$Voting ['a_Student'];
$Antwort_B =$Voting ['b_Student'];
$Antwort_C =$Voting ['c_Student'];
$Antwort_D =$Voting ['d_Student'];

$count = $Antwort_A+ $Antwort_B+ $Antwort_C+ $Antwort_D;

$Prozent_a = round($Antwort_A*100/$count) . "%";
$Prozent_b = round($Antwort_B*100/$count) . "%";
$Prozent_c = round($Antwort_C*100/$count) . "%";
$Prozent_d = round($Antwort_D*100/$count) . "%";;

?>

<body>

<?php
//$Voting = new Voting($votingdaten);
//$VotingManager = new VotingManager();
$VotingManager->save($Voting); ?>



<div>
    <div id="chart" style="height: 400px; width: 400px">

    </div>



</div>

</body>