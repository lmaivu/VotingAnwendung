<?php

class Voting
{
    public $voting_ID;
    public $voting_name;
    public $voting_ergebnis;
    public $voting_ablaufzeit;
    public $voting_erstellung;

    function __construct($data=null) { //Construktor wird definiert mit dem Parameter $data mit dem festen Wert 0
        //Wert als assoziativer array,
        if (is_array($data)) { //vordefiniert von PDO, überprüft ob &data ein array ist
            if (isset($data['Voting_ID'])) $this->voting_ID = $data['Voting_ID'];
            //Überprüfung, ob id vorhanden ist
            //wenn bei data eine ID übergeben wurde, Aufruf des Attributs id
            //bekommt den Wert id des Parameters $data
            //wenn User in der DB besteht, dann bekommt er automatisch eine id

            $this->voting_name = $data['Voting_Name'];
            $this->voting_ergebnis = $data['Voting_Ergebnis'];
            $this->voting_ablaufzeit = $data['Ablaufzeit'];
            $this->voting_erstellung = $data['Voting_Erstellung'];
            //automatische Setzung dieser Daten
        }
    }

    public function __toString() {
        return $this->voting_ID." ".$this->voting_name." ".$this->voting_ergebnis." ".$this->voting_ablaufzeit." ".$this->voting_erstellung;
        //öffentliche Methode __troString() wird definiert
        //AUfgabe: Ausgabe id name usw  der Klasse
    }
}