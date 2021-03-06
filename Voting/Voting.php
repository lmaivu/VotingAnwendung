<?php

class Voting
{
    public $Voting_ID;
    public $Voting_Name;
    public $Einschreibeschlussel;
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


    public $Prozent_a;
    public $Prozent_b;
    public $Prozent_c;
    public $Prozent_d;
    public $aktiv;



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
            $this->Voting_Erstellung = $data['Voting_Erstellung'];
            $this->Vorlesung_ID = $data['Vorlesung_ID'];
            $this->Frage = $data['Frage'];
            $this->Antwort_A = $data['Antwort_A'];
            $this->a_Student = $data['a_Student'];
            $this->Antwort_B = $data['Antwort_B'];
            $this->b_Student = $data['b_Student'];
            $this->Antwort_C = $data['Antwort_C'];
            $this->c_Student = $data['c_Student'];
            $this->Antwort_D = $data['Antwort_D'];
            $this->d_Student = $data['d_Student'];
            $this->Prozent_a = $data['Prozent_a'];
            $this->Prozent_b = $data['Prozent_b'];
            $this->Prozent_c = $data['Prozent_c'];
            $this->Prozent_d = $data['Prozent_d'];
            $this->aktiv = $data['aktiv'];
            //automatische Setzung dieser Daten
        }
    }

    public function __toString() {
        return $this->Voting_ID." ".$this->Voting_Name." ".$this->Einschreibeschlussel." ".$this->Voting_Erstellung." ".$this->Voting_ID;
        //�ffentliche Methode __troString() wird definiert
        //AUfgabe: Ausgabe id name usw  der Klasse
    }
}