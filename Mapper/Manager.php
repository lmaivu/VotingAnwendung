<?php
require_once("Userdata.php");

class Manager
{
    protected $pdo;

    public function __construct($connection = null)
    {
        try {
            $this->pdo = $connection;
            if ($this->pdo === null) {
                $this->pdo = new PDO(
                    UserData::$dsn,
                    UserData::$dbuser,
                    UserData::$dbpass);
                //DB-Verbindung wird durch neues PDO Objekt aufgebaut
            }
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die(); //bei Fehlern
        }
    }

    public function __destruct()
    {
        $this->pdo = null; //hier wird die Verbindung wieder geschlossen
    }
}