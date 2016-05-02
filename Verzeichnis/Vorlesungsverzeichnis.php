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

        <!-- Erstellen der Tabelle -->
        <table class="table table-hover table-condensed">

            <tr class="row">
                <th>VorlesungsID</th>
                <th>Vorlesung</th>
                <th>Optionen</th>
            </tr>

            <tr class="row">
                <td>1</td>
                <td>Crossmedia-Marketing</td>
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

    </div>
</div>
