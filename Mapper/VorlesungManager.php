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

    public function findById($vorlesung_ID)
    {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM Vorlesung WHERE Vorlesung_ID = :vorlesung_ID');
            $stmt->bindParam(':vorlesung_ID', $vorlesung_ID);
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

    public function save(Vorlesung $vorlesung)
    {
        // wenn ID gesetzt, dann update...
        if (isset($vorlesung->vorlesung_ID)) {
            $this->update($vorlesung);
            return $vorlesung;
        }
        // ...sonst Anlage eines neuen Datensatzes
        try {
            $stmt = $this->pdo->prepare('
              INSERT INTO Vorlesung
                (Vorlesung_Name)
              VALUES
                (:vorlesung_name)
            ');
            $stmt->bindParam(':vorlesung_name', $vorlesung->vorlesung_name);
            $stmt->execute();
            // lastinsertId() gibt die zuletzt eingefügte Id zurück -> damit Update der internen Id
            $vorlesung->vorlesung_ID = $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        return $vorlesung;
    }

    private function update(Vorlesung $vorlesung)
    {
        echo ("update!");
        try {
            $stmt = $this->pdo->prepare('
              UPDATE Vorlesung
              SET Vorlesung_Name = :vorlesung_name,
              WHERE Voting_ID = :voting_ID
            ');
            $stmt->bindParam(':vorlesung_ID', $vorlesung->vorlesung_ID);
            $stmt->bindParam(':vorlesung_name', $vorlesung->vorlesung_name);

            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        return $vorlesung;
    }

    public function delete(Vorlesung $vorlesung)
    {
        if (!isset($vorlesung->id)) {
            $vorlesung = null;
            return $vorlesung;
        }
        try {
            $stmt = $this->pdo->prepare('
              DELETE FROM Vorlesung WHERE Vorlesung_ID= :vorlesung_ID
            ');
            $stmt->bindParam(':vorlesung_ID', $vorlesung->vorlesung_ID);
            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        $vorlesung = null;
        return $vorlesung;
    }
}
