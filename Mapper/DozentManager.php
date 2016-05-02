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

public function findByLogin($login, $password)
{
try {
$stmt = $this->pdo->prepare('SELECT * FROM Dozent WHERE login = :login AND password= :password');
$stmt->bindParam(':login', $login);
$stmt->bindParam(':password', $password);
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_CLASS, 'Dozent');
$dozent = $stmt->fetch();

    return $dozent;
// if (password_verify($password, $dozent->hash)) {
//return $dozent;
//} else {
//return null;
//}
} catch (PDOException $e) {
echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
die();
}
return null;
}

 public function findName($vorname, $nachname)
    {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM Dozent WHERE login = :login AND password= :password');
            $stmt->bindParam(':vorname', $vorname);
            $stmt->bindParam(':nachname', $nachname);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Dozent');
            $dozent = $stmt->fetch();

            return $dozent;}
        catch (PDOException $e) {
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
(login, vorname, nachname, password)
VALUES
(:login, :vorname , :nachname, :password)
');
$stmt->bindParam(':login', $dozent->login);
$stmt->bindParam(':vorname', $dozent->vorname);
$stmt->bindParam(':nachname', $dozent->nachname);
$stmt->bindParam(':password', $dozent->password);
$stmt->execute();
} catch (PDOException $e) {
echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
return null;
}
return $dozent;
}

private function update(Dozent $dozent)
{
try {
$stmt = $this->pdo->prepare('
UPDATE Dozent
SET vorname = :vorname,
nachname = :nachname,
password = :password
WHERE login = :login
');
$stmt->bindParam(':vorname', $dozent->vorname);
$stmt->bindParam(':nachname', $dozent->nachname);
$stmt->bindParam(':password', $dozent->password);
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
DELETE FROM user WHERE login= :login
');
$stmt->bindParam(':login', $dozent->login);
$stmt->execute();
} catch (PDOException $e) {
echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
return $dozent;
}
return null;
}
}