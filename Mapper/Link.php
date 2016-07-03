<?php

$login = 'o_7dgmnsdmrq';
$key = 'R_f9535d857c614860a4dd5bf4d7e80b39';
$param = (int)htmlspecialchars($_GET["Voting_ID"], ENT_QUOTES, "UTF-8");
$longurl = 'https://mars.iuk.hdm-stuttgart.de/~lv018/Voting/Voting_Studies_Test2.php?Voting_ID='.$param;


$url = 'http://api.bit.ly/shorten?version=2.0.1&longUrl='.$longurl.'&login='.$login.'&apiKey='.$key.'';


$page = file_get_contents($url);
$result = json_decode($page);
Echo $result->{'results'}->{$longurl}->{'shortUrl'}

?>