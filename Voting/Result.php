<!DOCTYPE html>
<html>

<style type="text/css">
    <!--

    .vote {
        cursor: pointer;
        font: 15px Verdana,sans-serif;
        color: white;
        background-color: #8e7059;
        border-color: white;
        width: 50px;
        padding: 2px;
        line-height: 130%;
        position: center;
    }

    -->
</style>

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
$a = $Voting->a_Student;
$b = $Voting->b_Student;
$c = $Voting->c_Student;
$d = $Voting->d_Student;
$count = $a+ $b+ $c+ $d;

if ($count == 0){?>
<h4> <?php echo "Es wurde bisher noch keine Stimme abgegeben.<br> <br>";?> </h4>

<?php }
else {?>
    <h1> Hier k&oumlnnen Sie die Voting-Ergebnisse einsehen </h1>
    <br> <br> <br>
    <h1> <?php echo "Frage:<br/>"; ?> </h1>
    <h1> "<?php echo $Voting->Frage; ?>"</h1>
    <?php
    $Prozent_a = round($a*100/$count) . "%";
    $Prozent_b = round($b*100/$count) . "%";
    $Prozent_c = round($c*100/$count) . "%";
    $Prozent_d = round($d*100/$count) . "%";}

echo
"<a style='background-color: #Cdbfa5; border-color: white; color: white; font-size: 15px'
href='Voting_Aktivieren.php?Voting_ID=$Voting->Voting_ID' class='btn btn-success btn-sm'>Voting aktivieren</a>";
echo
"<a style='background-color: #8e7059; border-color: white; color: white; font-size: 15px'
href='Voting_Deaktivieren.php?Voting_ID=$Voting->Voting_ID' class='btn btn-success btn-sm'>Voting deaktivieren</a>";
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

                });

    </script>

        </div>

<br>
<div class="form-group">

    <div class="col-sm-offset-2 col-sm-2">
<input class="vote" type="submit" value="A" > <?php echo "$Voting->Antwort_A";?>
     </div>
    <div class="col-sm-2">
<input class="vote" type="submit" value="B" > <?php echo "$Voting->Antwort_B";?>
    </div>
    <div class="col-sm-2">
<input class="vote" type="submit" value="C" > <?php echo "$Voting->Antwort_C";?>
    </div>
    <div class="col-sm-2">
<input class="vote" type="submit" value="D" > <?php echo "$Voting->Antwort_D";?>
</div>
    <div class= "col-sm-offset-2 offset-sm-2"></div>
 </div>

<br>
<br>
<h4> <?php echo "Erstellungsdatum:<br>";?> </h4>
<h5> <?php echo $Voting->Voting_Erstellung;?> </h5>

<?php

$Prozent_a = round($a*100/$count) . "%";
$Prozent_b = round($b*100/$count) . "%";
$Prozent_c = round($c*100/$count) . "%";
$Prozent_d = round($d*100/$count) . "%";
echo "<strong>Gesamtanzahl der Votings:</strong> $count.<br />";
echo "<strong>Prozentualer Wert f&uumlr A:</strong> $Prozent_a<br />";
echo "<strong>Prozentualer Wert f&uumlr B:</strong> $Prozent_b<br />";
echo "<strong>Prozentualer Wert f&uumlr C:</strong> $Prozent_c<br />";
echo "<strong>Prozentualer Wert f&uumlr D:</strong> $Prozent_d<br />";
echo "<br />";

?>
    <div>
        <input style='background-color: #534532; border-color: white; color: white; alignment: center' type="button" class="btn btn-default" value="Zurück" onClick="history.back()">
    </div>

</body>
</html>