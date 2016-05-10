<?php

class Voting
{
    public $id;
    public $betreff;
    public $name;
    public $text;
    public $datum;

    function __construct($data=null) { //Construktor wird definiert mit dem Parameter $data mit dem festen Wert 0
        //Wert als assoziativer array,
        if (is_array($data)) { //vordefiniert von PDO, überprüft ob &data ein array ist
            if (isset($data['id'])) $this->id = $data['id'];
            //Überprüfung, ob id vorhanden ist
            //wenn bei data eine ID übergeben wurde, Aufruf des Attributs id
            //bekommt den Wert id des Parameters $data
            //wenn User in der DB besteht, dann bekommt er automatisch eine id

            $this->betreff = $data['betreff'];
            $this->name = $data['name'];
            $this->text = $data['text'];
            $this->datum = $data['datum'];
            //automatische Setzung dieser Daten
        }
    }

    public function __toString() {
        return $this->id." ".$this->betreff." ".$this->name." ".$this->text." ".$this->datum;
        //öffentliche Methode __troString() wird definiert
        //AUfgabe: Ausgabe id betreff text datum der Klasse
    }
}