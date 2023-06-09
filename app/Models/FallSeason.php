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
  
    public static function findAll() {
        $sql = 'SELECT * FROM fall_season';

        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);

        $springCalendar = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'App\\Models\\FallSeason');

        return $springCalendar;
    }

    public static function find($id) {
        $sql = 'SELECT * FROM fall_season WHERE id =' . $id;

        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);

        $fallEvent = $pdoStatement->fetchObject('App\\Models\\FallSeason');

        return $fallEvent;
    }

    public function insert ($id, $flag, $country, $track , $date) {
        global $router;

        if ($id === '' || $flag === '' || $country === '' || $track === '' || $date === '') {
            // header('Location: ./admin');
            dump(array($id, $flag, $country, $track, $date));
            exit("une info n'a pas été correctement remplie");
          }
      
          $insertEvent = "INSERT INTO fall_season (id, flag, country, track, date)
              VALUES ({$id}, '{$flag}', '{$country}', '{$track}', '{$date}')";
  
          $pdo = Database::getPDO();
          $addedLine = $pdo->exec($insertEvent);
      
          if ($addedLine === 1) {
              
            header('Location: ' . $router->generate('main-admin'));

          } else {
            
              exit('Erreur insertion nouvel événement');
          }
    }

    public function delete() {
        global $router;

        switch ($_POST['remove']) {

            case 'allFallDelete': // je supprime toutes les courses du calendrier fall

                $sqlDeleteAll = 'DELETE FROM fall_season';
                $sqlResetInc = 'ALTER TABLE fall_season AUTO_INCREMENT=1'; // je remet l'auto-increment à sa valeur d'origine
            
                $pdo = Database::getPDO();
                $deletedLines = $pdo->exec($sqlDeleteAll);
                $resetIncResult = $pdo->exec($sqlResetInc);
    
                if ($deletedLines >= 1 && $resetIncResult === 0) {

                    header('Location: '.$router->generate('main-calendar'));

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

                    header('Location: '.$router->generate('main-admin'));

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