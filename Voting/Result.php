<!DOCTYPE html>
<html>

<?php

include "../inc/head.php";
include "../inc/navbar.php";
include "../inc/footer.php";

?>

<?php include("../inc/session_check.php");
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


<h1>Voting: <?php echo $Voting->Frage ?></h1><br />
<?php
$getVoting = "SELECT a_Student, b_Student, c_Student, d_Student FROM Voting WHERE Voting_ID=$Voting->Voting_ID";



$Voting = new Voting($votingdaten);
$VotingManager = new VotingManager();
$VotingManager->save($Voting);
?>

</body>