<?php

class Voting
{
    public $Voting_ID;
    public $Voting_Name;
    public $Einschreibeschlussel;
    public $Ablaufzeit;
    public $Voting_Erstellung;
    public $Vorlesung_ID;
    public $Frage;
    public $Antwort_A;
    public $a_Student;
    public $Antwort_B;
    public $b_Student;
    public $Antwort_C;
    public $c_Student;
    public $Antwort_D;
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
            $this->Frage = $data['Frage'];
            $this->Antwort_A = $data['Antwort_A'];
            $this->a_Student = $data['a_Student'];
            $this->Antwort_B = $data['Antwort_B'];
            $this->b_Student = $data['a_Student'];
            $this->Antwort_C = $data['Antwort_C'];
            $this->c_Student = $data['a_Student'];
            $this->Antwort_D = $data['Antwort_D'];
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