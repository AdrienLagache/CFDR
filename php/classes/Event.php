<?php
class Event {
  private $flag;
  private $race;
  private $country;
  private $track;
  private $date;

  public function __construct($flag, $race, $country, $track, $date) {
    $this->flag = $flag;
    $this->race = $race;
    $this->country = $country;
    $this->track = $track;
    $this->date = $date;
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
}