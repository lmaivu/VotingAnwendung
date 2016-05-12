
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

//ID der jeweiligen Vorlesung wird gebraucht
//->?id findallbyVorlesung echo $voting
//Darstellung des Diagramms?
//aktualisierung der Daten in 5 sec schritten
//Abgegebene Stimmen müssen hier in der DB aufgerufen werden

?>