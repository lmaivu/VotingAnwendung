<?php include("../inc/cookie.php"); ?>
<!DOCTYPE html>
    <html>
<?php
//error_reporting(E_ALL);
require_once "../Mapper/VotingManager.php";
require_once "../Voting/Voting.php";
include "../inc/head.php";
?>


<body>
<?php

$Voting_ID = (int)htmlspecialchars($_POST["Voting_ID"], ENT_QUOTES, "UTF-8");

$a_Student = (int)htmlspecialchars($_POST["A"], ENT_QUOTES, "UTF-8");

$b_Student = (int)htmlspecialchars($_POST["B"], ENT_QUOTES, "UTF-8");

$c_Student = (int)htmlspecialchars($_POST["C"], ENT_QUOTES, "UTF-8");

$d_Student = (int)htmlspecialchars($_POST["D"], ENT_QUOTES, "UTF-8");

$VotingManager = new VotingManager();
$Voting = $VotingManager->findById($Voting_ID);

//-------------Cookie checken, hat der Student schon gevoted?--------------------------
if (isset ($_COOKIE["$Voting->Voting_ID"] )) {
    echo "Sie haben bereits erfolgreich Ihre Voting-Stimme abgegeben. Jeder Student kann nur ein Mal abstimmen."; ?>
    <!--<a href="#"> Hier k&oumlnnen Sie das Ergebnis anschauen. </a> -->
    <?php
}
    elseif (isset ($_POST["A"])){
        //$a_Student= $Voting->a_Student+1;
        $Voting = $VotingManager->updateA($Voting);
        $a_Student= $Voting->a_Student;
        echo "$a_Student";
        echo "Sie haben erfolgreich für Antwort A abgestimmt.<br />";

    }
    elseif(isset($_POST["B"])){
        $b_Student= $Voting->b_Student+1;
        $Voting = $VotingManager->updateB($Voting);
        echo "Sie haben erfolgreich für Antwort B abgestimmt.";

}

    elseif (isset ($_POST["C"])){
        $c_Student= $Voting->c_Student+1;
        $Voting = $VotingManager->updateC($Voting);
        echo "Sie haben erfolgreich für Antwort C abgestimmt.";

}

    elseif(isset ($_POST["D"])){
        $d_Student= $Voting->d_Student+1;
        $Voting = $VotingManager->updateD($Voting);
        echo "Sie haben erfolgreich für Antwort D abgestimmt.";

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


?>
<a href = "Voting_Studies_Test.php"> Hier geht es zurück zum Voting.</a>

</body>
</html>