<!-- VotingManager zum Aufbau der DB-Verbindung
mit folgenden Funktionen: findbyID, findAll, CRUD applikationen -->
<?php

require_once("../Vorlesung/Vorlesung.php");
require_once("../Mapper/Userdata.php");

class VorlesungManager
{
    private $pdo;

    public function __construct($connection = null)
    {
        try {
            $this->pdo = $connection;
            if ($this->pdo === null) {
                $this->pdo = new PDO(
                    UserData::$dsn,
                    UserData::$dbuser,
                    UserData::$dbpass
                );
            }
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
    }

    public function __destruct()
    {
        $this->pdo = null;
    }

    public function findById($Vorlesung_ID)
    {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM Vorlesung WHERE Vorlesung_ID = :Vorlesung_ID');
            $stmt->bindParam(':Vorlesung_ID', $Vorlesung_ID);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Vorlesung');
            $n = $stmt->fetch();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        if (!$n) $n = null;
        return $n;
    }

    public function findAll()
    {
        try {
            $stmt = $this->pdo->prepare('
              SELECT * FROM Vorlesung
            ');
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Vorlesung');
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }

    }

    public function save(Vorlesung $Vorlesung)
    {
        // wenn ID gesetzt, dann update...
        if (isset($Vorlesung->Vorlesung_ID)) {
            $this->update($Vorlesung);
            return $Vorlesung;
        }
        // ...sonst Anlage eines neuen Datensatzes
        try {
            $stmt = $this->pdo->prepare('
              INSERT INTO Vorlesung
                (Vorlesung_Name)
              VALUES
                (:vorlesung_name)
            ');
            $stmt->bindParam(':Vorlesung_name', $Vorlesung->Vorlesung_name);
            $stmt->execute();
            // lastinsertId() gibt die zuletzt eingef�gte Id zur�ck -> damit Update der internen Id
            $Vorlesung->Vorlesung_ID = $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        return $Vorlesung;
    }

    private function update(Vorlesung $Vorlesung)
    {
        echo ("update!");
        try {
            $stmt = $this->pdo->prepare('
              UPDATE Vorlesung
              SET Vorlesung_Name = :Vorlesung_name,
              WHERE Voting_ID = :Voting_ID
            ');
            $stmt->bindParam(':Vorlesung_ID', $Vorlesung->Vorlesung_ID);
            $stmt->bindParam(':Vorlesung_name', $Vorlesung->Vorlesung_Name);

            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        return $Vorlesung;
    }

    public function delete(Vorlesung $Vorlesung)
    {
        if (!isset($Vorlesung->Vorlesung_ID)) {
            $Vorlesung = null;
            return $Vorlesung;
        }
        try {
            $stmt = $this->pdo->prepare('
              DELETE FROM Vorlesung WHERE Vorlesung_ID= :Vorlesung_ID
            ');
            $stmt->bindParam(':Vorlesung_ID', $Vorlesung->Vorlesung_ID);
            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        $Vorlesung = null;
        return $Vorlesung;
    }
}
