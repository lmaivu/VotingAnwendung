<!-- Mapper für die Zwischentabelle VotingVorlesung-->

<?php

require_once("../Mapper/Manager.php");

require_once("../Voting/Voting.php");
require_once("../Voting/VotingManager.php");

require_once("../Vorlesung/Vorlesung.php");
require_once("../Vorlesung/VorlesungsManager.php");


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

    public function findAllLeserByNotiz(Notiz $notiz)
    {
        try {
            $stmt = $this->pdo->prepare('
              SELECT * FROM leser, notiz_leser WHERE leser.id = notiz_leser.leser_id AND notiz_leser.notiz_id = :id
            ');
            $stmt->bindParam(':id', $notiz->id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Leser');
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
    }

    public function findAllNotizByLeser(Leser $leser)
    {
        try {
            $stmt = $this->pdo->prepare('
              SELECT * FROM notiz, notiz_leser WHERE notiz.id = notiz_leser.notiz_id AND notiz_leser.leser_id = :id
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

    public function findAllLeserNotConnectedToNotiz(Notiz $notiz)
    {
        try {
            $stmt = $this->pdo->prepare('
              SELECT * FROM leser WHERE leser.id NOT IN (SELECT notiz_leser.leser_id FROM notiz_leser WHERE notiz_leser.notiz_id = :id)
            ');
            $stmt->bindParam(':id', $notiz->id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Leser');
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
              SELECT * FROM notiz WHERE notiz.id NOT IN (SELECT notiz_leser.notiz_id FROM notiz_leser WHERE notiz_leser.leser_id = :id)
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

    public function createNotizLeser(Notiz $notiz, Leser $leser)
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

    public function createNotizLeserById ($notiz_id, $leser_id)
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

    public function deleteNotizLeser(Notiz $notiz, Leser $leser)
    {
        try {
            $stmt = $this->pdo->prepare('
              DELETE FROM notiz_leser WHERE notiz_id = :notiz_id AND leser_id = :leser_id
            ');
            $stmt->bindParam(':notiz_id', $notiz->id);
            $stmt->bindParam(':leser_id', $leser->id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        $leser = null;
        $notiz = null;
        return null;
    }

    public function deleteNotizLeserById($notiz_id, $leser_id)
    {
        try {
            $stmt = $this->pdo->prepare('
              DELETE FROM notiz_leser WHERE notiz_id = :notiz_id AND leser_id = :leser_id
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


