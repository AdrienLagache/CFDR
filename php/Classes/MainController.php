<?php

class MainController {
    public function show($viewName, $viewDatas = []) {
        require __DIR__."/../templates/header.tpl.php";
        require __DIR__."/../templates/".$viewName.".tpl.php";
        require __DIR__."/../templates/footer.tpl.php";

    }

    public function admin() {
        require __DIR__."/../inc/pdo.php";

        if (!empty($_POST)) {
            $flag = isset($_POST['flag']) ? $_POST['flag'] : '';
            $race = isset($_POST['race']) ? intval($_POST['race']) : '';
            $country = isset($_POST['country']) ? $_POST['country'] : '';
            $track = isset($_POST['track']) ? $_POST['track'] : '';
            $date = isset($_POST['date']) ? $_POST['date'] : '';
        
            if ($flag === '' || $race === '' || $country === '' || $track === '' || $date === '') {
                header('Location: ./admin');
                exit("une info n'a pas été correctement remplie");
            }
        
            $insertEvent = "INSERT INTO fall_season (id, flag, country, track, date)
                VALUES ({$race}, '{$flag}', '{$country}', '{$track}', '{$date}')";
        
            $addedLine = $pdo->exec($insertEvent);
        
            if ($addedLine === 1) {
                header('Location: ./');
                exit();
            } else {
                echo 'Erreur insertion nouvel événement';
                exit();
            }
        }

        if (isset($_GET['request'])) {
            // var_dump('on est dans le if');
            switch ($_GET['request']) {
            case 'allFallDelete': // je supprime toutes les courses du calendrier fall
                $sqlDeleteAll = 'DELETE FROM fall_season';
                $sqlResetInc = 'ALTER TABLE fall_season AUTO_INCREMENT=1'; // je remet l'auto-increment à sa valeur d'origine
        
                $deletedLines = $pdo->exec($sqlDeleteAll);
                $resetIncResult = $pdo->exec($sqlResetInc);
        
                if ($deletedLines >= 1 && $resetIncResult === 0) {
                    header('Location: ./');
                    exit();
                } else {
                    echo 'Erreur lors de la suppression';
                    exit();
                }        
                break;
        
            case 'lastFallDelete':
                // je supprime la derniere course ajoutee dans le calendrier fall
                $sqlDeleteLast = 'DELETE FROM fall_season ORDER BY id DESC LIMIT 1';
        
                $deletedLine = $pdo->exec($sqlDeleteLast);
        
                if ($deletedLine === 1) {
                    header('Location: ./');
                    exit();
                } else {
                    echo 'Erreur lors de la suppression';
                    exit();
                }
        
                break;
            default:
                echo "Problème dans l'URL";
                break;
            }
        }

        $this->show('admin');
    }

    public function calendrier() {
        require __DIR__."/../inc/pdo.php";
        // requete permettant de récupérer les données du calendrier Spring dans la table spring_season
        $sqlSpringSeason = 'SELECT * FROM spring_season';
        $pdoSpringResult = $pdo->query($sqlSpringSeason);
        
        if ($pdoSpringResult === false) {
            exit ("Problème lors de l'exécution de la requête");
        }
        
        $fetchSpringResults = $pdoSpringResult->fetchAll();
        // création du tableau $springSeason utilisé dans la template calendrier-sring.tpl.php
        foreach ($fetchSpringResults as $springArr) {
            $springSeason[$springArr['id']] = new Event(
                $springArr['flag'],
                $springArr['id'],
                $springArr['country'],
                $springArr['track'],
                $springArr['date'],
            );
        }
        // requete permettant de récupérer les données du calendrier Fall dans la table fall_season
        $sqlFallSeason = 'SELECT * FROM fall_season';
        $pdoFallResult = $pdo->query($sqlFallSeason);

        if ($pdoFallResult === false) {
            exit ("Problème lors de l'exécution de la requête");
        }
        
        $fetchFallResults = $pdoFallResult->fetchAll();
        // création du tableau $fallSeason utilisé dans la template calendrier-fall.tpl.php
        foreach ($fetchFallResults as $fallArr) {
            $fallSeason[$fallArr['id']] = new Event(
                $fallArr['flag'],
                $fallArr['id'],
                $fallArr['country'],
                $fallArr['track'],
                $fallArr['date'],
            );
        }

        $fallSeason = !empty($fetchFallResults) ? $fallSeason : '';

      

        $calendarDatas = [
            'spring' => $springSeason,
            'fall' => $fallSeason
        ];

        $this->show('calendrier', $calendarDatas);
    }

    public function meteo() {
        $this->show('meteo');
    }
}