<?php
require __DIR__."/inc/pdo.php";
require __DIR__."/classes/Event.php";

$sqlSpringSeason = 'SELECT * FROM spring_season';
$pdoSpringResult = $pdo->query($sqlSpringSeason);

if ($pdoSpringResult === false) {
    exit ("Problème lors de l'exécution de la requête");
}

$fetchSpringResults = $pdoSpringResult->fetchAll();

foreach ($fetchSpringResults as $springArr) {
    $springSeason[$springArr['id']] = new Event(
        $springArr['flag'],
        $springArr['id'],
        $springArr['country'],
        $springArr['track'],
        $springArr['date'],
    );
}

$sqlFallSeason = 'SELECT * FROM fall_season';
$pdoFallResult = $pdo->query($sqlFallSeason);

if ($pdoFallResult === false) {
    exit ("Problème lors de l'exécution de la requête");
}

$fetchFallResults = $pdoFallResult->fetchAll();

foreach ($fetchFallResults as $fallArr) {
    $fallSeason[$fallArr['id']] = new Event(
        $fallArr['flag'],
        $fallArr['id'],
        $fallArr['country'],
        $fallArr['track'],
        $fallArr['date'],
    );
}
// var_dump($fetchFallResults);

if (isset($_GET) && !empty($_GET)) {
    switch ($_GET['page']) {
        case 'admin': // cliquer sur 'se connecter' => 's'inscrire" pour revenir à index.php
            require __DIR__."/templates/header.tpl.php";
            require __DIR__."/templates/admin-form.tpl.php";
            require __DIR__."/admin-test.php";
            require __DIR__."/templates/footer.tpl.php";
            break;
        default:
            echo "Problème dans l'URL";
            break;
    }
} else {

    // !! CODE DÉPLACÉ DANS ADMIN-TEST.PHP !!! //

// } else if (!empty($_POST)) {
//     $flag = isset($_POST['flag']) ? $_POST['flag'] : '';
//     $race = isset($_POST['race']) ? intval($_POST['race']) : '';
//     $country = isset($_POST['country']) ? $_POST['country'] : '';
//     $track = isset($_POST['track']) ? $_POST['track'] : '';
//     $date = isset($_POST['date']) ? $_POST['date'] : '';

//     if (empty($flag) ||empty($race) || empty($country) || empty($track) || empty($date)) {
//         header('Location: ./index.php?page=admin');
//         echo "une info n'a pas été correctement remplie";
//         exit();
//     }

//     $insertEvent = "INSERT INTO fall_season (id, flag, country, track, date)
//         VALUES ({$race}, '{$flag}', '{$country}', '{$track}', '{$date}')";

//     $modifiedLine = $pdo->exec($insertEvent);

//     if ($modifiedLine === 1) {
//         header('Location: ./index.php');
//         exit();
//     } else {
//         exit('Erreur insertion nouvel événement');
//     }
// } else {

    // !! NE PAS EFFACER !! //


    require __DIR__."/templates/header.tpl.php";
    require __DIR__."/templates/calendrier-spring.tpl.php";
    if (!empty($fetchFallResults)) {
        require __DIR__."/templates/calendrier-fall.tpl.php";
    }
    require __DIR__."/templates/footer.tpl.php";
}       
?>