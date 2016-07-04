<?php
include "../inc/head.php"

?>

<!DOCTYPE html>
<html>
<body>


<div class="info">
    <p style="font-family: 'Open Sans', sans-serif"> Über diese QR-Code oder den Link gelangen Sie<br>
        zur Abstimmung!</p>
    <?php
        $Voting_ID = (int)htmlspecialchars($_GET["Voting_ID"], ENT_QUOTES, "UTF-8");
        echo '<img src="../Mapper/qr_code.php?Voting_ID=' . $Voting_ID . '">';?>
        <br>
        <br> <?php
        echo 'https://mars.iuk.hdm-stuttgart.de/~lv018/Voting/Voting_Studies_Test.php?Voting_ID=' . $Voting_ID . '';
    ?>
</div>

<div>
    <input style='background-color: #534532; border-color: white; color: white; alignment: center' type="button" class="btn btn-default" value="Zurück" onClick="history.back()">
</div>






</body>
</html>