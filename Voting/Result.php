<!DOCTYPE html>
<html>

<head>
    <title>Charts mit JQuery / HTML5 Canvas</title>
</head>

<?php

include "../inc/head.php";
include "../inc/navbar.php";
include "../inc/sticky_footer.php";

include ("../inc/session_check.php");
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


?>


<head>
    <script src="../chartjs/js/Chart.min.js"></script>
    <script src="../chartjs/js/jquery.min.js"></script>
    <meta http-equiv="refresh" content="7" /> <!--Hier wird die Seite alle 7 Sekunden neu geladen> -->
</head>

<body>



<br>
<br>
<?php

if ($count == 0){?>
<h4>
    <?php echo "Es wurde bisher noch keine Stimme abgegeben.<br> <br>";?>
</h4>

<?php }
else {?>
    <h1> Hier k&oumlnnen Sie die Voting-Ergebnisse einsehen </h1>
    <br> <br> <br>
    <?php echo "Frage:<br/>"; ?>
    <h1> <?php echo $Voting->Frage; ?>"</h1>
    <?php
    $Prozent_a = round($a*100/$count) . "%";
    $Prozent_b = round($b*100/$count) . "%";
    $Prozent_c = round($c*100/$count) . "%";
    $Prozent_d = round($d*100/$count) . "%";}

echo
"<a style='background-color: #Cdbfa5; border-color: white; color: white; font-size: 15px' href='Voting_Aktivieren.php?Voting_ID=$Voting->Voting_ID' class='btn btn-success btn-sm'>Voting aktivieren</a>";
echo
"<a style='background-color: #8e7059; border-color: white; color: white; font-size: 15px' href='Voting_Deaktivieren.php?Voting_ID=$Voting->Voting_ID' class='btn btn-success btn-sm'>Voting deaktivieren</a>";
?>
<br>

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
                                borderColor: '#Cdbfa5',
                                hoverBackgroundColor: '#8e7059',
                                hoverBorderColor: '#Cdbfa5',
                                backgroundColor: '#Cdbfa5'

                            }]
                    },
                    options: {
                        cutoutPercentage: 0
                    }
                });

    </script>
        </div>
<h4> <?php echo "Erstellungsdatum:<br>";?> </h4>
<h5> <?php echo $Voting->Voting_Erstellung;?> </h5>
    <div>
        <input style='background-color: #534532; border-color: white; color: white; alignment: center' type="button" class="btn btn-default" value="Zurück" onClick="history.back()">
    </div>

</body>
</html>