<!DOCTYPE html>
<html>

<?php
require_once("Voting.php");
require_once("../Mapper/VotingManager.php");

$daten = mysqli_connect("localhost", "lv018", "naiT0ohd0e", "u-lv018");

$Voting_ID = (int)htmlspecialchars($_GET["Voting_ID"], ENT_QUOTES, "UTF-8");

$VotingManager = new VotingManager();
$Voting = $VotingManager->findById($Voting_ID);

if ($Voting->aktiv ==0) {
    $aktiv = "UPDATE Voting SET aktiv=1 WHERE Voting_ID=$Voting_ID";
    $aktiv_daten = mysqli_query($daten, $aktiv);
    echo " Sie haben das Voting erfolgreich freigegeben.</br>
    Hier kommen Sie zur&uumlck zum Voting.</br>"; ?>
    <input style='background-color: #534532; border-color: white; color: white;' type="button" class="btn btn-default" value="Zur�ck" onClick="history.back()">
<?php }
else {
    echo "Das Voting ist bereits aktiviert.";
    echo " Hier kommen Sie zur&uumlck zum Voting.</br>"; ?>
    <input style='background-color: #534532; border-color: white; color: white;' type="button" class="btn btn-default" value="Zur�ck" onClick="history.back()">
<?php } ?>


</html>