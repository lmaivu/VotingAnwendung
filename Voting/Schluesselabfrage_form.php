<?php

include ("../inc/head.php");
require_once("Voting.php");
require_once("../Mapper/VotingManager.php");

$Voting_ID = (int)htmlspecialchars($_GET["Voting_ID"], ENT_QUOTES, "UTF-8");

echo $Voting_ID;

?>

<!DOCTYPE html>
<html>
<body>

<?php
$VotingManager = new VotingManager();
$Voting = $VotingManager->findById($Voting_ID);



echo ($Voting);
$neuesErgebnis = $Voting->aktiv;
echo $neuesErgebnis;

if ($neuesErgebnis == 1) {

?>
<h2>Bitte geben Sie den Einschreibeschlüssel ein.</h2>

<form class="form-horizontal" role="form" action="Voting_Studies_Test.php" method="post">
    <br>
    <div class="form-group">
        <label class="control-label col-sm-4" for="name">Schl&uumlssel: </label>
        <div class="col-sm-5">
            <input type="password" class="form-control" name="Einschreibeschlussel" id="Einschreibeschlussel" placeholder="Einschreibeschlüssel">
            <input type="hidden" value="<?php echo $Voting_ID?>" name="Voting_ID">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-4">
            <button style="background-color: #534532; border-color: white; color: white" type="submit" class="btn btn-default">Go!</button>
        </div>
    </div>
<div class="Fehlermeldung">
<?php }

else {
    echo "Das Voting wurde bereits beendet.";
}?>
</div>



</body>
</html>
