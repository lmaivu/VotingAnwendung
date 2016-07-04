<?php include("../inc/cookie.php"); ?>

<?php
error_reporting(E_ALL);

require_once("../Voting/Voting.php");
require_once("../Mapper/VotingManager.php");
include "../inc/head.php";
print_r($_COOKIE['Student']);
$Voting_ID = (int)htmlspecialchars($_GET["Voting_ID"], ENT_QUOTES, "UTF-8");
$VotingManager = new VotingManager();
$Voting = $VotingManager->findById($Voting_ID);

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../css/bootstrap_verzeichnis.css">
    <link rel="stylesheet" href="../css/bootstrap_Abstimmen.css">
</head>

<body>
<?php

?>
<div id="kopfleiste">
    <div class="jumbotron">
        <h1>Voting: <br>
            <?php echo $Voting->Voting_Name;?>
        </h1>
    </div>
</div>

<div>
    <div colspan="2" class="pollTitle">Frage: <?php echo $Voting->Frage;?></div> <br>


    <form role="form" class="form-inlinecy" action="VotingStudent_Do.php" method="post">
        <table cellspacing="0" cellpadding="1" style="table-layout: fixed; width: 550px;">


            <tbody>
            <tr>
                <td class="form-group" style="width:50px;">
                <input type="submit" name="A"  value="A"/>
                </td>
                <td class="pollResultsBar" align="left">
                <div class="resultBar" style="padding:10px;"><div style="width:<?php echo "$Voting->Prozent_a" ?>%" class="shaded"></div>
                    <div class="label"><strong><?php echo htmlspecialchars($Voting->Antwort_A) ?></strong></div>
                </div>
                </td>
                <td>
                    <strong> Anzahl der Gesamtstimmen: <?php echo (int) htmlspecialchars ($Voting->a_Student); ?> </strong>
                </td>
             </tr>


            <tr>
                <td class="form-group" style="width:50px;">
                <input type="submit" name="B"  value="B"/>
                </td>
                <td class="pollResultsBar" align="left">
                    <div class="resultBar" style="padding:10px;"><div style="width:<?php echo "$Voting->Prozent_b" ?>%" class="shaded"></div>
                        <div class="label"><strong><?php echo htmlspecialchars($Voting->Antwort_B) ?></strong></div>
                    </div>
                </td>
                <td>
                    <strong> Anzahl der Gesamtstimmen: <?php echo (int) htmlspecialchars ($Voting->b_Student) ?> </strong>
                </td>
            </tr>

            <tr>

            <?php if(isset($Voting->Antwort_C) && !empty($Voting->Antwort_C)){ ?>

            <td class="form-group" style="width:50px;">
                <input type="submit" name="C"  value="C"/>
            </td>
                <td class="pollResultsBar" align="left">
                    <div class="resultBar" style="padding:10px;"><div style="width:<?php //echo "$Voting->Prozent_c" ?>%" class="shaded"></div>
                        <div class="label"><strong><?php echo htmlspecialchars($Voting->Antwort_C) ?></strong></div>
                    </div>
                </td>

                <td>
                    <strong> Anzahl der Gesamtstimmen: <?php echo(int) htmlspecialchars ($Voting->c_Student) ?> </strong>
                </td>
                <?php } ?>
            </tr>


            <?php  if(isset($Voting->Antwort_D) && !empty($Voting->Antwort_D)) { ?>
            <tr>
            <td class="form-group" style="width:50px;">
                <input type="submit" name="D"  value="D"/>
            </td>
            <td class="pollResultsBar" align="left">
                <div class="resultBar" style="padding:10px;"><div style="width:<?php //echo $Voting->Prozent_d ?>%" class="shaded"></div>
                    <div class="label"><strong> <?php echo htmlspecialchars($Voting->Antwort_D) ?></strong></div>
                </div>
            </td>

                <td>
                    <strong> Anzahl der Gesamtstimmen: <?php echo (int) htmlspecialchars ($Voting->d_Student )?> </strong>
                </td>
            </tr>
            <?php }
            ?>



            <tr>
        <div class="form-group">
            <input type="hidden" value="<?php echo htmlspecialchars($Voting_ID); ?>" class="form-control" name="Voting_ID" id="Voting_ID" readonly>
        </div>
            </tr>
            </tbody>
    </form>

</div>

<input type="hidden" id="refreshed" value="no">


</body>
</html>


