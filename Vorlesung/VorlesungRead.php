<?php
include("../inc/session_check.php");

require_once("../Vorlesung/Vorlesung.php");
require_once("../Mapper/VorlesungManager.php");

$Vorlesung_ID = (int)htmlspecialchars($_GET["Vorlesung_ID"], ENT_QUOTES, "UTF-8");
$VorlesungManager = new VorlesungManager();
$Vorlesung = $VorlesungManager->findById($Vorlesung_ID);
?>

<!DOCTYPE html>
<html>

<?php include("../inc/head.php"); ?>

<body>

<?php include("../inc/navbar.php"); ?>

<div class="container">
    <div class="jumbotron" style=background:whitesmoke>
        <h1><?php echo $Vorlesung->Vorlesung_Name ?></h1><br />
        <?php echo "<a href='../Voting/VotingCreate_form.php?Vorlesung_ID=$Vorlesung_ID' class='btn btn-default' role='button'><span class='glyphicon glyphicon-stats'></span> Voting anlegen</a>" ?>
    </div>
</div>

<div class="container">

    <h1>Votings</h1>
    <table class="table table-hover table-striped">
        <thead>
        <tr><th class="col-md-1">ID</th>
            <th class="col-md-2">Frage</th>
            <th class="col-md-1">Antwort A</th>
            <th class="col-md-1">Antwort B</th>
            <th class="col-md-1">Antwort C</th>
            <th class="col-md-1">Antwort D</th>
            <th class="col-md-2">Optionen</th></tr>
        </thead>
        <tbody>

        <?php
        require_once("../Voting/Voting.php");
        require_once("../Mapper/VotingManager.php");
        $VotingManager = new VotingManager();
        $liste = $VotingManager->findAll($Voting->Voting_ID); //kein Parameter eig???
        foreach ($liste as $Voting) {
            echo "<tr>";
            echo "<td>$Voting->Voting_ID</td>";
            echo "<td>$Voting->frage</td>";
            echo "<td>$Voting->a</td>";
            echo "<td>$Voting->b</td>";
            echo "<td>$Voting->c</td>";
            echo "<td>$Voting->d</td>";
            echo "<td>
                        <a href='QR_Code.php?voting_id=$Voting->Voting_ID' class='btn btn-primary btn-sm'>QR-Code</a>
                        <a href='VotingResult.php?voting_id=$Voting->Voting_ID' class='btn btn-success btn-sm'>anzeigen</a>
                        <a href='VotingDelete_do.php?voting_id=$Voting->Voting_ID' class='btn btn-danger btn-sm'>löschen</a>
                      </td>";
            echo "</tr>";
        }
        ?>
        </tbody>
</div>

</body>
</html>

<?php include("../inc/footer.php"); ?>

