<!-- VotingManager zum Aufbau der DB-Verbindung
mit folgenden Funktionen: findbyID, findAll, CRUD applikationen -->
<?php
require_once("Manager.php");
require_once("../Vorlesung/Vorlesung.php");
require_once("Dozent.php");
require_once("DozentManager.php");
require_once("../Mapper/Userdata.php");

class VorlesungManager extends Manager
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

    public function findById($Vorlesung_ID)
    {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM Vorlesung WHERE Vorlesung_ID = :Vorlesung_ID');
            $stmt->bindParam(':Vorlesung_ID', $Vorlesung_ID);
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

    public function findAll($dozent)
    {
        try {
            //**$stmt = $this->pdo->prepare('SELECT * FROM Vorlesung WHERE Dozent_ID= Dozent_ID'); // Doppelpunkt ausprobieren
            $stmt = $this->pdo->prepare('SELECT Vorlesung_ID, Vorlesung_Name FROM Vorlesung WHERE Dozent_ID= :Dozent');
            /**$stmt = $this->pdo->prepare('SELECT Vorlesung_ID, Vorlesung_Name FROM Vorlesung, Dozent WHERE Vorlesung.Dozent_ID= :dozent'); **/
            $stmt->bindParam(':Dozent', $dozent->Dozent_ID);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Vorlesung');
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }

    }

    public function save(Vorlesung $Vorlesung) //testen ob man nur die Varibale $Vorlesung nehmen soll
    {
        // wenn ID gesetzt, dann update...
        if (isset($Vorlesung->Vorlesung_ID)) {
            $this->update($Vorlesung);
            return $Vorlesung;
        }
        // ...sonst Anlage eines neuen Datensatzes
        try {
            $stmt = $this->pdo->prepare('
              INSERT INTO Vorlesung
                (Vorlesung_Name, Dozent_ID)
              VALUES
                (:Vorlesung_Name, :Dozent_ID)
            ');
            $stmt->bindParam(':Vorlesung_Name', $Vorlesung->Vorlesung_Name);
            $stmt->bindParam(':Dozent_ID', $Vorlesung->Dozent_ID);
            $stmt->execute();
            // lastinsertId() gibt die zuletzt eingef�gte Id zur�ck -> damit Update der internen Id
            $Vorlesung->Vorlesung_ID = $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        return $Vorlesung;
    }

    private function update(Vorlesung $Vorlesung)
    {
        echo ("update!");
        try {
            $stmt = $this->pdo->prepare('
              UPDATE Vorlesung
              SET Vorlesung_Name = :Vorlesung_Name,
              WHERE Vorlesung_ID = :Vorlesung_ID
            ');
            $stmt->bindParam(':Vorlesung_ID', $Vorlesung->Vorlesung_ID);
            $stmt->bindParam(':Vorlesung_Name', $Vorlesung->Vorlesung_Name);

            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        return $Vorlesung;
    }

    public function delete(Vorlesung $Vorlesung)
    {
        /*if (!isset($Vorlesung->Vorlesung_ID)) {
            $Vorlesung = null;
            return $Vorlesung;
        }*/
        try {
            $stmt = $this->pdo->prepare('
              DELETE FROM Vorlesung WHERE Vorlesung_ID= :Vorlesung_ID
            ');
            $stmt->bindParam(':Vorlesung_ID', $Vorlesung->Vorlesung_ID);
            $stmt->execute();
        } catch (PDOException $e) {
            echo("Fehler! Bitten wenden Sie sich an den Administrator...<br>" . $e->getMessage() . "<br>");
            die();
        }
        $Vorlesung = null;
        return $Vorlesung;
    }
}
