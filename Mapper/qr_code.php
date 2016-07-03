<!-- QR-Code Generierung -->

<?php

include("../inc/qrlib.php");

$Voting_ID = (int)htmlspecialchars($_GET["Voting_ID"], ENT_QUOTES, "UTF-8");

// we need to be sure ours script does not output anything!!!
// otherwise it will break up PNG binary!

ob_start("callback");

// here DB request or some processing
$codeText = 'https://mars.iuk.hdm-stuttgart.de/~lv018/Voting/Voting_Studies_Test.php?Voting_ID='.$Voting_ID;

// end of processing here
$debugLog = ob_get_contents();
ob_end_clean();

// outputs image directly into browser, as PNG stream
QRcode::png($codeText);

?>

<!-- Ende QR-Code -->

<!-- bit.ly Generierung -->
<?php

    $login = 'o_7dgmnsdmrq';
    $key = 'R_f9535d857c614860a4dd5bf4d7e80b39';
    $longurl = 'https://mars.iuk.hdm-stuttgart.de/~lv018/Voting/Voting_Studies_Test2.php?Voting_ID='.$param;

    $url = 'http://api.bit.ly/shorten?version=2.0.1&longUrl='.$longurl.'&login='.$login.'&apiKey='.$key.'';

    $page = file_get_contents($url);
    $result = json_decode($page);
?>

    <p <?php $result->{'results'}->{$longurl}->{'shortUrl'} ?> >


<!-- ENDE bit.ly Generierung -->
