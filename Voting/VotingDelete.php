<?php include_once("../inc/session_check.php");; ?>

<?php
require_once("../Voting/Voting.php");
require_once("../Mapper/VotingManager.php");

$Voting_ID = (int)htmlspecialchars($_GET["Voting_ID"], ENT_QUOTES, "UTF-8");


echo "$Voting_ID";
$VotingManager = new VotingManager();
$Voting = $VotingManager->findById($Voting_ID);
echo "$Voting";
$VotingManager->delete($Voting);
echo "$Voting";
if(isset ($Voting))
{
    ?>
    <script>alert("Löschen war erfolgreich!");</script>
    <?php
}
else
{
    ?>
    <script>alert("Fehler beim Löschen!");</script>
    <?php
}
?>
<br>

<a href="../Vorlesung/Vorlesungsverzeichnis.php"> Hier geht es zurück zum Vorlesungsverzeichnis</a>

<?php
//echo "Das Voting wurde erfolgreich gelöscht."; //Überlegung POP-UP Fenster programmieren zur Abfrage der Löschbestätigung
//header('Location: ../Vorlesung/Vorlesungsverzeichnis.php');

?>