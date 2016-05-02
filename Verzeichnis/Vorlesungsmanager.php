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
    public $Vorlesung_name;

    function __construct($data=null) { //konstruktor, �berpr�ft ob Daten bereits bestehen?
        if (is_array($data)) { //�berpr�fen ob es sich um einen array handelt
            $this->Vorlesung_ID = $data['Vorlesung_ID'];
            $this->Vorlesung_name = $data ['Vorlesung_name'];
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

    public function fetchAll($Vorlesung_ID, $Vorlesung_name)
    {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM Vorlesung');
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Vorlesung');
            $vorlesung = $stmt->fetch();

            while ($row = mysqli_fetch_object($vorlesung)) {
                echo $row->Vorlesung_ID;
                echo $row->Vorlesung_name;
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
(Vorlesung_ID, Vorlesung_name)
VALUES
(:Vorlesung_ID, :Vorlesung_name)
');
            $stmt->bindParam(':Vorlesung_ID', $vorlesung->Vorlesung_ID);
            $stmt->bindParam(':Vorlesung_name', $vorlesung->Vorlesung_name);
            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            return null;
        }
        return $vorlesung;
    }

    private function update(Vorlesung $vorlesung)
    {
        try {
            $stmt = $this->pdo->prepare('
UPDATE vorlesung
SET Vorlesung_ID = :Vorlesung_ID,
Vorlesung_name = :Vorlesung_name,
');
            $stmt->bindParam(':Vorlesung_ID', $dozent->Vorlesung_ID);
            $stmt->bindParam(':Vorlesung_name', $dozent->Vorlesung_name);
            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        return $vorlesung;
    }

    public function delete(Vorlesung $vorlesung)
    {
        try {
            $stmt = $this->pdo->prepare('
DELETE FROM Vorlesung WHERE id =
');
            $stmt->bindParam('id=', $vorlesung->id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            return $vorlesung;
        }
        return null;
    }
}