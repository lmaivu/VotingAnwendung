<?php
include ("../inc/head.php");
?>

<!DOCTYPE html>
<html>
<body>

<h2>Bitte geben Sie den Einschreibeschlüssel ein.</h2>

<form class="form-horizontal" role="form" action="Voting_Studies_Test.php" method="post">
    <br>
    <div class="form-group">
        <label class="control-label col-sm-4" for="name">Schlüssel: </label>
        <div class="col-sm-5">
            <input type="password" class="form-control" name="Einschreibeschlussel" id="Einschreibeschlussel" placeholder="Einschreibeschlüssel">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-4 col-sm-4">
            <button style='background-color: #534532; border-color: white; color: white' type="submit" class="btn btn-default">Go!</button>
        </div>
    </div>




</body>
</html>
