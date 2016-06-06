<?php

class Vorlesung
{
    public $Vorlesung_ID;
    public $Vorlesung_Name;


    function __construct($data=null) { //Construktor wird definiert mit dem Parameter $data mit dem festen Wert 0
        //Wert als assoziativer array,
        if (is_array($data)) { //vordefiniert von PDO, �berpr�ft ob &data ein array ist
            if (isset($data['Vorlesung_ID'])) $this->Vorlesung_ID = $data['Vorlesung_ID'];
            //�berpr�fung, ob id vorhanden ist
            //wenn bei data eine ID �bergeben wurde, Aufruf des Attributs id
            //bekommt den Wert id des Parameters $data
            //wenn User in der DB besteht, dann bekommt er automatisch eine id

            $this->Vorlesung_Name = $data['Vorlesung_Name'];
            //automatische Setzung dieser Daten
        }
    }

    public function __toString() {
        return $this->Vorlesung_ID." ".$this->Vorlesung_name;
        //�ffentliche Methode __troString() wird definiert
        //AUfgabe: Ausgabe id name usw  der Klasse
    }
}

echo "$Vorlesung->Vorlesung_ID";