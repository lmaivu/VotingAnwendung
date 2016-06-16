<?php

class Voting
{
    public $Voting_ID;
    public $Voting_Name;
    public $Einschreibeschlussel;
    public $Ablaufzeit;
    public $Voting_Erstellung;
    public $Vorlesung_ID; //überprüfen ob erforderlich
    public $frage;
    public $a;
    public $a_Student;
    public $b;
    public $b_Student;
    public $c;
    public $c_Student;
    public $d;
    public $d_Student;


    function __construct($data=null) { //Konstruktor wird definiert mit dem Parameter $data mit dem festen Wert 0
        //Wert als assoziativer array,
        if (is_array($data)) { //vordefiniert von PDO, �berpr�ft ob &data ein array ist
            if (isset($data['Voting_ID']))
                $this->Voting_ID = $data['Voting_ID'];
            //�berpr�fung, ob id vorhanden ist
            //wenn bei data eine ID �bergeben wurde, Aufruf des Attributs id
            //bekommt den Wert id des Parameters $data
            //wenn User in der DB besteht, dann bekommt er automatisch eine id

            $this->Voting_Name = $data['Voting_Name'];
            $this->Einschreibeschlussel = $data['Einschreibeschlussel'];
            $this->Ablaufzeit = $data['Ablaufzeit'];
            $this->Voting_Erstellung = $data['Voting_Erstellung'];
            $this->Vorlesung_ID = $data['Vorlesung_ID'];
            $this->frage = $data['frage'];
            $this->a = $data['a'];
            $this->a_Student = $data['a_Student'];
            $this->b = $data['b'];
            $this->b_Student = $data['a_Student'];
            $this->c = $data['c'];
            $this->c_Student = $data['a_Student'];
            $this->d = $data['d'];
            $this->d_Student = $data['a_Student'];
            //automatische Setzung dieser Daten
        }
    }

    public function __toString() {
        return $this->Voting_ID." ".$this->Voting_Name." ".$this->Einschreibeschlussel." ".$this->Ablaufzeit." ".$this->Voting_Erstellung." ".$this->Voting_ID;
        //�ffentliche Methode __troString() wird definiert
        //AUfgabe: Ausgabe id name usw  der Klasse
    }
}