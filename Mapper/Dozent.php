<?php

class Dozent
{
    public $Dozent_ID;
    public $login;
    public $vorname;
    public $nachname;
    public $password;

    function __construct($data=null) { //konstruktor, �berpr�ft ob Daten bereits bestehen?
        if (is_array($data)) { //�berpr�fen ob es sich um einen array handelt
            if (isset($data['Dozent_ID'])) $this->Dozent_ID = $data['Dozent_ID'];
            $this->login = $data['login'];
            $this->vorname = $data ['vorname'];
            $this->nachname = $data ['nachname'];
            $this->password = $data['password'];
        }
        //return $this->$data;
    }

}

?>