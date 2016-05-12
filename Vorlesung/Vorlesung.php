<?php

class Vorlesung
{
    public $vorlesung_ID;
    public $vorlesung_name;


    function __construct($data=null) { //Construktor wird definiert mit dem Parameter $data mit dem festen Wert 0
        //Wert als assoziativer array,
        if (is_array($data)) { //vordefiniert von PDO, überprüft ob &data ein array ist
            if (isset($data['Vorlesung_ID'])) $this->vorlesung_ID = $data['Vorlesung_ID'];
            //Überprüfung, ob id vorhanden ist
            //wenn bei data eine ID übergeben wurde, Aufruf des Attributs id
            //bekommt den Wert id des Parameters $data
            //wenn User in der DB besteht, dann bekommt er automatisch eine id

            $this->vorlesung_name = $data['Vorlesung_Name'];
            //automatische Setzung dieser Daten
        }
    }

    public function __toString() {
        return $this->vorlesung_ID." ".$this->vorlesung_name;
        //öffentliche Methode __troString() wird definiert
        //AUfgabe: Ausgabe id name usw  der Klasse
    }
}