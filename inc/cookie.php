<?php

if (isset($_COOKIE["$Voting->Voting_ID"]))
    $voted = True;
else
    $voted = False;
setcookie ("Student", "$Voting->Voting_ID", time()+31536000);


?>