<?php //include("../inc/session_check.php"); ?>

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


        $dsn='mysql:: host=localhost; dbname=u-lv018';
        try {
            $pdo = new PDO($dsn, 'lv018', 'naiT0ohd0e', array('charset' => 'utf8'));
        }
        catch (PDOException $e) {
            exit("Verbindungsfehler");
        }


        $sql = $pdo->prepare("SELECT * FROM Vorlesung ORDER BY Vorlesung_name");
        $sql->execute();
        $result = $sql->fetchAll();
        print_r($result);


        //$anzahl_datensaetze = mysqli_num_rows($result);
        //$anzahl_felder = mysqli_num_fields($result);

        $anzahl_datensaetze = $result->mysqli_num_rows;
        printf( $anzahl_datensaetze);

        /**
        if(!$pdo)
        {
        exit("Verbindungsfehler: ".mysqli_connect_error());
        }

        $sqlabfrage = "SELECT * FROM Vorlesung";
        $ergebnis= $pdo->query($sqlabfrage);

         **/


        ?>


        <!-- Erstellen der Tabelle -->

        <table class="table table-hover table-condensed">

            <tr class="row">
                <th>VorlesungsID</th>
                <th>Vorlesung</th>
                <th>Optionen</th>
            </tr>
            <?php
            while($row = mysqli_fetch_object($result, MYSQLI_ASSOC))
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


<a type="button" class="btn btn-primary" href="#" role="button">Voting anlegen</a>