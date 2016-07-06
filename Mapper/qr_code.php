<?php
include "../inc/head.php";
?>
<!DOCTYPE html>
<html>
<body>
<!-- QR-Code Generierung -->
<div class="info">

    <p style="font-family: 'Open Sans', sans-serif"> Über diese QR-Code oder den Link gelangen Sie<br>
        zur Abstimmung!</p>
    <?php

    include("../inc/qrlib.php");

    $Voting_ID = (int)htmlspecialchars($_GET["Voting_ID"], ENT_QUOTES, "UTF-8");

    ob_start("callback");
    
    $codeText = 'https://mars.iuk.hdm-stuttgart.de/~lv018/Voting/Schluesselabfrage_form.php?Voting_ID='.$Voting_ID;

    // Ende
    $debugLog = ob_get_contents();
    ob_end_clean();


    // Das Bild wird als PNG übergeben 
    QRcode::png($codeText);

    ?>
</div>
<!-- Ende QR-Code -->
</body>
</html>