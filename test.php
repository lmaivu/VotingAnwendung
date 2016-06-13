
<div id="container">
    <?php
    $VorlesungManager = new VorlesungManager();
    $liste = $VorlesungManager->findAll($dozent->Dozent_ID);
    if (count($liste) > 0) { ?>
    <table class="table table-hover">
        <thead>
        <th>Nummer</th>
        <th>Vorlesung-Name</th>
        <th></th>
        </thead>
        <tbody>
        <?php
        foreach ($liste as $Vorlesung) {
            echo "<tr>";
            echo "<td>$Vorlesung->Vorlesung_ID</td>";
            echo "<td>$Vorlesung->Vorlesung_Name</td>";
            echo "<td>
                    <a href='VorlesungRead.php?Vorlesung_ID=$Vorlesung->Dozent_ID' type='button' class='btn btn-info' role='button'>anzeigen</a>
                    <a href='VorlesungUpdate_form.php?Vorlesung_ID=$Vorlesung->Dozent_ID' type='button' class='btn btn-primary' role='button'>bearbeiten</a>
                    <a href='VorlesungDelete.php?Vorlesung_ID=$Vorlesung->Dozent_ID' type='button'' class='btn btn-primary' role='button'>l&oumlschen</a>
                    <a href='../Voting/VotingRead.php?Vorlesung_ID=$Vorlesung->Dozent_ID' type='button' class='btn btn-primary'  role='button'>Voting anzeigen</a>

            </td>";
            echo "<td></td>";
            echo "</tr>";
        } }
        else
            echo "Es sind noch keine Vorlesungen vorhanden."
        ?>
        </tbody>
    </table>
    <br>

    <a type="button" class="btn btn-primary" href="VorlesungCreate_form.php" role="button">Neue Vorlesung hinzuf&uumlgen</a>


</div> <!--container-->