<!-- Mapper für die Zwischentabelle VotingVorlesung-->

<?php

require_once("../Mapper/Manager.php");

require_once("../Mapper/Dozent.php");
require_once("../Mapper/DozentManager.php");

require_once("../Vorlesung/Vorlesung.php");
require_once("../Mapper/VorlesungManager.php");


class VotingVorlesungManager extends Manager
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

    public function findAllVorlesungByNotiz(Voting $Voting)
    {
        try {
            $stmt = $this->pdo->prepare('
              SELECT * FROM Vorlesung, Voting_Vorlesung WHERE Vorlesung_ID = notiz_leser.leser_id AND notiz_leser.notiz_id = :id
            ');
            $stmt->bindParam(':Voting_ID', $Voting->Voting_ID);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Vorlesung');
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
    }

    public function findAllVotingByVorlesung(Vorlesung $Vorlesung)
    {
        try {
            $stmt = $this->pdo->prepare('
              SELECT * FROM notiz, notiz_leser WHERE notiz.id = notiz_leser.notiz_id AND notiz_leser.leser_id = :id
            ');
            $stmt->bindParam(':Vorlesung_ID', $Vorlesung->Vorlesung_ID);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Voting');
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
    }

    public function findAllVorlesungNotConnectedToVoting(Voting $Voting)
    {
        try {
            $stmt = $this->pdo->prepare('
              SELECT * FROM Vorlesung WHERE leser.id NOT IN (SELECT notiz_leser.leser_id FROM notiz_leser WHERE notiz_leser.notiz_id = :id)
            ');
            $stmt->bindParam(':Voting_ID', $Voting->Voting_ID);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Vorlesung');
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
    }

    public function findAllNotizNotConnectedToLeser(Leser $leser)
    {
        try {
            $stmt = $this->pdo->prepare('
              SELECT * FROM Voting WHERE notiz.id NOT IN (SELECT notiz_leser.notiz_id FROM notiz_leser WHERE notiz_leser.leser_id = :id)
            ');
            $stmt->bindParam(':id', $leser->id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Notiz');
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
    }

    public function createVotingVorlesung(Voting $voting, Vorlesung $vorlesung)
    {
        try {
            $stmt = $this->pdo->prepare('
              INSERT INTO notiz_leser
                (notiz_id, leser_id)
              VALUES
                (:notiz_id, :leser_id)
            ');
            $stmt->bindParam(':notiz_id', $notiz->id);
            $stmt->bindParam(':leser_id', $leser->id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
    }

    public function createVotingVorlesungById ($notiz_id, $leser_id)
    {
        try {
            $stmt = $this->pdo->prepare('
              INSERT INTO notiz_leser
                (notiz_id, leser_id)
              VALUES
                (:notiz_id, :leser_id)
            ');
            $stmt->bindParam(':notiz_id', $notiz_id);
            $stmt->bindParam(':leser_id', $leser_id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
    }

    public function deleteVotingVorlesung(Voting $voting, Vorlesung $vorlesung)
    {
        try {
            $stmt = $this->pdo->prepare('
              DELETE FROM VotingVorlesung WHERE notiz_id = :notiz_id AND leser_id = :leser_id
            ');
            $stmt->bindParam(':notiz_id', $notiz->id);
            $stmt->bindParam(':leser_id', $leser->id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        $vorlesung = null;
        $voting = null;
        return null;
    }

    public function deleteVotingVorlesungById($notiz_id, $leser_id)
    {
        try {
            $stmt = $this->pdo->prepare('
              DELETE FROM VotingVorlesung WHERE notiz_id = :notiz_id AND leser_id = :leser_id
            ');
            $stmt->bindParam(':notiz_id', $notiz_id);
            $stmt->bindParam(':leser_id', $leser_id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        return null;
    }
}


