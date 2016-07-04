<?php
include "../inc/head.php";
require_once("../Vorlesung/Vorlesung.php");
require_once("../Mapper/VorlesungManager.php");
require_once ("../Voting/Voting.php");
require_once("../Mapper/VotingManager.php");
?>

<!DOCTYPE html>
<html>
<body>


<div class="info">
    <p style="font-family: 'Open Sans', sans-serif"> Über diesen QR-Code oder den Link gelangen Sie<br>
        zur Abstimmung!</p>
    <?php
        $Voting_ID = (int)htmlspecialchars($_GET["Voting_ID"], ENT_QUOTES, "UTF-8");
        $Einschreibeschlussel = (int)htmlspecialchars($_GET["Einschreibeschlussel"], ENT_QUOTES, "UTF-8");
        echo '<img src="../Mapper/qr_code.php?Voting_ID=' . $Voting_ID . '">';?>
        <br>
        <br> <?php
        echo 'https://mars.iuk.hdm-stuttgart.de/~lv018/Voting/Schluesselabfrage_form.php?Voting_ID=' . $Voting_ID . '';?>
        <br> <?php
        echo 'Einschreibeschlüssel: ' . $Voting->Einschreibeschlussel . '';
    ?>
</div>

<div>
    <input style='background-color: #534532; border-color: white; color: white; alignment: center' type="button" class="btn btn-default" value="Zurück" onClick="history.back()">
</div>






</body>
</html>