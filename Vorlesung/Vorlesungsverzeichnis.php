<!-- erstellte Votingdaten werden hier mithilfe von GET �bermittelt
Darstellung der Daten in Tabellenform-->

<?php

include "../inc/head.php";
include "../inc/navbar.php";
include "../inc/footer.php";

?>

<?php //include("../inc/session_check.php"); ?>

<?php
require_once("Vorlesung.php");
require_once("../Mapper/VorlesungManager.php");

//require_once("../Voting/Voting.php");
require_once("../Mapper/VotingManager.php");

require_once("../VotingVorlesung/VotingVorlesungManager.php");
?>

<head>
<link rel="stylesheet" href="../css/bootstrap_verzeichnis.css">
</head>

<!DOCTYPE html>
<html>


<body>


<div class="container">
    <div class="jumbotron">
        <h1>Vorlesungs-Verzeichnis</h1>
    </div>

    <?php
    $VorlesungManager = new VorlesungManager();
    $liste = $VorlesungManager->findAll($dozent->Dozent_ID);
    if (count($liste) > 0) { ?>
    <table class="table table-hover">
        <thead>
        <th>Nummer</th>
        <th>Vorlesung-Name</th>
        <th></th>
        </thead>
        <tbody>
        <?php
        foreach ($liste as $Vorlesung) {
            echo "<tr>";
            echo "<td>$Vorlesung->Vorlesung_ID</td>";
            echo "<td>$Vorlesung->Vorlesung_Name</td>";
             ?>
            <!--<td> <a type="button" class="btn btn-info" href="VorlesungRead.php" role="button">anzeigen</a> </td>-->
        <td> <a type="button" class="btn btn-info" href="VorlesungRead.php?Vorlesung_ID=$Vorlesung->Dozent_ID" role="button">anzeigen</a> </td>
            <td> <a type="button" class="btn btn-primary" href="VorlesungUpdate_form.php?Vorlesung_ID=$Vorlesung->Dozent_ID" role="button">bearbeiten</a> </td>
            <td> <a type="button" class="btn btn-primary" href="VorlesungDelete.php?Vorlesung_ID=$Vorlesung->Dozent_ID" role="button">l&oumlschen</a> </td>
            <td> <a type="button" class="btn btn-primary" href="../Voting/VotingRead.php?Vorlesung_ID=$Vorlesung->Dozent_ID" role="button">Voting anzeigen</a>
                <!--�berpr�fen!!!-->
            <?php //nicht n�tig echo "<td><a href='LeserUnconnect_do.php?notiz_id=$notiz->id&leser_id=$leser->id' class='btn btn-info btn-danger btn-xs' >Verbindung l�sen</a>";
            echo "<td></td>";
            echo "</tr>";
        } }
            else
            echo "Es sind noch keine Vorlesungen vorhanden."
        ?>
        </tbody>
    </table>
    <br>

    <a type="button" class="btn btn-primary" href="VorlesungCreate_form.php" role="button">Neue Vorlesung hinzuf&uumlgen</a>




</div>

</body>

</html>

