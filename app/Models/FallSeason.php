<?php

class FallSeason {
    private $flag;
    private $race;
    private $country;
    private $track;
    private $date;
  
    public function findAll() {
        $sql = 'SELECT * FROM fall_season';

        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);

        $springCalendar = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'FallSeason');

        return $springCalendar;
    }

    public function find($id) {
        $sql = 'SELECT * FROM fall_season WHERE id =' . $id;

        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);

        $springEvent = $pdoStatement->fetchObject('FallSeason');

        return $springEvent;
    }
  
    public function flag() {
      return $this->flag;
    }
  
    public function race() {
      return $this->race;
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
  
    public function setRace($newRace) {
      $this->race = $newRace;
    }
  
    public function setCountry($newCountry) {
      $this->country = $newCountry;
    }
  
    public function setTrack($newtrack) {
      $this->track = $newtrack;
    }
  
  }