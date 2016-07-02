<?php
include "../inc/head.php";


require_once "Voting.php";
require_once "../Vorlesung/Vorlesung.php";
require_once "../Mapper/VorlesungManager.php";
require_once "../Mapper/VotingManager.php";
include("../inc/cookie.php");

?>

<head>
    <link rel="stylesheet" href="../css/bootstrap_verzeichnis.css">
    <link rel="stylesheet" href="../css/bootstrap_Abstimmen.css">
</head>

<body>

<?php

$Voting_ID = (int)htmlspecialchars($_GET["Voting_ID"], ENT_QUOTES, "UTF-8"); //funktioniert noch nicht, muss �ber QR Code �bergeben werden
$VotingManager = new VotingManager();
$liste1 = $VotingManager->findById($Voting_ID);
$a_Student=$liste1->a_Student;
echo $a_Student + "<br>";
$b_Student= $liste1->b_Student;
$c_Student=(int) $liste1->c_Student;
$d_Student=(int) $liste1->d_Student;
echo "$b_Student";
echo "$c_Student";
echo "$d_Student";
?>

<div id="kopfleiste">
    <div class="jumbotron">
        <h1>Voting: <br>
            <?php echo $liste1->Voting_Name;?>
        </h1>
    </div>
</div>

<div>
    <div colspan="2" class="pollTitle">Frage: <?php echo $liste1->Frage;?></div>

    <form action="VotingStudent_Do.php" method="post">
        <table cellspacing="0" cellpadding="1" style="table-layout: fixed; width: 550px;">


            <tbody>
                <tr>
                    <td class="pollRadioBtn" style="width:20px;">
                        <input type="radio" value="<?php echo $a_Student; ?>" name="a_Student">
                    </td>
                    <td class="pollResultsBar" align="left">
                        <div class="resultBar" style="padding:10px;"><div style="width:<?php echo "$liste1->Prozent_a" ?>%" class="shaded"></div>
                            <div class="label"><strong>A.<?php echo htmlspecialchars($liste1->Antwort_A) ?></strong></div>
                        </div>
                    </td>
                </tr>


                <tr>
                    <td class="pollRadioBtn" style="width:20px;">
                        <input type="radio" value="<?php echo $b_Student; ?>" name="b_Student">
                    </td>

                    <td class="pollResultsBar" align="left">
                        <div class="resultBar" style="padding:10px;"><div style="width:<?php echo "$liste1->Prozent_b" ?>%" class="shaded"></div>
                            <div class="label"><strong>B. <?php echo htmlspecialchars($liste1->Antwort_B) ?></strong></div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <?php if(isset($liste1->Antwort_C)) { ?>
                    <td class="pollRadioBtn" style="width:20px;">
                            <input type="radio" value="<?php echo $c_Student; ?>" name="c_Student">

                    </td>

                    <td class="pollResultsBar" align="left">
                        <div class="resultBar" style="padding:10px;"><div style="width:<?php echo "$liste1->Prozent_c" ?>%" class="shaded"></div>
                            <div class="label"><strong>C.<?php echo htmlspecialchars($liste1->Antwort_C) ?></strong></div>
                        </div>
                     </td>
                    <?php }?>
                </tr>


                <tr>
                    <?php if(isset($liste1->Antwort_D)) { ?>
                    <td class="pollRadioBtn" style="width:20px;">
                        <input type="radio" value="<?php echo $d_Student; ?>" name="d_Student">

                    </td>

                    <td class="pollResultsBar" align="left">
                            <div class="resultBar" style="padding:10px;"><div style="width:<?php echo $liste1->Prozent_d ?>%" class="shaded"></div>
                                <div class="label"><strong>D.<?php echo htmlspecialchars($liste1->Antwort_D) ?></strong></div>
                            </div>
                    </td>
                        <?php } ?>
                </tr>



                <tr>
                        <input type="hidden" value="<?php echo $liste1->Voting_ID; ?>" name="Voting_ID">
                </tr>


                    <!--

                    <td style="width:100px;font-weight:bold">
                        <?php //htmlspecialchars($liste1->Stimmen_Gesamt); ?>
                        Stimmen
                    </td>
                    -->

            </tbody>
        </table>
        <br/>
        &nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;
        <button type="submit" name="vote_submit" class="btn">Abstimmen</button>
    </form>
</div>


</body>
