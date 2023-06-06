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
  
    public function findAll() {
        $sql = 'SELECT * FROM spring_season';

        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);

        $springCalendar = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'App\\Models\\SpringSeason');

        return $springCalendar;
    }

    public function find($id) {
        $sql = 'SELECT * FROM spring_season WHERE id =' . $id;

        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);

        $springEvent = $pdoStatement->fetchObject('App\\Models\\SpringSeason');

        return $springEvent;
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
  
    public function setFlag($newFlag) {
      $this->flag = $newFlag;
    }
  
    // public function setId($newRace) {
    //   $this->id = $newRace;
    // }
  
    public function setCountry($newCountry) {
      $this->country = $newCountry;
    }
  
    public function setTrack($newtrack) {
      $this->track = $newtrack;
    }
  
  }