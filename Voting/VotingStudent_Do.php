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
    echo "Sie haben erfolgreich Ihre Voting-Stimme abgegeben."; ?>
    <a href="#"> Hier können Sie das Ergebnis anschauen. </a>
    <?php
}
    elseif (!isset ($_COOKIE["voted"] )) {
        echo "Fehler beim Abstimmen. Probiere Sie es erneut!";}

elseif ( $_COOKIE["voted"] == $Voting->Voting_ID) {
    echo "Sie haben bereits Ihre Stimme abgegeben. Jeder Student kann nur ein Mal abstimmen.";
    die();

}
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