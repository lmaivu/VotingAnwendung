<!DOCTYPE html>
    <html>
<?php
include "../inc/cookie.php";
require_once "../Mapper/VotingManager.php";
require_once "../Voting/Voting.php";
include "../inc/head.php";
?>

<body>
<?php
$Voting_ID = (int)htmlspecialchars($_POST["Voting_ID"], ENT_QUOTES, "UTF-8");
$a_Student = (int)htmlspecialchars($_POST["a_Student"], ENT_QUOTES, "UTF-8");

$b_Student = (int)htmlspecialchars($_POST["b_Student"], ENT_QUOTES, "UTF-8");

$c_Student = (int)htmlspecialchars($_POST["c_Student"], ENT_QUOTES, "UTF-8");

$d_Student = (int)htmlspecialchars($_POST["d_Student"], ENT_QUOTES, "UTF-8");

$VotingManager = new VotingManager();
$Voting = $VotingManager->findById($Voting_ID);

$b_Student= $Voting->b_Student;
echo "das ist der b Wert in der DB: $b_Student ";
$b_Student= $Voting->b_Student+1;
$Voting = $VotingManager->updateB($Voting);
echo $b_Student;
//-------------Cookie checken, hat der Student schon gevoted?--------------------------
if (isset ($_COOKIE["$Voting->Voting_ID"] )) {
    echo "Sie haben bereits erfolgreich Ihre Voting-Stimme abgegeben. Jeder Student kann nur ein Mal abstimmen."; ?>
    <a href="#"> Hier k&oumlnnen Sie das Ergebnis anschauen. </a>
    <?php
}
    elseif (isset ($_POST["a_Student"])){
        $a_Student= $Voting->a_Student+1;
        $Voting = $VotingManager->updateA($Voting);
        echo "Sie haben erfolgreich für Antwort A abgestimmt.";
        echo "Gesamtanzahl abgebene Stimmen = $a_Student";

    }
    elseif(isset($_POST["b_Student"])){
        $b_Student= $Voting->b_Student+1;
        $Voting = $VotingManager->updateB($Voting);
        echo "Sie haben erfolgreich für Antwort B abgestimmt.";
        echo "Gesamtanzahl abgebene Stimmen = $b_Student";

}

    elseif (isset ($_POST["c_Student"])){
        $c_Student= $Voting->c_Student+1;
        $Voting = $VotingManager->updateC($Voting);
        echo "Sie haben erfolgreich für Antwort C abgestimmt.";
        echo "Gesamtanzahl abgebene Stimmen = $c_Student";

}

    elseif(isset ($_POST["d_Student"])){
        $d_Student= $Voting->d_Student+1;
        $Voting = $VotingManager->updateD($Voting);
        echo "Sie haben erfolgreich für Antwort D abgestimmt.";
        echo "Gesamtanzahl abgebene Stimmen = $d_Student";

}
    elseif (!isset ($_POST["a_Student"]) && ($_POST["b_Student"]) && ($_POST["c_Student"]) && ($_POST["d_Student"])) {}
        else
            echo "Fehler beim Abstimmen. Probieren Sie es erneut!";



$Voting = $VotingManager->countVote($Voting_ID);
$a = $Voting->a_Student;
$b = $Voting->b_Student;
$c = $Voting->c_Student;
$d = $Voting->d_Student;

$count = $a+$b+$c+$d;
echo $count;

$Prozent_a = round($a*100/$count) . "%";
$Prozent_b = round($b*100/$count) . "%";
$Prozent_c = round($c*100/$count) . "%";
$Prozent_d = round($d*100/$count) . "%";

echo $Prozent_a;
echo $Prozent_b;
echo $Prozent_c;
echo $Prozent_d;
?>


</body>
</html>