<?php //include("../inc/cookie.php"); ?>
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

$a_Student = $_POST["A"];

$b_Student = $_POST["B"];

$c_Student = $_POST["C"];

$d_Student = $_POST["D"];



$VotingManager = new VotingManager();
$Voting = $VotingManager->findById($Voting_ID);

//-------------Cookie checken, hat der Student schon gevoted?--------------------------
if ((isset ($_COOKIE["Bl"] ))) {
    echo "Sie haben bereits erfolgreich Ihre Voting-Stimme abgegeben. Jeder Student kann nur ein Mal abstimmen."; ?>
    <!--<a href="#"> Hier k&oumlnnen Sie das Ergebnis anschauen. </a> -->
    <?php
}
    elseif (isset ($_POST["A"])){
        $VotingManager->updateA($Voting);
        echo "$Voting->a_Student";
        echo "Sie haben erfolgreich für Antwort A abgestimmt.<br />";

    }
    elseif(isset($_POST["B"])){
       $VotingManager->updateB($Voting);
        echo "Sie haben erfolgreich für Antwort B abgestimmt.<br />";

}

    elseif (isset ($_POST["C"])){
        $VotingManager->updateC($Voting);
        echo "Sie haben erfolgreich für Antwort C abgestimmt.<br />";

}

    elseif(isset ($_POST["D"])){
        $VotingManager->updateD($Voting);
        echo "Sie haben erfolgreich für Antwort D abgestimmt.<br />";

}



$a = $Voting->a_Student;
$b = $Voting->b_Student;
$c = $Voting->c_Student;
$d = $Voting->d_Student;

//Prozentsatz in DB speichern und ausgeben
$count = $a+$b+$c+$d;
echo "Hier können Sie die Übersicht sehen.<br/>.<br/>";
echo "Gesamtanzahl der Votings: $count.<br />";

$daten = mysqli_connect("localhost", "lv018", "naiT0ohd0e", "u-lv018");
$neuA = round($a*100/$count) ;
$neuB = round($b*100/$count) ;
$neuC = round($c*100/$count) ;
$neuD = round($d*100/$count) ;

$neuesErgebnisA = "UPDATE Voting SET a_Student=5  WHERE Voting_ID=$Voting_ID";
$runErgebnis=mysqli_query($daten, $neuesErgebnisA);

//$VotingManager->updateProzent($Voting);


echo "Prozentualer Wert f&uumlr A: $neuA%<br />";
echo "Prozentualer Wert f&uumlr B: $neuB%<br />";
echo "Prozentualer Wert f&uumlr C: $neuC%<br />";
echo "Prozentualer Wert f&uumlr D: $neuD%<br />";

?>


<!DOCTYPE HTML>
<html>
<br />
<head>
    <script src="../chartjs/js/Chart.min.js"></script>
    <script src="../chartjs/js/jquery.min.js"></script>
</head>
<body>
<div class="container">
    <canvas id="myChart">
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["A", "B", "C", "D"],
                    datasets: [
                        {
                            data: [<?php echo $a ?>, <?php echo $b ?>, <?php echo $c ?>, <?php echo $d ?>],
                            label: 'Voting Ergebnis',
                            borderColor: 'rgba (230, 230, 180, 1)',
                            hoverBackgroundColor: 'rgba (245,245,200, 1,5)',
                            hoverBorderColor: 'rgba (230,230,180, 1,5)',
                            backgroundColor:  'rgba(245,245,200, 1)'

                        }]
                },
                options: {
                    cutoutPercentage: 0
                }
            });
        </script>
</div>
</body>
</html>
</body>
</html>