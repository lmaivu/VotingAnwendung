<?php

class Dozent
{
    public $login;
    public $vorname;
    public $nachname;
    public $password;

    function __construct($data=null) { //konstruktor, überprüft ob Daten bereits bestehen?
        if (is_array($data)) { //überprüfen ob es sich um einen array handelt
            $this->login = $data['login'];
            $this->vorname = $data ['vorname'];
            $this->nachname = $data ['nachname'];
            $this->password = $data['password'];
        }
        //return $this->$data;
    }

}

?>