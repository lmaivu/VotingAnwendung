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

    // we need to be sure ours script does not output anything!!!
    // otherwise it will break up PNG binary!

    ob_start("callback");


    // here DB request or some processing
    $codeText = 'https://mars.iuk.hdm-stuttgart.de/~lv018/Voting/Voting_Studies_Test.php?Voting_ID='.$Voting_ID;

    // Übergabe an Link.php //

    // end of processing here
    $debugLog = ob_get_contents();
    ob_end_clean();


    // outputs image directly into browser, as PNG stream
    QRcode::png($codeText);

    ?>
</div>
<!-- Ende QR-Code -->

</body>
</html>