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
$a_Student = (int)htmlspecialchars($_POST["a_Student"], ENT_QUOTES, "UTF-8");
$b_Student = (int)htmlspecialchars($_POST["b_Student"], ENT_QUOTES, "UTF-8");
$c_Student = (int)htmlspecialchars($_POST["c_Student"], ENT_QUOTES, "UTF-8");
$d_Student = (int)htmlspecialchars($_POST["d_Student"], ENT_QUOTES, "UTF-8");
$VotingManager = new VotingManager();
$Voting = $VotingManager->findById($Voting_ID);

//-------------Cookie checken, hat der Student schon gevoted?--------------------------
if (isset ($_COOKIE["$Voting->Voting_ID"] )) {
    echo "Sie haben bereits erfolgreich Ihre Voting-Stimme abgegeben. Jeder Student kann nur ein Mal abstimmen."; ?>
    <a href="#"> Hier k&oumlnnen Sie das Ergebnis anschauen. </a>
    <?php
}
    elseif (isset ($a_Student)){
        $Voting = $VotingManager->updateA($Voting);
        echo $a_Student;
        echo "Sie haben erfolgreich für Antwort A abgestimmt.";

    }
    elseif(isset($b_Student)){
        $Voting = $VotingManager->updateB($Voting);
        echo "Sie haben erfolgreich für Antwort B abgestimmt.";

}

    elseif (isset($c_Student)){
        $Voting = $VotingManager->updateC($Voting);
        echo "Sie haben erfolgreich für Antwort C abgestimmt.";

}

    elseif(isset($d_Student)){
        $Voting = $VotingManager->updateD($Voting);
        echo "Sie haben erfolgreich für Antwort D abgestimmt.";

}
    elseif (!isset ($a_Student) && ($b_Student) && ($c_Student) && ($d_Student)) {
        echo "Fehler beim Abstimmen. Probieren Sie es erneut!";}



$Voting = $VotingManager->countVote($Voting_ID);

$a = $Voting->a_Student;
$b = $Voting->b_Student;
$c = $Voting->c_Student;
$d = $Voting->d_Student;

$count = $a+$b+$c+$d;
//$count= 5;

$Prozent_a = round($a*100/$count) . "%";
$Prozent_b = round($b*100/$count) . "%";
$Prozent_c = round($c*100/$count) . "%";
$Prozent_d = round($d*100/$count) . "%";
?>


</body>
</html>