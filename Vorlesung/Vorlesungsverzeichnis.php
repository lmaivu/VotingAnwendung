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


//eingetragenes Voting wird mittels GET Methode �bermittelt
//neues Objekt der Klasse initiiert, um auf bestimmte Methoden zuzugreifen
$vorlesung_ID = (int)htmlspecialchars($_GET["vorlesung_ID"], ENT_QUOTES, "UTF-8");
$vorlesungManager = new VorlesungManager();
$vorlesung = $vorlesungManager->findById($vorlesung_id);
?>


<link rel="stylesheet" href="../css/bootstrap_verzeichnis.css">


<!DOCTYPE html>
<html>


<body>


<div class="container">
    <div class="jumbotron">
        <h1>Vorlesungsverzeichnis</h1>
    </div>

    <?php
    $vorlesungManager = new VorlesungManager();
    $liste = $vorlesungManager->findAll ();
    if (count($liste) > 0) { ?>
    <table class="table table-hover">
        <thead>
        <th>Nummer</th>
        <th>Vorlesung-Name</th>
        <th></th>
        </thead>
        <tbody>
        <?php
        foreach ($liste as $vorlesung) {
            echo "<tr>";
            echo "<td>$vorlesung->vo9rlesung_ID</td>";
            echo "<td>$vorlesung->vorlesung_name</td>";
             ?>
            <td> <a type="button" class="btn btn-info" href="VorlesungRead.php" role="button">anzeigen</a> </td>
            <td> <a type="button" class="btn btn-primary" href="VorlesungUpdate_form.php" role="button">bearbeiten</a> </td>
            <td> <a type="button" class="btn btn-primary" href="VorlesungDelete.php" role="button">l&oumlschen</a> </td>
            <td> <a type="button" class="btn btn-primary" href="../Voting/VotingRead.php" role="button">Voting anzeigen</a>
                <!--�berpr�fen!!!-->
            <?php //nicht n�tig echo "<td><a href='LeserUnconnect_do.php?notiz_id=$notiz->id&leser_id=$leser->id' class='btn btn-info btn-danger btn-xs' >Verbindung l�sen</a>";
            echo "<td></td>";
            echo "</tr>";
        } }
        ?>
        </tbody>
    </table>
    <br>

    <a type="button" class="btn btn-primary" href="VorlesungCreate_form.php" role="button">Neue Vorlesung hinzuf&uumlgen</a>




</div>
</body>
</html>

