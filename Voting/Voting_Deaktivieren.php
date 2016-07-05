<?php
    include("../inc/head.php");
?>

<!DOCTYPE html>
<html>

<?php
require_once("Voting.php");
require_once("../Mapper/VotingManager.php");

$daten = mysqli_connect("localhost", "lv018", "naiT0ohd0e", "u-lv018");

$Voting_ID = (int)htmlspecialchars($_GET["Voting_ID"], ENT_QUOTES, "UTF-8");

$VotingManager = new VotingManager();
$Voting = $VotingManager->findById($Voting_ID);
?>

<div class="Fehlermeldung">

<?php
if ($Voting->aktiv ==1) {
    $aktiv = "UPDATE Voting SET aktiv=0 WHERE Voting_ID=$Voting_ID";
    $aktiv_daten = mysqli_query($daten, $aktiv);
    echo " Sie haben das Voting erfolgreich beendet.</br>
    Hier kommen Sie zur&uumlck zum Voting.</br><br>"; ?>
    <input style='background-color: #534532; border-color: white; color: white;' type="button" class="btn btn-default" value="Zurück" onClick="history.back()">
<?php }
else {
    echo "Das Voting kann erst nach der Freigabe deaktiviert werden.<br />";
    echo " Hier kommen Sie zur&uumlck zum Voting.</br><br>"; ?>
    <input style='background-color: #Cdbfa5; border-color: white; color: white;' type="button" class="btn btn-default" value="Zurück" onClick="history.back()">
<?php } ?>
</div>

</html>