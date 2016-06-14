<!DOCTYPE html>
<html>

<body>

<?php
require_once("Mapper/VorlesungManager.php");


$VorlesungManager = new VorlesungManager();
$row = $VorlesungManager->findAll($dozent); ?>


<form action="../index.php">
    <label>Künstler(in):
        <select name="top5" size="5">
            <option>Heino</option>
            <option>Michael Jackson</option>
            <option>Tom Waits</option>
            <option>Nina Hagen</option>
            <option>Marianne Rosenberg</option>
        </select>
    </label>
</form>




</body>
</html>