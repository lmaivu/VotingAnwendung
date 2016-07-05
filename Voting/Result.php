<!-- session als Kommentar, jquery??? warum klappt das verdammt nochmal nicht-->

<!DOCTYPE html>
<html>

<head>
    <title>Charts mit JQuery / HTML5 Canvas</title>
    <!--<script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
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

$VotingManager->countVote($Voting_ID);
$a = $Voting->a_Student;
$b = $Voting->b_Student;
$c = $Voting->c_Student;
$d = $Voting->d_Student;

$count = $a+ $b+ $c+ $d;

$Prozent_a = round($a*100/$count) . "%";
$Prozent_b = round($b*100/$count) . "%";
$Prozent_c = round($c*100/$count) . "%";
$Prozent_d = round($d*100/$count) . "%";;

?>



<?php
//$Voting = new Voting($votingdaten);
//$VotingManager = new VotingManager();?>

<head>
    <script src="../chartjs/js/Chart.min.js"></script>
    <script src="../chartjs/js/jquery.min.js"></script>
</head>

<body>

<?php
echo
"<a style='background-color: #8e7059; border-color: white' href='Voting_Aktivieren.php?Voting_ID=$Voting->Voting_ID' class='btn btn-success btn-sm'>Voting aktivieren</a>";
echo
"<a style='background-color: #8e7059; border-color: white' href='Voting_Deaktivieren.php?Voting_ID=$Voting->Voting_ID' class='btn btn-success btn-sm'>Voting deaktivieren</a>";
?>
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