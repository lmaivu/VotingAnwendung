<!-- Datei um das Voting Hinzufügen Formular zu überprüfen, die eingegebenen Werte werden als string umgewandelt und gespeichert,
als neuer Datensatz der Klasse Voting-->

<?php
include("../inc/session_check.php");
include("../inc/head.php");
require_once("../Mapper/VotingManager.php");
require_once("Voting.php");


//$Voting_ID = (int) htmlspecialchars($_POST["Voting_ID"], ENT_QUOTES, "UTF-8");
//echo "$Voting_ID";
$Voting_Name = htmlspecialchars($_POST["Voting_Name"], ENT_QUOTES, "UTF-8");
$Vorlesung_ID = htmlspecialchars($_POST["Vorlesung_ID"], ENT_QUOTES, "UTF-8");
$Einschreibeschlussel = htmlspecialchars($_POST["Einschreibeschlussel"], ENT_QUOTES, "UTF-8");
$Voting_Erstellung = htmlspecialchars($_POST["Voting_Erstellung"], ENT_QUOTES, "UTF-8");

$Frage = htmlspecialchars($_POST["Frage"], ENT_QUOTES, "UTF-8");
$Antwort_A = htmlspecialchars($_POST["Antwort_A"], ENT_QUOTES, "UTF-8");
$Antwort_B = htmlspecialchars($_POST["Antwort_B"], ENT_QUOTES, "UTF-8");
$Antwort_C = htmlspecialchars($_POST["Antwort_C"], ENT_QUOTES, "UTF-8");
$Antwort_D = htmlspecialchars($_POST["Antwort_D"], ENT_QUOTES, "UTF-8");


if (!empty($Voting_Name) && !empty($Vorlesung_ID)&& !empty($Einschreibeschlussel) && !empty($Frage) && !empty($Antwort_A) && !empty($Antwort_B)
) {
    $votingdaten = [

        "Voting_Name" => $Voting_Name,
        "Voting_Erstellung" => $Voting_Erstellung,
        "Vorlesung_ID" => $Vorlesung_ID,
        "Einschreibeschlussel" => $Einschreibeschlussel,
        "Frage" => $Frage,
        "Antwort_A" => $Antwort_A,
        "Antwort_B" => $Antwort_B,
        "Antwort_C" => $Antwort_C,
        "Antwort_D" => $Antwort_D,


    ];
    $Voting = new Voting($votingdaten);
    $VotingManager = new VotingManager();
    $VotingManager->save($Voting);


    //<a href='../Vorlesung/VorlesungRead.php?Vorlesung_ID=$Vorlesung_ID'> </a>
    header('Location: ../Vorlesung/Vorlesungsverzeichnis.php');
} else { ?>
    <div class="Fehlermeldung">
    <?php echo "Achtung! Bitte alle Felder ausf&uumlllen!<br/>"; ?>
        <a href="../Voting/VotingCreate_form.php"> Zurück </a>
    </div>
<?php
}
?>