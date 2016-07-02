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
              SELECT * FROM Voting WHERE Vorlesung_ID = :Vorlesung
            '); //oder Where Vorlesung_ID= :Vorlesung_ID
            $stmt->bindParam(':Vorlesung', $Vorlesung);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Voting');
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }

    }


    public function findbyDozent($dozent) //hierfür müsste man bei Vorlesung erst noch einen Dozenten anlegen
    {
        try {
            $stmt = $this->pdo->prepare('
              SELECT * FROM Voting WHERE Dozent_ID = :Dozent
            '); //oder Where Vorlesung_ID= :Vorlesung_ID
            $stmt->bindParam(':Dozent', $dozent);
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
        if (isset($Voting->Voting_ID)) { //Oder Vorlesung_ID
            $this->update($Voting);
            return $Voting;
        }
        // ...sonst Anlage eines neuen Datensatzes
        try {
            $stmt = $this->pdo->prepare('
              INSERT INTO Voting
                (Voting_Name, Einschreibeschlussel, Ablaufzeit, Vorlesung_ID, Frage, Antwort_A, Antwort_B, Antwort_C, Antwort_D)
              VALUES
                (:Voting_Name, :Einschreibeschlussel , :Ablaufzeit, :Vorlesung_ID, :Frage, :Antwort_A, :Antwort_B, :Antwort_C, :Antwort_D)
            ');
            $stmt->bindParam(':Voting_Name', $Voting->Voting_Name);
            $stmt->bindParam(':Einschreibeschlussel', $Voting->Einschreibeschlussel);
            $stmt->bindParam(':Ablaufzeit', $Voting->Ablaufzeit);
            //$stmt->bindParam(':Voting_Erstellung', $Voting->Voting_Erstellung);
            $stmt->bindParam(':Frage', $Voting->Frage);
            $stmt->bindParam(':Antwort_A', $Voting->Antwort_A);
            $stmt->bindParam(':Antwort_B', $Voting->Antwort_A);
            $stmt->bindParam(':Antwort_C', $Voting->Antwort_C);
            $stmt->bindParam(':Antwort_D', $Voting->Antwort_D);
            $stmt->bindParam(':Vorlesung_ID', $Voting->Vorlesung_ID);
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
                  Vorlesung_ID = :Vorlesung_ID
              WHERE Voting_ID = :Voting_ID
            ');
            $stmt->bindParam(':Voting_ID', $Voting->Voting_ID);
            $stmt->bindParam(':Voting_Name', $Voting->Voting_Name);
            $stmt->bindParam(':Einschreibeschlussel', $Voting->Einschreibeschlussel);
            $stmt->bindParam(':Ablaufzeit', $Voting->Ablaufzeit);;
            $stmt->bindParam(':Vorlesung_ID', $Voting->Vorlesung_ID);


            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        return $Voting;
    }

    public function updateA (Voting $Voting)
    {
        try {
            $stmt = $this->pdo->prepare('
              UPDATE Voting
              SET a_Student =:a_Student+1
              WHERE Voting_ID = :Voting_ID
            ');
            $stmt->bindParam(':Voting_ID', $Voting->Voting_ID);
            $stmt->bindParam(':a_Student', $Voting->a_Student);

            $stmt->execute();
            //$stmt->execute(array('a_Student' => ':a_Student+1'));
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        return $Voting;
    }

    public function updateB (Voting $Voting)
    {
        try {
            $stmt = $this->pdo->prepare('
              UPDATE Voting
              SET b_Student = :b_Student+1,
              WHERE Voting_ID = :Voting_ID
            ');
            $stmt->bindParam(':Voting_ID', $Voting->Voting_ID);
            $stmt->bindParam(':b_Student', $Voting->b_Student);

            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        return $Voting;
    }

    public function updateC (Voting $Voting)
    {
        try {
            $stmt = $this->pdo->prepare('
              UPDATE Voting
              SET c_Student = :c_Student+1,
              WHERE Voting_ID = :Voting_ID
            ');
            $stmt->bindParam(':Voting_ID', $Voting->Voting_ID);
            $stmt->bindParam(':c_Student', $Voting->c_Student);

            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        return $Voting;
    }

    public function updateD (Voting $Voting)
    {
        try {
            $stmt = $this->pdo->prepare('
              UPDATE Voting
              SET d_Student = :d_Student+1,
              WHERE Voting_ID = :Voting_ID
            ');
            $stmt->bindParam(':Voting_ID', $Voting->Voting_ID);
            $stmt->bindParam(':d_Student', $Voting->d_Student);

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




public function countVote($Voting_ID) //nochmal überprüfen ob Vorlesung_ID oder Voting_ID
{
    try {
        $stmt = $this->pdo->prepare('SELECT a_Student, b_Student, c_Student, d_Student FROM Voting WHERE Voting_ID = :Voting_ID');
        $stmt->bindParam(':Voting_ID', $Voting_ID);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Voting');
        return $stmt->fetch();
    } catch (PDOException $e) {
        echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
        die();
    }
} }

