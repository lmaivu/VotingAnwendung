<?php
/**
 * Created by PhpStorm.
 * User: LenaBogunovic
 * Date: 27.04.16
 * Time: 11:10
 */

include "../inc/head.php";
include "../inc/navbar.php";
include "../inc/footer.php";

?>

<!-- Einbinden des Stylesheets -->
<link rel="stylesheet" href="../css/bootstrap_verzeichnis.css">



<!-- Erstellen der Klasse "body"-->
<div class="body">
    <h1>Vorlesungsverzeichnis</h1>
    <div class=".col-md-12 .col-md-offset-4">



<!-- Datenbankverbindung herstellen & Ausgeben -->
<?php

require_once "../Mapper/Manager.php";
require_once "../Mapper/Userdata.php";
include "../Mapper/DozentManager.php";

if(!$db)
{
    exit("Verbindungsfehler: ".mysqli_connect_error());
}

$sqlabfrage = "SELECT * FROM Vorlesung";
$ergebnis= $db->query($sqlabfrage);

?>

$anzahl_datensaetze = mysqli_num_rows($ergebnis);
$anzahl_felder = mysqli_num_fields($ergebnis);

?>


<!-- Erstellen der Tabelle -->

        <table class="table table-hover table-condensed">

            <tr class="row">
                <th>VorlesungsID</th>
                <th>Vorlesung</th>
                <th>Optionen</th>
            </tr>
            <?php
                while($row = mysqli_fetch_object($ergebnis))
                {
            ?>
            <tr class="row">
                <td>
                    <?php
                        echo $row->Vorlesung_ID;
                    ?>
                </td>
                <td>
                    <?php
                        echo $row->Name;
                    ?>
                </td>
                <td>
                    <a type="button" class="btn btn-info" href="#" role="button">anzeigen</a>
                    <a type="button" class="btn btn-primary" href="#" role="button">bearbeiten</a>
                </td>
            </tr>



            <tr class="row">
                <td>2</td>
                <td>Web-Engineering</td>
                <td>
                    <a type="button" class="btn btn-info" href="#" role="button">anzeigen</a>
                    <a type="button" class="btn btn-primary" href="#" role="button">bearbeiten</a>
                </td>

            </tr>

        </table>
          <?php
            }
          ?>
    </div>
</div>