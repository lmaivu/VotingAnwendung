<!DOCTYPE html>
    <html>
<?php
include "../inc/cookie.php";
require_once "../Mapper/VotingManager.php";
require_once "../Voting/Voting.php"?>

<body>
<?php
$VotingManager = new VotingManager();

//-------------Cookie checken, hat der Student schon gevoted?--------------------------
if (isset ($_COOKIE["voted"] )) {
    echo "Du hast erfolgreich Ihre Voting-Stimme abgegeben."; ?>
    <a href="#"> Hier können Sie Ihr Ergebnis anschauen. </a>
    <?php
}
    elseif (!isset ($_COOKIE["voted"] )) {
        echo "Fehler beim Abstimmen. Probiere Sie es erneut!";}

elseif ( $_COOKIE["voted"] == $Voting->Voting_ID) {
    echo "Sie haben bereits Ihre Stimme abgegeben.";
    die();

}
$Vorlesung_ID=5;
?>

<div>
<div colspan="2" class="pollTitle"><?php echo $Voting->Voting_Name ?></div>
<?php $Voting->getVoting($Vorlesung_ID); ?>
<form action="" method="post">
    <table cellspacing="0" cellpadding="1" style="table-layout: fixed; width: 550px;">
        <tbody>
        <?php foreach($Voting as $answer) : ?>
            <tr id="u329826_17">
                <td class="pollRadioBtn" style="width:20px;">
                    <input type="radio" value="<?php echo $answer['AnswerID'] ?>" name="answerID">
                    <input type="hidden" value="<?php echo $Voting['Voting_ID'] ?>" name="surveyID">
                </td>
                <td class="pollResultsBar" align="left">
                    <div class="resultBar" style="padding:10px;"><div style="width:<?php echo $answer['VotePercentage'] ?>%" class="shaded"></div>
                        <div class="label"><strong><?php echo htmlspecialchars($answer['AnswerName']) ?></strong></div>
                    </div>
                </td>
                <td style="width:100px;font-weight:bold">
                    <?php echo $answer['Votes']; ?>
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
    </div>
</form>
</body>
</html>