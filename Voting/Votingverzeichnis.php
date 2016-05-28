<!-- erstellte Votingdaten werden hier mithilfe von GET übermittelt
Darstellung der Daten in Tabellenform-->

<?php

include "../inc/head.php";
include "../inc/navbar.php";
include "../inc/footer.php";

?>

<?php //include("../inc/session_check.php"); ?>

<?php
require_once("Voting.php");
require_once("../Mapper/VotingManager.php");

require_once("../Vorlesung/Vorlesung.php");
require_once("../Mapper/VorlesungManager.php");

require_once("../VotingVorlesung/VotingVorlesungManager.php");


//eingetragenes Voting wird mittels GET Methode übermittelt
//neues Objekt der Klasse initiiert, um auf bestimmte Methoden zuzugreifen
$voting_ID = (int)htmlspecialchars($_GET["Voting_ID"], ENT_QUOTES, "UTF-8");
$votingManager = new VotingManager();
$voting = $votingManager->findById($voting_ID);
?>


<link rel="stylesheet" href="../css/bootstrap_verzeichnis.css">


<!DOCTYPE html>
<html>



<body>


<div class="container">
    <div class="jumbotron">
        <h1>Voting-Verzeichnis</h1>
    </div>

    <?php
    $votingManager = new VotingManager();
    $liste = $votingManager->findAll ();
    if (count($liste) > 0) { ?>
        <table class="table table-hover">
            <thead>
            <th>Nummer</th>
            <th>Voting-Name</th>
            <!--<th>Erstellungsdatum</th>
            <th>Ablaufzeit</th>-->
            <th></th>
            </thead>
            <tbody>
            <?php
            foreach ($liste as $voting) {
                echo "<tr>";
                echo "<td>$voting->voting_ID</td>";
                echo "<td>$voting->voting_name</td>"; ?>
                <td> <a type="button" class="btn btn-info" href="VotingRead.php" role="button">anzeigen</a> </td>
                <td> <a type="button" class="btn btn-primary" href="VotingUpdate_form.php" role="button">bearbeiten</a> </td>
                <td> <a type="button" class="btn btn-primary" href="VotingDelete.php" role="button">l&oumlschen</a> </td>
                <?php //nicht nötig echo "<td><a href='LeserUnconnect_do.php?notiz_id=$notiz->id&leser_id=$leser->id' class='btn btn-info btn-danger btn-xs' >Verbindung lösen</a>";
                echo "<td></td>";
                echo "</tr>";
            } }
            ?>
            </tbody>
        </table>
        <br>

    <a type="button" class="btn btn-primary" href="VotingCreate_form.php" role="button">Neues Voting erstellen</a>



</div>
</body>
</html>

