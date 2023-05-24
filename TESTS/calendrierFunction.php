<?php
        require __DIR__."/../Utils/pdo.php";
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