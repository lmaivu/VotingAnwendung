<?php

$login = 'o_7dgmnsdmrq';
$key = 'R_f9535d857c614860a4dd5bf4d7e80b39';
$param = (int)htmlspecialchars($_GET["Voting_ID"], ENT_QUOTES, "UTF-8");

$params = array();
$params['access_token'] = 'THE_TOKEN_SET_VIA_OAUTH';
$params['longUrl'] = 'https://mars.iuk.hdm-stuttgart.de/~lv018/Voting/Voting_Studies_Test2.php?Voting_ID='.$param;
$params['domain'] = 'j.mp';
$results = bitly_get('shorten', $params);
var_dump($results);


?>