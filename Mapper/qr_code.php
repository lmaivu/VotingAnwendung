<?php

include("../inc/qrlib.php");

$param = (int)htmlspecialchars($_GET["Voting_ID"], ENT_QUOTES, "UTF-8");

// we need to be sure ours script does not output anything!!!
// otherwise it will break up PNG binary!

ob_start("callback");

// here DB request or some processing
$codeText = 'https://mars.iuk.hdm-stuttgart.de/~lv018/Voting/Voting_Studies_Test.php?Voting_ID='.$param;

// end of processing here
$debugLog = ob_get_contents();
ob_end_clean();

// outputs image directly into browser, as PNG stream
QRcode::png($codeText);

?>

c

