<!-- erstellte Votingdaten werden hier mithilfe von GET übermittelt
Darstellung der Daten in Tabellenform-->

<?php

include "../inc/head.php";
include "../inc/navbar.php";
include "../inc/footer.php";

?>

<?php include("../inc/session_check.php"); ?>

<?php
require_once("Voting.php");
require_once("../Mapper/VotingManager.php");
require_once("../Vorlesung/Vorlesung.php");
require_once("../Mapper/VorlesungManager.php");
require_once("../VotingVorlesung/VotingVorlesungManager.php");
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
            <th>Ablaufzeit</th>
            <th>Erstellungsdatum</th>
            <th> </th>
            <!--<th>Erstellungsdatum</th>
            <th>Ablaufzeit</th>-->
                <th></th>
                </thead>
                <tbody>
                <?php
                foreach ($liste as $Voting) {
                echo "<tr>";
                echo "<td>$Voting->Voting_ID</td>";
                echo "<td>$Voting->Voting_Name</td>";;
                echo "<td>$Voting->Voting_Ablaufzeit</td>";
                echo "<td>$Voting->Voting_Erstellung</td>";
                ?>
                <td> <a type="button" class="btn btn-info" href="VotingRead.php" role="button">anzeigen</a> </td>
                <td> <a type="button" class="btn btn-primary" href="VotingUpdate_form.php" role="button">bearbeiten</a> </td>
                <td> <a type="button" class="btn btn-primary" href="VotingDelete.php" role="button">l&oumlschen</a> </td>
                <td> <a type="button" class="btn btn-primary" href="../Vorlesung/VorlesungRead.php" role="button">Vorlesung anzeigen</a>
                    <!--�berpr�fen!!!-->
                    <?php //nicht n�tig echo "<td><a href='LeserUnconnect_do.php?notiz_id=$notiz->id&leser_id=$leser->id' class='btn btn-info btn-danger btn-xs' >Verbindung l�sen</a>";
                    echo "<td></td>";
                    echo "</tr>";
                    } }
                    ?>
                </tbody>
            </table>
            <br>


<?php //echo "$Voting->Voting_ID"; ?>

</div>
</body>
</html>

