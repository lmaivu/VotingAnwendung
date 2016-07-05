<?php //include("../inc/cookie.php"); ?>

<?php
error_reporting(E_ALL);

require_once("../Voting/Voting.php");
require_once("../Mapper/VotingManager.php");
include "../inc/head.php";
//print_r($_COOKIE['Student']);
$Voting_ID = (int)htmlspecialchars($_POST["Voting_ID"], ENT_QUOTES, "UTF-8");

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../css/bootstrap_verzeichnis.css">
    <link rel="stylesheet" href="../css/bootstrap_Abstimmen.css">

    <style type="text/css">
        <!--

        .vote {
            cursor: pointer;
            font: 15px Verdana,sans-serif;
            color: white;
            background-color: #8e7059;
            border-color: white;
            width: 50px;
            padding: 2px;
            line-height: 130%;
            position: center;
        }

        -->
    </style>
</head>

<body>

<?php
$Einschreibeschlussel = htmlspecialchars($_POST["Einschreibeschlussel"], ENT_QUOTES, "UTF-8");
$VotingManager = new VotingManager();
$Voting = $VotingManager->findById($Voting_ID);
$Prozent_a = $Voting->Prozent_a;
$Prozent_b = $Voting->Prozent_b;
$Prozent_c = $Voting->Prozent_c;
$Prozent_d = $Voting->Prozent_d;
echo $Prozent_a;
echo $Prozent_b;
echo $Prozent_c;
echo $Prozent_d;
if ($Einschreibeschlussel=="$Voting->Einschreibeschlussel") {
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
                <td class="form-group" style="width:70px;">
                    <input type="hidden" value="<?php echo htmlspecialchars($Voting_ID); ?>" class="form-control" name="Voting_ID" id="Voting_ID" readonly>
                    <input type="hidden" name="A" value="<?php echo (int)$Voting->a_Student?>">
                    <input class="vote" type="submit" value="A">
                </td>

                <td class="pollResultsBar" align="left">
                <div class="resultBar" style="padding:10px;"> <div style="width:<?php echo $Voting->Prozent_a ?>%" class="shaded"></div>
                    <div class="label"><strong><?php echo htmlspecialchars($Voting->Antwort_A) ?></strong></div>
                </div>
                </td>

                <td>
                    <strong> Anzahl der Gesamtstimmen: <?php echo (int) htmlspecialchars ($Voting->a_Student); ?> </strong>
                </td>

             </tr>
            </tbody>
            </table>

            </form>

    <form role="form" class="form-inlinecy" action="VotingStudent_Do.php" method="post">
        <table cellspacing="0" cellpadding="1" style="table-layout: fixed; width: 550px;">
            <tbody>

            <tr>
                <td class="form-group" style="width:70px;">
                    <input type="hidden" value="<?php echo htmlspecialchars($Voting_ID); ?>" class="form-control" name="Voting_ID" id="Voting_ID" readonly>
                    <input type="hidden" name="B" value="<?php echo (int)$Voting->b_Student?>">
                    <input class="vote" type="submit" value="B">
                </td>
                <td class="pollResultsBar" align="left">
                    <div class="resultBar" style="padding:10px;"><div style="width:<?php echo $Voting->Prozent_b ?>%" class="shaded"></div>
                        <div class="label"><strong><?php echo htmlspecialchars($Voting->Antwort_B) ?></strong></div>
                    </div>
                </td>
                <td>
                    <strong> Anzahl der Gesamtstimmen: <?php echo (int) htmlspecialchars ($Voting->b_Student) ?> </strong>
                </td>
            </tr>

            </tbody>
            </table>
    </form>

    <form role="form" class="form-inlinecy" action="VotingStudent_Do.php" method="post">
        <table cellspacing="0" cellpadding="1" style="table-layout: fixed; width: 550px;">
        <tbody>
        <tr>
            <?php if(isset($Voting->Antwort_C) && !empty($Voting->Antwort_C)){ ?>

            <td class="form-group" style="width:70px;">
                <input type="hidden" value="<?php echo htmlspecialchars($Voting_ID); ?>" class="form-control" name="Voting_ID" id="Voting_ID" readonly>
                <input type="hidden" name="C" value="<?php echo (int)$Voting->c_Student?>">
                <input class="vote" type="submit" value="C">
            </td>
                <td class="pollResultsBar" align="left">
                    <div class="resultBar" style="padding:10px;"><div style="width:<?php echo $Voting->Prozent_c ?>%" class="shaded"></div>
                        <div class="label"><strong><?php echo htmlspecialchars($Voting->Antwort_C) ?></strong></div>
                    </div>
                </td>

                <td>
                    <strong> Anzahl der Gesamtstimmen: <?php echo(int) htmlspecialchars ($Voting->c_Student) ?> </strong>
                </td>
                <?php } ?>
            </tr>
        </tbody>
        </table>
    </form>

    <form role="form" class="form-inlinecy" action="VotingStudent_Do.php" method="post">
        <table cellspacing="0" cellpadding="1" style="table-layout: fixed; width: 550px;">
            <tbody>
            <?php  if(isset($Voting->Antwort_D) && !empty($Voting->Antwort_D)) { ?>
            <tr>
            <td class="form-group" style="width:70px;">
                <input type="hidden" value="<?php echo htmlspecialchars($Voting_ID); ?>" class="form-control" name="Voting_ID" id="Voting_ID" readonly>
                <input type="hidden" name="D" value="<?php echo $Voting->d_Student?>">
                <input class="vote" type="submit" value="D" >
            </td>
            <td class="pollResultsBar" align="left">
                <div class="resultBar" style="padding:10px;"><div style="width:<?php echo $Voting->Prozent_d ?>%" class="shaded"></div>
                    <div class="label"><strong> <?php echo htmlspecialchars($Voting->Antwort_D) ?></strong></div>
                </div>
            </td>

                <td>
                    <strong> Anzahl der Gesamtstimmen: <?php echo (int) htmlspecialchars ($Voting->d_Student )?> </strong>
                </td>
            </tr>
            <?php }
            ?>
            </tbody>
            </table>
    </form>

    <form>
        <table>
            <tr>
                <td>
        <div class="form-group">
            <input type="hidden" value="<?php echo htmlspecialchars($Voting_ID); ?>" class="form-control" name="Voting_ID" id="Voting_ID" readonly>
        </div>
                </td>
            </tr>
        </table>

    </form>

</div>

<input type="hidden" id="aktualisieren" value="no">

    <script type="text/javascript">
        onload=function(){
            var e=document.getElementById("aktualisieren");
            if(e.value=="no")e.value="yes";
            else{e.value="no";location.reload();}
        }
    </script>


<?php }
else { ?>
<div class="Fehlermeldung">
    <?php echo "Falscher Eingabeschlüssel. Bitte versuchen Sie es erneut.<br/>"; ?>
    <a href="Schluesselabfrage_form.php"> Zurück </a> <?php } ?>
</div>

</body>


</html>


