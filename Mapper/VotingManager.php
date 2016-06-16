<!-- VotingManager zum Aufbau der DB-Verbindung
mit folgenden Funktionen: findbyID, findAll, CRUD applikationen -->
<?php

require_once("../Voting/Voting.php");
require_once("../Mapper/Manager.php");

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

    public function findById($Voting_ID)
    {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM Voting WHERE Voting_ID = :Voting_ID');
            $stmt->bindParam(':Voting_ID', $Voting_ID);
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

    public function findAll($Vorlesung)
    {
        try {
            $stmt = $this->pdo->prepare('
              SELECT * FROM Voting WHERE Vorlesung_ID = :Vorlesung_ID
            ');
            $stmt->bindParam(':Vorlesung', $Vorlesung);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Voting');
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }

    }

    public function save(Voting $Voting)
    {
        // wenn ID gesetzt, dann update...
        if (isset($Voting->Voting_ID)) {
            $this->update($Voting);
            return $Voting;
        }
        // ...sonst Anlage eines neuen Datensatzes
        try {
            $stmt = $this->pdo->prepare('
              INSERT INTO Voting
                (Voting_Name, Einschreibeschlussel, Ablaufzeit, Voting_Erstellung, Vorlesung_ID, frage, a, b, c, d)
              VALUES
                (:Voting_Name, :Voting_Einschreibeschlussel , :Voting_Ablaufzeit, NOW(), :Vorlesung_ID, :frage, :a, :b, :c, :d)
            ');
            $stmt->bindParam(':Voting_Name', $Voting->Voting_Name);
            $stmt->bindParam(':Einschreibeschlussel', $Voting->Einschreibeschlussel);
            $stmt->bindParam(':Ablaufzeit', $Voting->Ablaufzeit);
            $stmt->bindParam(':Voting_Erstellung', $Voting->Voting_Erstellung);
            $stmt->bindParam(':frage', $Voting->frage);
            $stmt->bindParam(':a', $Voting->a);
            $stmt->bindParam(':b', $Voting->b);
            $stmt->bindParam(':c', $Voting->c);
            $stmt->bindParam(':d', $Voting->d);
            $stmt->bindParam(':Voting_ID', $Voting->Vorlesung_ID);
            $stmt->execute();
            // lastinsertId() gibt die zuletzt eingef�gte Id zur�ck -> damit Update der internen Id
            $Voting->Voting_ID = $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        return $Voting;
    }

    private function update(Voting $Voting) //Sollen wir wirklich Voting bearbeiten lassen?
    {
        echo ("update!");
        try {
            $stmt = $this->pdo->prepare('
              UPDATE Voting
              SET Voting_Name = :Voting_Name,
                  Einschreibeschlussel = :Einschreibeschlussel,
                  Ablaufzeit = :Ablaufzeit,
                  Voting_Erstellung = :Voting_Erstellung,
                  Vorlesung_ID = :Vorlesung_ID
              WHERE Voting_ID = :Voting_ID
            ');
            $stmt->bindParam(':Voting_ID', $Voting->Voting_ID);
            $stmt->bindParam(':Voting_Name', $Voting->Voting_Name);
            $stmt->bindParam(':Einschreibeschlussel', $Voting->Einschreibeschlussel);
            $stmt->bindParam(':Ablaufzeit', $Voting->Ablaufzeit);
            $stmt->bindParam(':Voting_Erstellung', $Voting->Voting_Erstellung);
            $stmt->bindParam(':Voting_ID', $Voting->Vorlesung_ID);

            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        return $Voting;
    }

    public function delete(Voting $Voting)
    {
        if (!isset($Voting->Voting_ID)) {
            $Voting = null;
            return $Voting;
        }
        try {
            $stmt = $this->pdo->prepare('
              DELETE FROM Voting WHERE Voting_ID= :Voting_ID
            ');
            $stmt->bindParam(':Voting_ID', $Voting->Voting_ID);
            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        $Voting = null;
        return $Voting;
    }



public function getVoting($Vorlesung_ID) //nochmal überprüfen ob Vorlesung_ID oder Voting_ID
{
    try {
        $stmt = $this->pdo->prepare('SELECT a_Student, b_Student, c_Student, d_Student FROM Voting WHERE Vorlesung_ID = :Vorlesung_ID');
        $stmt->bindParam(':Vorlesung_ID', $Vorlesung_ID);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Voting');
        return $stmt->fetch();
    } catch (PDOException $e) {
        echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
        die();
    }
} }
