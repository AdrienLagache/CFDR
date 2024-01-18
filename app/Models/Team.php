<?php
namespace App\Models;

use \PDO;
use App\Utils\Database;

class Team {
    private $id;
    private $name;
    private $manufacturer;

    public static function findAll()
    {
        $pdo = Database::getPDO();

        $sql = 'SELECT *
                    FROM teams';

        $pdoStatement = $pdo->query($sql);

        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'App\\Models\\Team');

        return $results;
    }

    public static function find($id)
    {
        $pdo = Database::getPDO();

        $sql = 'SELECT *
                    FROM teams
                    WHERE id = :id';

        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
        $pdoStatement->execute();

        $result = $pdoStatement->fetchObject('App\\Models\\Team');

        return $result;
    }

    public function insert() 
    {
        $pdo = Database::getPDO();

        $sql = "INSERT INTO `teams` (name, manufacturer)
                    VALUES (:name, :manufacturer)";

        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindValue(':name', $this->name, PDO::PARAM_STR);
        $pdoStatement->bindValue(':manufacturer', $this->manufacturer, PDO::PARAM_STR);

        $pdoStatement->execute();

        if (1 === $pdoStatement->rowCount()) {

            return true;
        }

        return false;
    }

    public function update() 
    {
        $pdo = Database::getPDO();

        $sql = "UPDATE `teams`
                    SET
                        name = :name,
                        manufacturer = :manufacturer
                    WHERE id = :id";

        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindValue(':name', $this->name, PDO::PARAM_STR);
        $pdoStatement->bindValue(':manufacturer', $this->manufacturer, PDO::PARAM_STR);
        $pdoStatement->bindValue(':id', $this->id, PDO::PARAM_INT);


        $pdoStatement->execute();

        if (1 === $pdoStatement->rowCount()) {

            return true;
        }

        return false;
    }

    public function delete()
    {
        $pdo = Database::getPDO();

        $sql = "DELETE FROM `teams` WHERE `id` = :id;";

        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(":id", $this->id, PDO::PARAM_INT);
        $pdoStatement->execute();

        if (1 === $pdoStatement->rowCount()) {
            return true;
        }
        return false;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of manufacturer
     */ 
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * Set the value of manufacturer
     *
     * @return  self
     */ 
    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;

        return $this;
    }
}