<?php

class Voting
{
    public $Voting_ID;
    public $Voting_Name;
    public $Einschreibeschlussel;
    public $Voting_Ablaufzeit;
    public $Voting_Erstellung;

    function __construct($data=null) { //Construktor wird definiert mit dem Parameter $data mit dem festen Wert 0
        //Wert als assoziativer array,
        if (is_array($data)) { //vordefiniert von PDO, �berpr�ft ob &data ein array ist
            if (isset($data['Voting_ID'])) $this->Voting_ID = $data['Voting_ID'];
            //�berpr�fung, ob id vorhanden ist
            //wenn bei data eine ID �bergeben wurde, Aufruf des Attributs id
            //bekommt den Wert id des Parameters $data
            //wenn User in der DB besteht, dann bekommt er automatisch eine id

            $this->Voting_Name = $data['Voting_Name'];
            $this->Einschreibeschlussel = $data['Einschreibeschlussel'];
            $this->Voting_Ablaufzeit = $data['Ablaufzeit'];
            $this->Voting_Erstellung = $data['Voting_Erstellung'];
            //automatische Setzung dieser Daten
        }
    }

    public function __toString() {
        return $this->Voting_ID." ".$this->Voting_Name." ".$this->Einschreibeschlussel." ".$this->Voting_Ablaufzeit." ".$this->Voting_Erstellung;
        //�ffentliche Methode __troString() wird definiert
        //AUfgabe: Ausgabe id name usw  der Klasse
    }
}