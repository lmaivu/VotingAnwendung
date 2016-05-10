<!-- VotingManager zum Aufbau der DB-Verbindung
mit folgenden Funktionen: findbyID, findAll, CRUD applikationen -->
<?php

require_once("Voting.php");
require_once("../Mapper/UserData.php");

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

    public function findById($id)
    {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM Voting WHERE id = :id');
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Notiz');
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
                (betreff, name, text, datum)
              VALUES
                (:betreff, :name , :text, NOW())
            ');
            $stmt->bindParam(':betreff', $voting->betreff);
            $stmt->bindParam(':name', $voting->name);
            $stmt->bindParam(':text', $voting->text);
            $stmt->execute();
            // lastinsertId() gibt die zuletzt eingefügte Id zurück -> damit Update der internen Id
            $voting->id = $this->pdo->lastInsertId();
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
              SET betreff = :betreff,
                  name = :name,
                  text = :text
              WHERE id = :id
            ');
            $stmt->bindParam(':id', $voting->id);
            $stmt->bindParam(':betreff', $voting->betreff);
            $stmt->bindParam(':name', $voting->name);
            $stmt->bindParam(':text', $voting->text);
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
