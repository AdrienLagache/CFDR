<?php
namespace App\Models;

use \PDO;
use App\Utils\Database;

class AppUser
{
    private $id;
    private $pseudo;
    private $team_id;
    private $car;
    private $points;
    private $password;
    private $email;
    private $role;
    private $team;
    private $manufacturer;

    public static function findAll()
    {

        $pdo = Database::getPDO();

        $sql = 'SELECT *
                    FROM app_user';

        $pdoStatement = $pdo->query($sql);

        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'App\\Models\\AppUser');

        return $results;
    }

    public static function findAllByPoints()
    {

        $pdo = Database::getPDO();

        $sql = 'SELECT app_user.*, teams.name team, teams.manufacturer manufacturer
                    FROM app_user
                    INNER JOIN teams ON app_user.team_id = teams.id
                    ORDER BY points DESC';

        $pdoStatement = $pdo->query($sql);

        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'App\\Models\\AppUser');

        return $results;
    }

    public static function find($id)
    {
        $pdo = Database::getPDO();

        $sql = 'SELECT app_user.*, teams.name team
                    FROM app_user
                    INNER JOIN teams ON app_user.team_id = teams.id
                    WHERE app_user.id = :id';

        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
        $pdoStatement->execute();

        $result = $pdoStatement->fetchObject('App\\Models\\AppUser');

        return $result;
    }

    public static function findByEmail($email)
    {
                $pdo = Database::getPDO();

                $sql = 'SELECT *
                            FROM app_user
                            WHERE email = :email';
        
                $pdoStatement = $pdo->prepare($sql);
                $pdoStatement->bindValue(":email", $email, PDO::PARAM_STR);
                $pdoStatement->execute();
        
                $result = $pdoStatement->fetchObject('App\Models\AppUser');
        
                return $result;
    }

    public static function getPointsByTeam()
    {
        $pdo = Database::getPDO();

        $sql = 'SELECT teams.name team, teams.manufacturer manufacturer, SUM(app_user.points) team_points
                    FROM app_user
                    INNER JOIN teams ON app_user.team_id = teams.id
                    GROUP BY teams.name
                    ORDER BY SUM(app_user.points) DESC';

        $pdoStatement = $pdo->query($sql);

        $teamPoints = [];

        while ($result = $pdoStatement->fetch()) {
            $team = $result['team'];
            $points = $result['team_points'];
            $manufacturer = $result['manufacturer'];

            $teamPoints[$team] = [$points, $manufacturer];
        }

        return $teamPoints;
    }

    public function insert() 
    {
        $pdo = Database::getPDO();

        $sql = "INSERT INTO `app_user` (pseudo, team_id, car, `password`, email, `role`)
                    VALUES (:pseudo, :team, :car, :password, :email, :role)";

        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        $pdoStatement->bindValue(':team', $this->team_id, PDO::PARAM_INT);
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
                        team_id = :team,
                        car = :car,
                        `password` = :password,
                        email =:email,
                        `role` = :role
                    WHERE id = :id";

        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        $pdoStatement->bindValue(':team', $this->team_id, PDO::PARAM_INT);
        $pdoStatement->bindValue(':car', $this->car, PDO::PARAM_STR);
        $pdoStatement->bindValue(':password', $this->password, PDO::PARAM_STR);
        $pdoStatement->bindValue(':email', $this->email, PDO::PARAM_STR);
        $pdoStatement->bindValue(':role', $this->role, PDO::PARAM_STR);
        $pdoStatement->bindValue(':id', $this->id, PDO::PARAM_INT);

        $pdoStatement->execute();

        if (1 === $pdoStatement->rowCount()) {

            return true;
        }

        return false;
    }

    public function delete()
    {
        // Récupération de l'objet PDO représentant la connexion à la DB
        $pdo = Database::getPDO();

        // Ecriture de la requête UPDATE en préparé
        $sql = "DELETE FROM `app_user` WHERE `id` = :id;";

        // on prépare la requête
        $pdoStatement = $pdo->prepare($sql);

        // liaison des paramètres fictifs
        $pdoStatement->bindValue(":id",         $this->id,          PDO::PARAM_INT);

        // Execution de la requête d'insertion 
        $pdoStatement->execute();

        // Si une ligne supprimée
        if (1 === $pdoStatement->rowCount()) {
            // On retourne VRAI car l'ajout a parfaitement fonctionné
            return true;
            // => l'interpréteur PHP sort de cette fonction car on a retourné une donnée
        }
        // Si on arrive ici, c'est que quelque chose n'a pas bien fonctionné => FAUX
        // d'où affichage du message d'erreur
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
    public function getTeamId()
    {
        return $this->team_id;
    }

    /**
     * Set the value of team
     *
     * @return  self
     */ 
    public function setTeamId($team)
    {
        $this->team_id = $team;

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

    /**
     * Get the value of teamName
     */ 
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * Set the value of teamName
     *
     * @return  self
     */ 
    public function setTeam($teamName)
    {
        $this->team = $teamName;

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