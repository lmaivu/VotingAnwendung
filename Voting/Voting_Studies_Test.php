<?php
include "../inc/head.php";
include "../inc/navbar.php";

//include("../inc/session_check.php");
require_once "Voting.php";
require_once "../Vorlesung/Vorlesung.php";
require_once "../Mapper/VorlesungManager.php";
require_once "../Mapper/VotingManager.php";

?>

<head>
    <link rel="stylesheet" href="../css/bootstrap_verzeichnis.css">
    <link rel="stylesheet" href="../css/bootstrap_Abstimmen.css">
</head>

<body>

<?php
$Voting_ID = (int)htmlspecialchars($_GET["Voting_ID"], ENT_QUOTES, "UTF-8");
$VotingManager = new VotingManager();
$VorlesungManager = new VorlesungManager();
$liste1 = $VotingManager->findById($Voting_ID);

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

    <form action="" method="post">
        <table cellspacing="0" cellpadding="1" style="table-layout: fixed; width: 550px;">


            <tbody>
            <?php
            foreach($liste1 as $Voting) :
                echo "Antwort_A";?>

                <tr>
                    <td class="pollRadioBtn" style="width:20px;">
                        <input type="radio" value="<?php echo $Voting->Antwort_A; ?>" name="Antwort_A">
                        <input type="radio" value="<?php echo $Voting->Antwort_B; ?>" name="Antwort_B">
                        <?php if(isset($Voting->Antwort_C)) { ?>
                            <input type="radio" value="<?php echo $Voting->Antwort_C; ?>" name="Antwort_C">
                         <?php } ?>
                        <?php if(isset($Voting->Antwort_D)) { ?>
                        <input type="radio" value="<?php echo $Voting->Antwort_D; ?>" name="Antwort_D">
                        <?php } ?>
                        <input type="hidden" value="<?php echo $Voting->Voting_ID; ?>" name="Voting_ID">
                    </td>
                    <td class="pollResultsBar" align="left">
                        <div class="resultBar" style="padding:10px;"><div style="width:<?php echo $Voting['VotePercentage'] ?>%" class="shaded"></div>
                            <div class="label"><strong><?php echo htmlspecialchars($Voting->Antwort_A) ?></strong></div>
                            <div class="label"><strong><?php echo htmlspecialchars($Voting->Antwort_B) ?></strong></div>
                        </div>
                    </td>
                    <td style="width:100px;font-weight:bold">
                        <?php echo htmlspecialchars($Voting->Stimmen_Gesamt); ?>
                        Stimmen
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <br/>
        &nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;
        <button type="submit" name="vote_submit" class="btn">Abstimmen</button>
    </form>
</div>


</body>
