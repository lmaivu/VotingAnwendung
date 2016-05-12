<!-- VotingManager zum Aufbau der DB-Verbindung
mit folgenden Funktionen: findbyID, findAll, CRUD applikationen -->
<?php

require_once("../Voting/Voting.php");
require_once("../Mapper/Userdata.php");

class VotingManager
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

    public function findById($voting_ID)
    {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM Voting WHERE Voting_ID = :voting_ID');
            $stmt->bindParam(':voting_ID', $voting_ID);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Voting');
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
              SELECT * FROM Voting
            ');
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Voting');
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }

    }

    public function save(Voting $voting)
    {
        // wenn ID gesetzt, dann update...
        if (isset($voting->id)) {
            $this->update($voting);
            return $voting;
        }
        // ...sonst Anlage eines neuen Datensatzes
        try {
            $stmt = $this->pdo->prepare('
              INSERT INTO Voting
                (Voting_Name, Voting_Ergebnis , Ablaufzeit, Voting_Erstellung)
              VALUES
                (:voting_name, :voting_ergebnis , :voting_ablaufzeit, NOW())
            ');
            $stmt->bindParam(':voting_name', $voting->voting_name);
            $stmt->bindParam(':voting_ergebnis', $voting->voting_ergebnis);
            $stmt->bindParam(':voting_ablaufzeit', $voting->voting_ablaufzeit);
            $stmt->execute();
            // lastinsertId() gibt die zuletzt eingefügte Id zurück -> damit Update der internen Id
            $voting->voting_ID = $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        return $voting;
    }

    private function update(Voting $voting)
    {
        echo ("update!");
        try {
            $stmt = $this->pdo->prepare('
              UPDATE Voting
              SET Voting_Name = :voting_name,
                  Voting_Ergebnis = :voting_ergebnis,
                  Ablaufzeit = :voting_ablaufzeit
              WHERE Voting_ID = :voting_ID
            ');
            $stmt->bindParam(':voting_ID', $voting->voting_ID);
            $stmt->bindParam(':voting_name', $voting->voting_name);
            $stmt->bindParam(':voting_erstellung', $voting->voting_erstellung);
            $stmt->bindParam(':voting_ablaufzeit', $voting->voting_ablaufzeit);

            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        return $voting;
    }

    public function delete(Voting $voting)
    {
        if (!isset($voting->id)) {
            $voting = null;
            return $voting;
        }
        try {
            $stmt = $this->pdo->prepare('
              DELETE FROM Voting WHERE id= :id
            ');
            $stmt->bindParam(':id', $voting->id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        $voting = null;
        return $voting;
    }
}
