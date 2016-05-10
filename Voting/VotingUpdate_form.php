<?php include("../inc/session_check.php"); ?>

<?php

require_once("VotingManager.php");
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
    <h1>Eintrag # <?php echo ($voting->id) ?></h1>
    <form action='VotingUpdate_do.php' method='post'>
        <input type='hidden' name='Voting_id' value='<?php echo ($voting->id) ?>' />
        Betreff:<br>
        <input type='text' name='betreff' value='<?php echo ($voting->betreff) ?>' /><br>
        Autor:<br>
        <input type='text' name='name' value='<?php echo ($voting->name) ?>' /><br>
        Text des Aushangs:<br>
        <input type='text' name='text' size='40' maxlength='80' value='<?php echo ($voting->text) ?>' /><br><br>
        <input type='submit' value='update!' />
    </form>
</div>
</body>
</html>