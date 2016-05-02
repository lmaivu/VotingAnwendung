<?php
/**
 * Created by PhpStorm.
 * User: LenaBogunovic
 * Date: 02.05.16
 * Time: 12:06
 */

require_once ("../Mapper/Manager.php");


#USERDATA
class UserData
{
    public static $dsn = "mysql:dbhost=localhost;dbname=u-lv018";
    public static $dbuser = "lv018";
    public static $dbpass = "naiT0ohd0e";

}


#KLASSE VORLESUNG
class Vorlesung
{
    public $Vorlesung_ID;
    public $Name;

    function __construct($data=null) { //konstruktor, �berpr�ft ob Daten bereits bestehen?
        if (is_array($data)) { //�berpr�fen ob es sich um einen array handelt
            $this->Vorlesung_ID = $data['Vorlesung_ID'];
            $this->Name = $data ['Name'];
        }
        //return $this->$data;
    }
}


#MANAGER
class Vorlesungsmanager extends Manager
{
    protected $pdo;

    public function __construct($connection = null)
    {
        parent::__construct($connection);
    }

    public function __destruct()
    {
        parent::__destruct();
    }

    public function findByLogin($login, $password)
    {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM Vorlesung');
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Vorlesung');
            $vorlesung = $stmt->fetch();

            while ($row = mysqli_fetch_object($vorlesung)) {
                echo $row->Vorlesung_ID;
                echo $row->Name;
            }
        }
        catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
    }

    public function create(Vorlesung $vorlesung)
    {
        try {
            $stmt = $this->pdo->prepare('
INSERT INTO Vorlesung
(Vorlesung_ID, Name)
VALUES
(:Vorlesung_ID, :Name)
');
            $stmt->bindParam(':Vorlesung_ID', $vorlesung->Vorlesung_ID);
            $stmt->bindParam(':Name', $vorlesung->Name);
            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            return null;
        }
        return $vorlesung;
    }

    private function update(Dozent $dozent)
    {
        try {
            $stmt = $this->pdo->prepare('
UPDATE dozent
SET vorname = :vorname,
nachname = :nachname,
hash = :hash
WHERE login = :login
');
            $stmt->bindParam(':vorname', $dozent->vorname);
            $stmt->bindParam(':nachname', $dozent->nachname);
            $stmt->bindParam(':hash', $dozent->hash);
            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        return $dozent;
    }

    public function delete(Dozent $dozent)
    {
        try {
            $stmt = $this->pdo->prepare('
DELETE FROM user WHERE login= :login
');
            $stmt->bindParam(':login', $dozent->login);
            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            return $dozent;
        }
        return null;
    }
}