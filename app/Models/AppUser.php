<?php
namespace App\Models;

use \PDO;
use App\Utils\Database;

class AppUser
{
    private $id;
    private $pseudo;
    private $team;
    private $car;
    private $points;
    private $password;
    private $email;
    private $role;

    public static function findAll()
    {

        $pdo = Database::getPDO();

        $sql = 'SELECT *
                    FROM app_user';

        $pdoStatement = $pdo->query($sql);

        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'App\\Models\\AppUser');

        return $results;
    }

    public static function find($id)
    {
        $pdo = Database::getPDO();

        $sql = 'SELECT *
                    FROM app_user
                    WHERE id = :id';

        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
        $pdoStatement->execute();

        $result = $pdoStatement->fetchObject('App\\Models\\AppUser');

        return $result;
    }

    public function insert() 
    {
        $pdo = Database::getPDO();

        $sql = "INSERT INTO `app_user` (pseudo, team, car, `password`, email, `role`)
                    VALUES (:pseudo, :team, :car, :password, :email, :role)";

        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        $pdoStatement->bindValue(':team', $this->team, PDO::PARAM_STR);
        $pdoStatement->bindValue(':car', $this->car, PDO::PARAM_STR);
        $pdoStatement->bindValue(':password', $this->password, PDO::PARAM_STR);
        $pdoStatement->bindValue(':email', $this->email, PDO::PARAM_STR);
        $pdoStatement->bindValue(':role', $this->role, PDO::PARAM_STR);

        $pdoStatement->execute();

        if (1 === $pdoStatement->rowCount()) {

            return true;
        }

        return false;
    }

    public function update() 
    {
        $pdo = Database::getPDO();

        $sql = "UPDATE `app_user`
                    SET
                        pseudo = :pseudo,
                        team = :team,
                        car = :car,
                        `password` = :password,
                        email =:email,
                        `role` = :role";

        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        $pdoStatement->bindValue(':team', $this->team, PDO::PARAM_STR);
        $pdoStatement->bindValue(':car', $this->car, PDO::PARAM_STR);
        $pdoStatement->bindValue(':password', $this->password, PDO::PARAM_STR);
        $pdoStatement->bindValue(':email', $this->email, PDO::PARAM_STR);
        $pdoStatement->bindValue(':role', $this->role, PDO::PARAM_STR);

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
     * Get the value of pseudo
     */ 
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set the value of pseudo
     *
     * @return  self
     */ 
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get the value of team
     */ 
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * Set the value of team
     *
     * @return  self
     */ 
    public function setTeam($team)
    {
        $this->team = $team;

        return $this;
    }

    /**
     * Get the value of car
     */ 
    public function getCar()
    {
        return $this->car;
    }

    /**
     * Set the value of car
     *
     * @return  self
     */ 
    public function setCar($car)
    {
        $this->car = $car;

        return $this;
    }

    /**
     * Get the value of points
     */ 
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * Set the value of points
     *
     * @return  self
     */ 
    public function setPoints($points)
    {
        $this->points = $points;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */ 
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }
}