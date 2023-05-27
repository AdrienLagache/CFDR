<?php
require __DIR__."/../Utils/Database.php";

if (!empty($_POST)) {
    $flag = isset($_POST['flag']) ? $_POST['flag'] : '';
    $race = isset($_POST['race']) ? intval($_POST['race']) : '';
    $country = isset($_POST['country']) ? $_POST['country'] : '';
    $track = isset($_POST['track']) ? $_POST['track'] : '';
    $date = isset($_POST['date']) ? $_POST['date'] : '';

    if ($flag === '' || $country === '' || $track === '' || $date === '') {
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