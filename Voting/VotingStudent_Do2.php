<?php include("../inc/cookie.php"); ?>
    <!DOCTYPE html>
    <html>
<?php
error_reporting(E_ALL);
require_once "../Mapper/VotingManager.php";
require_once "../Voting/Voting.php";
include "../inc/head.php";
?>


    <body>
<?php
$Voting_ID = (int)htmlspecialchars($_POST["Voting_ID"], ENT_QUOTES, "UTF-8");
$VotingManager = new VotingManager();
$Voting = $VotingManager->findById($Voting_ID);

$con = mysqli_connect("localhost", "lv018", "naiT0ohd0e", "u-lv018");

//-------------Cookie checken, hat der Student schon gevoted?--------------------------
if (isset ($_COOKIE["Student"] )) {
echo "Sie haben bereits erfolgreich Ihre Voting-Stimme abgegeben. Jeder Student kann nur ein Mal abstimmen.";
}

else {
if(isset($_POST['A'])){
$a_Student = "UPDATE Voting SET a_Student=a_Student+1 WHERE Voting_ID=$Voting_ID";
$run_a_vote =mysqli_query($con, $a_Student);

echo"<h2 align='center'>Du hast erfolgreich für \"a\" gevotet! <br /></h2>";
}}

if(isset($_POST['B'])){
$b_Student = "UPDATE Voting SET b_Student=b_Student+1 WHERE Voting_ID=$Voting_ID";
$run_b_vote =mysqli_query($con, $b_Student);

echo"<h2 align='center'>Du hast erfolgreich für \"b\" gevotet! <br /></h2>";
}

if(isset($_POST['C'])){
$c_Student = "UPDATE Voting SET c_Student=c_Student+1 WHERE Voting_ID=$Voting_ID";
$run_c_vote =mysqli_query($con, $c_Student);

echo"<h2 align='center'>Du hast erfolgreich für \"c\" gevotet! <br /></h2>";
}

if(isset($_POST['D'])){
$d_Student = "UPDATE Voting SET d_Student=d_Student+1 WHERE Voting_ID=$Voting_ID";
$run_d_vote =mysqli_query($con, $d_Student);

echo"<h2 align='center'>Du hast erfolgreich für \"d\" gevotet! <br /></h2>";
}
$Voting = $VotingManager->countVote($Voting_ID);
$a = $Voting->a_Student;
$b = $Voting->b_Student;
$c = $Voting->c_Student;
$d = $Voting->d_Student;

$count = $a+$b+$c+$d;
echo "Hier können Sie die Übersicht sehen.<br/>.<br/>";
echo "Gesamtanzahl der Votings: $count.<br />";

$Prozent_a = round($a*100/$count) . "%";
$Prozent_b = round($b*100/$count) . "%";
$Prozent_c = round($c*100/$count) . "%";
$Prozent_d = round($d*100/$count) . "%";

echo "Prozentualer Wert f&uumlr A: $Prozent_a.<br />";
echo "Prozentualer Wert f&uumlr B: $Prozent_b.<br />";
echo "Prozentualer Wert f&uumlr C: $Prozent_c.<br />";
echo "Prozentualer Wert f&uumlr D: $Prozent_d.<br />";



echo"
<a href = 'Voting_Studies_Test.php?Voting_ID=$Voting_ID'> Hier geht es zurück zum Voting.</a>"

    ?>