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
                (Voting_Name, Voting_Ergebnis , Ablaufzeit, Voting_Erstellung)
              VALUES
                (:Voting_Name, :Voting_Ergebnis , :Voting_Ablaufzeit, NOW())
            ');
            $stmt->bindParam(':Voting_Name', $Voting->Voting_Name);
            $stmt->bindParam(':Voting_Ergebnis', $Voting->Voting_Ergebnis);
            $stmt->bindParam(':Voting_Ablaufzeit', $Voting->Voting_Ablaufzeit);
            $stmt->execute();
            // lastinsertId() gibt die zuletzt eingef�gte Id zur�ck -> damit Update der internen Id
            $Voting->Voting_ID = $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        return $Voting;
    }

    private function update(Voting $Voting)
    {
        echo ("update!");
        try {
            $stmt = $this->pdo->prepare('
              UPDATE Voting
              SET Voting_Name = :Voting_Name,
                  Voting_Ergebnis = :Voting_Ergebnis,
                  Ablaufzeit = :Voting_Ablaufzeit
              WHERE Voting_ID = :Voting_ID
            ');
            $stmt->bindParam(':Voting_ID', $Voting->Voting_ID);
            $stmt->bindParam(':Voting_Name', $Voting->Voting_Name);
            $stmt->bindParam(':Voting_Erstellung', $Voting->Voting_Erstellung);
            $stmt->bindParam(':Voting_Ablaufzeit', $Voting->Voting_Ablaufzeit);

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
}
