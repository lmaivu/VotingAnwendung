<!DOCTYPE html>
    <html>
<?php
include "../inc/cookie.php";?>

<body>
<?php

if (isset ($_COOKIE["voted"] )) {
    echo "Du hast erfolgreich deine Voting-Stimme abgegeben."; ?>
    <a href="#"> Hier kannst Sie Ihr Ergebnis anschauen. </a>
    <?php
}
    elseif (!isset ($_COOKIE["voted"] )) {
        echo "Fehler beim Abstimmen. Probiere Sie es erneut!";}

elseif ( $_COOKIE["voted"] == $Voting->Voting_ID) {
    echo "Sie haben bereits Ihre Stimme abgegeben.";
    die();

}
    ?>
</body>
</html>