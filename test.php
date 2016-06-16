<!DOCTYPE html>
<html>

<body>

<?php
require_once("Mapper/VorlesungManager.php");
require_once("Mapper/Vorlesung.php");
$a= 24;

$Vorlesung_ID = (int)htmlspecialchars($_GET["Vorlesung_ID"], ENT_QUOTES, "UTF-8");


$VorlesungManager = new VorlesungManager();
$row = $VorlesungManager->findById($a);
print_r($row);
?>






</body>
</html>