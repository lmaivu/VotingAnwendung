<?php

error_reporting(E_ALL);
require_once("../Mapper/Manager.php");
require_once("../Mapper/VotingManager.php");
require_once("../Voting/Voting.php");

if (isset ($_COOKIE["$Voting->Voting_ID"])) {
    $voted = True; }
else {
    $voted = False;
    setcookie ("$Voting->Voting_ID", "Student", time()+31536000); }



?>