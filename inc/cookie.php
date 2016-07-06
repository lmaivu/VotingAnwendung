<?php

if (isset ($_COOKIE["$Voting->Voting_ID"])) {
    $cookie = 1; }
else {
    $cookie = 0;
    setcookie ("$Voting->Voting_ID", "Student", time()+31536000); }

?>