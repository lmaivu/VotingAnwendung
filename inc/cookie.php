<?php

if (isset ($_COOKIE["$Voting->Voting_ID"])) {
    $voted = True; }
else {
    $voted = False;
    setcookie ("$Voting->Voting_ID", "Student", time()+31536000); }

?>