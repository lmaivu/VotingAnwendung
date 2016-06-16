<!-- erstellte Votingdaten werden hier mithilfe von GET �bermittelt
Darstellung der Daten in Tabellenform-->


<?php

include "../inc/head.php";
include "../inc/navbar.php";

?>

<?php include("../inc/session_check.php"); ?>

<?php
require_once("Vorlesung.php");
require_once("../Mapper/VorlesungManager.php");

require_once("../Mapper/VotingManager.php");
?>

<head>
<link rel="stylesheet" href="../css/bootstrap_verzeichnis.css">
</head>

<!DOCTYPE html>
<html>


<body>


<div id="kopfleiste">
    <div class="jumbotron">
        <h1>Vorlesungs-Verzeichnis</h1>
    </div>


    <div id="container">
        <?php
        $VorlesungManager = new VorlesungManager();
        $liste = $VorlesungManager->findAll($dozent); //$liste = $VorlesungManager->findAll($dozent->Dozent_ID)
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
                echo "<td>"; $Vorlesung_ID=$Vorlesung->Vorlesung_ID; echo" $Vorlesung_ID </td>";
                echo "<td>$Vorlesung->Vorlesung_Name</td>";
                echo "<td>
<<<<<<< HEAD
                    <a href='VorlesungRead.php?Vorlesung_ID=$Vorlesung_ID' type='button' class='btn btn-info' role='button'>anzeigen</a>
                    <a href='VorlesungUpdate_form.php?Vorlesung_ID=$Vorlesung_ID' type='button' class='btn btn-primary' role='button'>bearbeiten</a>
                    <a href='VorlesungDelete.php?Vorlesung_ID=$Vorlesung_ID' type='button' class='btn btn-primary' role='button'>l&oumlschen</a>
                    <a href='../Voting/VotingRead.php' type='button' class='btn btn-primary'  role='button'>Voting anzeigen</a>
=======
                    <a href='VorlesungRead.php?Vorlesung_ID=$Vorlesung->Dozent_ID' type='button' class='btn btn-info' role='button'>anzeigen</a>
                    <a href='VorlesungUpdate_form.php?Vorlesung_ID=$Vorlesung->Dozent_ID' type='button' class='btn btn-primary' role='button'>bearbeiten</a>
                    <a href='VorlesungDelete.php?Vorlesung_ID=$Vorlesung->Dozent_ID' type='button' class='btn btn-primary' role='button'>l&oumlschen</a>
                   <!--<a href='VorlesungDelete.php' type='button' class='btn btn-primary' role='button'>l&oumlschen</a> -->
                    <a href='../Voting/VotingCreate_form.php?Vorlesung_ID=$Vorlesung->Vorlesung_ID' type='button' class='btn btn-primary'  role='button'>Voting erstellen</a>
>>>>>>> origin/master

            </td>";
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


    </div> <!--container-->
</div>
    <div>
    <?php include "../inc/footer.php"; ?>
</div>

</body>

</html>