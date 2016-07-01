<?php

require_once("Manager.php");
require_once("Dozent.php");

class DozentManager extends Manager
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

    public function findById($Dozent_ID)
    {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM Dozent WHERE Dozent_ID = :Dozent_ID');
            $stmt->bindParam(':Dozent_ID', $Dozent_ID);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Dozent');
            $n = $stmt->fetch();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        if (!$n) $n = null;
        return $n;
    }
    public function findByLogin($login, $hash)
    {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM Dozent WHERE login = :login');
            $stmt->bindParam(':login', $login);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Dozent');
            $dozent = $stmt->fetch();



            if (password_verify($hash, $dozent->hash)) {
            return $dozent;
            } else {
            return null;
            }
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        return null;
    }

    public function findName($vorname, $nachname)
    {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM Dozent WHERE login = :login AND hash= :hash');
            $stmt->bindParam(':vorname', $vorname);
            $stmt->bindParam(':nachname', $nachname);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Dozent');
            $dozent = $stmt->fetch();

            return $dozent;
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        return null;
    }

    public function create(Dozent $dozent)
    {
        try {
            $stmt = $this->pdo->prepare('
INSERT INTO Dozent
(login, vorname, nachname, hash)
VALUES
(:login, :vorname , :nachname, :hash)
');
            $stmt->bindParam(':login', $dozent->login);
            $stmt->bindParam(':vorname', $dozent->vorname);
            $stmt->bindParam(':nachname', $dozent->nachname);
            $stmt->bindParam(':hash', $dozent->hash);
            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            return null;
        }
        return $dozent;
    }



    public function savePassword(Dozent $dozent) //neues Passwort speichern

    {
        // wenn ID gesetzt, dann update...
        if (isset($dozent->Dozent_ID)) {
            $this->update($dozent);
            return $dozent;
        }
        // ...dann Anlage eines neuen Datensatzes versuchen
        try {
            $stmt = $this->pdo->prepare('
              INSERT INTO Dozent
                (hash, Dozent_ID)
              VALUES
                (:hash, :Dozent_ID)
            ');
            $stmt->bindParam(':hash', $dozent->hash);
            $stmt->bindParam(':Dozent_ID', $dozent->Dozent_ID);
            $stmt->execute();
            // lastinsertId() gibt die zuletzt eingef�gte Id zur�ck -> damit Update der internen Id
            $dozent->Dozent_ID = $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        return $dozent;
    }

    public function update(Dozent $dozent)
    {
        try {
            $stmt = $this->pdo->prepare('
              UPDATE Dozent
              SET hash = :hash,
              WHERE Dozent_ID = :Dozent_ID
            ');
            $stmt->bindParam(':hash', $dozent->hash);
            $stmt->bindParam(':Dozent_ID', $dozent->Dozent_ID);

            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        return $dozent;
    }

    public function delete(Dozent $dozent)
    {
        try {
            $stmt = $this->pdo->prepare('
DELETE FROM Dozent WHERE login= :login
');
            $stmt->bindParam(':login', $dozent->login);
            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            return $dozent;
        }
        return null;
    }}
/**
    public function getName($nachname)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT nachname FROM Dozent WHERE login= :login");
            $stmt->bindParam(':nachname', $nachname);

            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Dozent');
            $nachname = $stmt->fetch();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");

        }
        return null;
    }
}**/

