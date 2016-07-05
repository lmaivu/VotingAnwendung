<?php

require_once("../Mapper/Manager.php");
require_once("../Mapper/VotingManager.php");
require_once("../Voting/Voting.php");


if (isset($_COOKIE["Student"])) {
    $voted = True; }
else {
    $voted = False;
setcookie ("Student", "$Voting_ID", time()+31536000); }


?>