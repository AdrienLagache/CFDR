<?php
namespace App\Models;

use \PDO;
use App\Utils\Database;

class SpringSeason {
    private $flag;
    private $id;
    private $country;
    private $track;
    private $date;
  
    public static function findAll() {
        $sql = 'SELECT * FROM spring_season';

        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);

        $springCalendar = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'App\\Models\\SpringSeason');

        return $springCalendar;
    }

    public static function find($id) {
        $sql = 'SELECT * FROM spring_season WHERE id =' . $id;

        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);

        $springEvent = $pdoStatement->fetchObject('App\\Models\\SpringSeason');

        return $springEvent;
    }

    public function insert() {
        
      $pdo = Database::getPDO();
  
      $sql = "INSERT INTO `spring_season` (id, flag, country, track, date)
              VALUES (:id, :flag, :country, :track, :date)";

      $pdoStatement = $pdo->prepare($sql);

      $pdoStatement->bindValue(':id', $this->id, PDO::PARAM_INT);
      $pdoStatement->bindValue(':flag', $this->flag, PDO::PARAM_STR);
      $pdoStatement->bindValue(':country', $this->country, PDO::PARAM_STR);
      $pdoStatement->bindValue(':track', $this->track, PDO::PARAM_STR);
      $pdoStatement->bindValue(':date', $this->date, PDO::PARAM_STR);

      $pdoStatement->execute();
  
      if (1 === $pdoStatement->rowCount()) {
          // recuperation de l'id auto-incrémenté
          $this->id = $pdo->lastInsertId();

          return true;
  
      } else {
  
          return false;
      }
  }

    public function update() {
        
      $pdo = Database::getPDO();
  
      $sql = "UPDATE `spring_season`
                  SET
                      `id` = :id, 
                      `flag` = :flag,
                      `country` = :country,
                      `track` = :track,
                      `date` = :date
                  WHERE `id` = :id
              ";

      $pdoStatement = $pdo->prepare($sql);

      $pdoStatement->bindValue(':id', $this->id, PDO::PARAM_INT);
      $pdoStatement->bindValue(':flag', $this->flag, PDO::PARAM_STR);
      $pdoStatement->bindValue(':country', $this->country, PDO::PARAM_STR);
      $pdoStatement->bindValue(':track', $this->track, PDO::PARAM_STR);
      $pdoStatement->bindValue(':date', $this->date, PDO::PARAM_STR);

      $pdoStatement->execute();
  
      if (1 === $pdoStatement->rowCount()) {

          return true;
  
      } else {
  
          return false;
      }
  }

  public function delete() {

    $pdo = Database::getPDO();

    $sql = "DELETE FROM `spring_season` WHERE `id` = :id;";

    $pdoStatement = $pdo->prepare($sql);

    $pdoStatement->bindValue(":id", $this->id, PDO::PARAM_INT);

    $pdoStatement->execute();

    if (1 === $pdoStatement->rowCount()) {

        return true;
    }
    
    return false;
}
  
    public function flag() {
      return $this->flag;
    }
  
    public function id() {
      return $this->id;
    }
  
    public function country() {
      return $this->country;
    }
  
    public function track() {
      return $this->track;
    }
  
    public function date() {
      return $this->date;
    }

    public function setId($newId) {
      $this->id = $newId;
    }
  
    public function setFlag($newFlag) {
      $this->flag = $newFlag;
    }
  
    public function setCountry($newCountry) {
      $this->country = $newCountry;
    }
  
    public function setTrack($newtrack) {
      $this->track = $newtrack;
    }

    public function setDate($newDate) {
      $this->date = $newDate;
    }
  
  }