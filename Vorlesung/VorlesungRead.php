<?php
include("../inc/session_check.php");

require_once("../Vorlesung/Vorlesung.php");
require_once("../Mapper/VorlesungManager.php");
require_once ("../Voting/Voting.php");
require_once("../Mapper/VotingManager.php");

$Vorlesung_ID = (int)htmlspecialchars($_GET["Vorlesung_ID"], ENT_QUOTES, "UTF-8");
$Voting_ID = (int)htmlspecialchars($_GET["Voting_ID"], ENT_QUOTES, "UTF-8");
$Vorlesung_Name = htmlspecialchars($_GET["Vorlesung_Name"], ENT_QUOTES, "UTF-8");
$Dozent_ID = (int)htmlspecialchars($_GET["Dozent_ID"], ENT_QUOTES, "UTF-8");
$VorlesungManager = new VorlesungManager();
$Vorlesung = $VorlesungManager->findById($Vorlesung_ID);

?>

<link rel="stylesheet" href="../css/bootstrap_verzeichnis.css">

<!DOCTYPE html>
<html>

<?php include("../inc/head.php"); ?>

<body>

<?php include("../inc/navbar.php"); ?>

<div id="kopfleiste">
    <div class="container">
        <div class="jumbotron" style=background:whitesmoke>
            <h1><?php echo $Vorlesung->Vorlesung_Name ?></h1><br />
            <?php echo "<a style='background-color: #Cdbfa5; color: white' href='../Voting/VotingCreate_form.php?Vorlesung_ID=$Vorlesung_ID&Dozent_ID=$Dozent_ID' class='btn btn-default' role='button'><span class='glyphicon glyphicon-stats'></span> Voting anlegen</a>" ?>
        </div>
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
        $liste = $VotingManager->findAll($Vorlesung); //kein Parameter eig???
        foreach ($liste as $Voting) {
            echo "<tr>";
            echo "<td>$Voting->Voting_ID</td>";
            echo "<td>$Voting->Frage</td>";
            echo "<td>$Voting->Antwort_A</td>";
            echo "<td>$Voting->Antwort_B</td>";
            if(isset($Voting->Antwort_C) && !empty($Voting->Antwort_C)) {
            echo "<td>$Voting->Antwort_C</td>";}
        if(isset($Voting->Antwort_D) && !empty($Voting->Antwort_D)) {
            echo "<td>$Voting->Antwort_D</td>"; }
            echo "<td>
                        <a style='background-color: #Cdbfa5; border-color: white' href='../Mapper/qr_code.php?Voting_ID=$Voting->Voting_ID' class='btn btn-primary btn-sm'>QR-Code</a>
                        <a style='background-color: #8e7059; border-color: white' href='../Voting/Result.php?Voting_ID=$Voting->Voting_ID' class='btn btn-success btn-sm'>anzeigen</a>
                        <a style='background-color: #534532; border-color: white' href='../Voting/VotingDelete.php?Voting_ID=$Voting->Voting_ID' class='btn btn-danger btn-sm'>löschen</a>

                      </td>";
            echo "</tr>";
        }
        ?>
        </tbody>
        <?php echo "<a style='background-color: #8e7059; border-color: white; font-size: 20px;' href='../Voting/Voting_Studies_Test2.php?Voting_ID=$Voting->Voting_ID' class='btn btn-danger btn-sm'>Studi-Seite</a>" ?>
</div>

</body>
</html>

<?php include("../inc/sticky_footer.php"); ?>

