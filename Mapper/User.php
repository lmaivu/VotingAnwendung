<?php

class Dozent
{
    public $login;
    public $vorname;
    public $nachname;
    public $hash;

    function __construct($data=null) { //konstruktor, �berpr�ft ob Daten bereits bestehen?
        if (is_array($data)) { //�berpr�fen ob es sich um einen array handelt
            $this->login = $data['login'];
            $this->vorname = $data ['vorname'];
            $this->nachname = $data ['nachname'];
            $this->hash = $data['hash'];
        }
        //return $this->$data;
    }
}
?>