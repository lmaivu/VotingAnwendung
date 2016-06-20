<!-- erstellte Votingdaten werden hier mithilfe von GET uebermittelt
Darstellung der Daten in Tabellenform-->

<!-- eingebettete Dateien -->
<?php

include "../inc/head.php";
include "../inc/navbar.php";

include("../inc/session_check.php");

require_once("Vorlesung.php");
require_once("../Mapper/VorlesungManager.php");

require_once("../Mapper/VotingManager.php");
?>
<!-- eingebettete Dateien Ende -->


<head>
<link rel="stylesheet" href="../css/bootstrap_verzeichnis.css">
</head>



<!DOCTYPE html>
<html>
<body>


<div id="kopfleiste">
    <div class="jumbotron">
        <h1>Vorlesungsverzeichnis</h1>
    </div>
</div>

    <div id="Tabelle">
        <div class="container">
        <?php
        $VorlesungManager = new VorlesungManager();
        $liste = $VorlesungManager->findAll($dozent);
        if (count($liste) > 0) { ?>
        <table class="table table-hover table-responsive">
            <thead class="row">
            <th class="col-sm-2"> Nummer</th>
            <th class="col-sm-4">Vorlesung-Name</th>
            <th class="col-sm-6">Optionen</th>
            </thead>
            <tbody>
            <?php
            foreach ($liste as $Vorlesung) {
                echo "<tr>";
                echo "<td>"; $Vorlesung_ID=$Vorlesung->Vorlesung_ID; echo" $Vorlesung_ID </td>";
                echo "<td>$Vorlesung->Vorlesung_Name</td>";
                echo "<td>

                    <a href='VorlesungRead.php?Vorlesung_ID=$Vorlesung_ID' type='button' class='btn btn-info' role='button'>anzeigen</a>
                    <!--<a href='VorlesungUpdate_form.php?Vorlesung_ID=$Vorlesung_ID' type='button' class='btn btn-primary' role='button'>bearbeiten</a> -->
                    <a href='VorlesungDelete.php?Vorlesung_ID=$Vorlesung_ID' type='button' class='btn btn-primary' role='button'>l&oumlschen</a>
                    <a href='../Voting/VotingCreate_form.php?Vorlesung_ID=$Vorlesung_ID' type='button' class='btn btn-primary'  role='button'>Voting erstellen</a>


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
        <br>
        <br>
        </div>


    </div> <!--container-->

<!-- footer -->
<div>
    <?php include "../inc/footer.php"; ?>
</div>

<!-- footer Ende -->

</body>

</html>