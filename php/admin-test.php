<?php

if (!empty($_POST)) {
    $flag = isset($_POST['flag']) ? $_POST['flag'] : '';
    $race = isset($_POST['race']) ? intval($_POST['race']) : '';
    $country = isset($_POST['country']) ? $_POST['country'] : '';
    $track = isset($_POST['track']) ? $_POST['track'] : '';
    $date = isset($_POST['date']) ? $_POST['date'] : '';

    if (empty($flag) ||empty($race) || empty($country) || empty($track) || empty($date)) {
        header('Location: ./index.php?page=admin');
        echo "une info n'a pas été correctement remplie";
        exit();
    }

    $insertEvent = "INSERT INTO fall_season (id, flag, country, track, date)
        VALUES ({$race}, '{$flag}', '{$country}', '{$track}', '{$date}')";

    $modifiedLine = $pdo->exec($insertEvent);

    if ($modifiedLine === 1) {
        header('Location: ./index.php');
        exit();
    } else {
        exit('Erreur insertion nouvel événement');
    }
}

if (isset($_GET['request'])) {
    var_dump('on est dans le if');
    switch ($_GET['request']) {
        case 'delete-all':
            echo PHP_EOL.'on supprime tout !? :)'.PHP_EOL;
            break;
    }
}