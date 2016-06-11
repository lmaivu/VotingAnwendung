<?php //include("../inc/session_check.php"); ?>

<?php

require_once("../Mapper/VotingManager.php");
require_once("Voting.php");

$voting_id = (int)htmlspecialchars($_GET["Voting_ID"], ENT_QUOTES, "UTF-8");
$votingManager = new VotingManager();
$voting = $votingManager->findById($voting_id);

?>

<!DOCTYPE html>
<html>


<?php include("../inc/head.php"); ?>

<body>

<?php include("../inc/navbar.php"); ?>

<div class="container">
    <h1>Voting-Eintrag <?php echo ($Voting->Voting_ID) ?></h1>
    <form action='VotingUpdate_do.php' method='post'>
        <input type='hidden' name='Voting_ID' value='<?php echo ($Voting->Voting_ID) ?>' />
        Name des Votings:<br>
        <input type='text' name='Voting_name' value='<?php echo ($Voting_Name) ?>' /><br>
        Ergebnis des Votings:<br>
        <input type='text' name='Voting_Ergebnis' value='<?php echo ($Voting->Voting_Ergebnis) ?>' /><br>
        Ablaufzeit des Votings:<br>
        <input type='date' name='Voting_Ablaufzeit' size='40' maxlength='80' value='<?php echo ($Voting->Voting_Ablaufzeit) ?>' /><br><br>
        <input type='submit' value='Eintrag speichern' />
    </form>
</div>
</body>
</html>