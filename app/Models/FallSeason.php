<?php
namespace App\Models;

use \PDO;
use App\Utils\Database;

class FallSeason {
    private $id;
    private $flag;
    private $country;
    private $track;
    private $date;
  
    public function findAll() {
        $sql = 'SELECT * FROM fall_season';

        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);

        $springCalendar = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'App\\Models\\FallSeason');

        return $springCalendar;
    }

    public function find($id) {
        $sql = 'SELECT * FROM fall_season WHERE id =' . $id;

        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);

        $springEvent = $pdoStatement->fetchObject('App\\Models\\FallSeason');

        return $springEvent;
    }

    public function addEvent($flag, $id, $country, $track, $date) {
    
        
    }

    public function calendar($flag, $id, $country, $track , $date) {
        // dump($_GET);
        switch ($_GET['request']) {
            case 'addOne':
                if ($flag === '' || $country === '' || $track === '' || $date === '') {
                  // header('Location: ./admin');
                  exit("une info n'a pas été correctement remplie");
                }
            
                $insertEvent = "INSERT INTO fall_season (id, flag, country, track, date)
                    VALUES ({$id}, '{$flag}', '{$country}', '{$track}', '{$date}')";
        
                $pdo = Database::getPDO();
                $addedLine = $pdo->exec($insertEvent);
            
                if ($addedLine === 1) {
                    $reminder[$id] = $country.' le '.$date;
                    dump($reminder); // ce dump me permet temporairement de voir la derniere entree
                } else {
                    exit('Erreur insertion nouvel événement');
                }

                break;

            case 'allFallDelete': // je supprime toutes les courses du calendrier fall
                $sqlDeleteAll = 'DELETE FROM fall_season';
                $sqlResetInc = 'ALTER TABLE fall_season AUTO_INCREMENT=1'; // je remet l'auto-increment à sa valeur d'origine
            
                $pdo = Database::getPDO();
                $deletedLines = $pdo->exec($sqlDeleteAll);
                $resetIncResult = $pdo->exec($sqlResetInc);
    
                if ($deletedLines >= 1 && $resetIncResult === 0) {
                    dump("Le calendrier Fall a bien été supprimé");
                } else {
                    dump('Erreur lors de la suppression');
                    exit();
                }
       
                break;
    
            case 'lastFallDelete':
                // je supprime la derniere course ajoutee dans le calendrier fall
                $sqlDeleteLast = 'DELETE FROM fall_season ORDER BY id DESC LIMIT 1';
            
                $pdo = Database::getPDO();
                $deletedLine = $pdo->exec($sqlDeleteLast);
    
                if ($deletedLine === 1) {                
                    dump("Le dernier événement a bien été supprimé");
                } else {
                    dump('Erreur lors de la suppression');
                    exit();
                }
                
                break;
            default:
                echo "Problème dans l'URL";
                break;
        }
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
  
    public function setCountry($newCountry) {
      $this->country = $newCountry;
    }
  
    public function setTrack($newtrack) {
      $this->track = $newtrack;
    }
  
  }