<!DOCTYPE html>
    <html>
<?php
include "../inc/cookie.php";
require_once "../Mapper/VotingManager.php";
require_once "../Voting/Voting.php";
include "../inc/head.php";
include "../inc/navbar.php";?>

<body>
<?php
$Voting_ID = (int)htmlspecialchars($_POST["Voting_ID"], ENT_QUOTES, "UTF-8");
$VotingManager = new VotingManager();
$Voting = $VotingManager->findById($Voting_ID);

//-------------Cookie checken, hat der Student schon gevoted?--------------------------
if (isset ($_COOKIE["voted"] )) {
    echo "Sie haben bereits erfolgreich Ihre Voting-Stimme abgegeben. Jeder Student kann nur ein Mal abstimmen."; ?>
    <a href="#"> Hier können Sie das Ergebnis anschauen. </a>
    <?php
}
    elseif (isset($_POST['Antwort_A'])){
        $a_Student = "UPDATE Voting SET a_Student=a_Student+1 WHERE Voting_ID=$Voting_ID";

    }
    elseif(isset($_POST['Antwort_B'])){
    $b_Student = "UPDATE Voting SET b_Student=b_Student+1 WHERE Voting_ID=$Voting_ID";

}

    elseif (isset($_POST['Antwort_C'])){
    $c_Student = "UPDATE Voting SET c_Student=c_Student+1 WHERE Voting_ID=$Voting_ID";

}

    elseif(isset($_POST['Antwort_D'])){
    $d_Student = "UPDATE Voting SET d_Student=d_Student+1 WHERE Voting_ID=$Voting_ID";

}
    elseif (!isset ($_COOKIE["voted"] )) {
        echo "Fehler beim Abstimmen. Probiere Sie es erneut!";}



$Voting = $VotingManager->countVote($Voting_ID);


$a = $Voting->a_Student;
$b = $Voting->b_Student;
$c = $Voting->c_Student;
$d = $Voting->d_Student;

$count = $a+$b+$c+$d;

$Prozent_a = round($a*100/$count) . "%";
$Prozent_b = round($b*100/$count) . "%";
$Prozent_c = round($c*100/$count) . "%";
$Prozent_d = round($d*100/$count) . "%";
?>


</body>
</html>