<?php
//setting header to json
header('Content-Type: application/json');
//database
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'lv018');
define('DB_PASSWORD', 'naiT0ohd0e');
define('DB_NAME', 'u-lv018');
$Voting_ID = (int)htmlspecialchars($_GET["Voting_ID"], ENT_QUOTES, "UTF-8");

//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
if(!$mysqli){
    die("Connection failed: " . $mysqli->error);
}
//query to get data from the table
$query = sprintf("SELECT Voting_ID, Antwort_A, Antwort_B, Antwort_C, Antwort_D, a_Student, b_Student, c_Student, d_Student  FROM Voting WHERE Voting_ID=$Voting_ID");
//execute query
$result = $mysqli->query($query);
//loop through the returned data
$data = array();
foreach ($result as $row) {
    $data[] = $row;
}
//free memory associated with result
$result->close();
//close connection
$mysqli->close();
//now print the data
print json_encode($data);