<?php include("../inc/head.php"); ?>

<!Doctype html>
<html>

<body>

<div class="content">
    <div class="Logout">
        <?php
            session_start();
            unset($_SESSION["username"]);
            unset($_SESSION["password"]);


            echo "Sie haben sich erfolgreich ausgeloggt.";
        ?>
        <br>
        <a href="../index.php">Zurück zur Startseite</a>
    </div>
</div>

</body>
</html>
