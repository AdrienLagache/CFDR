<?php
require __DIR__."/inc/pdo.php";
require __DIR__."/classes/Event.php";
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
// redirection vers le formulaire admin
if (isset($_GET) && !empty($_GET)) {
    if( $_GET['page'] === 'admin' && count($_GET) === 1) { // cliquer sur 'se connecter' => 's'inscrire" pour revenir à index.php
        require __DIR__."/templates/header.tpl.php";
        require __DIR__."/admin-test.php";
        require __DIR__."/templates/admin-form.tpl.php";
        require __DIR__."/templates/footer.tpl.php";
    }

    // !! ADMIN-TEST !!! //
// ajout d'une course a l'aide du formulaire admin pour le calendrier Fall
} else if (!empty($_POST)) {
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

    $addedLine = $pdo->exec($insertEvent);

    if ($addedLine === 1) {
        header('Location: ./index.php');
        exit();
    } else {
        echo 'Erreur insertion nouvel événement';
        exit();
    }

    // !! NE PAS EFFACER !! //
// pas d'instruction particuliere, url = index.php
} else {
    require __DIR__."/templates/header.tpl.php";
    require __DIR__."/templates/calendrier-spring.tpl.php";
    //je vérifie qu'au moins une course à été renseigné pour la saison fall
    if (!empty($fetchFallResults)) {
        require __DIR__."/templates/calendrier-fall.tpl.php";
    }
    require __DIR__."/templates/footer.tpl.php";
}

    // !! TEST BOUTTONS DELETE-ALL ET DELETE-LAST !! //

if (isset($_GET['request'])) {
    // var_dump('on est dans le if');
    switch ($_GET['request']) {
    case 'delete-all': // je supprime toutes les courses du calendrier fall
        $sqlDeleteAll = 'DELETE FROM fall_season';
        $sqlResetInc = 'ALTER TABLE fall_season AUTO_INCREMENT=1'; // je remet l'auto-increment à sa valeur d'origine

        $deletedLines = $pdo->exec($sqlDeleteAll);
        $resetIncResult = $pdo->exec($sqlResetInc);

        if ($deletedLines > 1 && $resetIncResult === 0) {
            header('Location: ./index.php');
            exit();
        } else {
            echo 'Erreur lors de la suppression';
            exit();
        }        
        break;

    case 'delete-last': // je supprime la derniere course ajoutee dans le calendrier fall
        $sqlDeleteLast = 'DELETE FROM fall_season ORDER BY id DESC LIMIT 1';
        $sqlResetInc = 'ALTER TABLE fall_season AUTO_INCREMENT=1'; // je remet l'auto-increment à sa valeur d'origine

        $deletedLine = $pdo->exec($sqlDeleteLast);
        $resetIncResult = $pdo->exec($sqlResetInc);

        if ($deletedLine === 1 && $resetIncResult === 0) {
            header('Location: ./index.php');
            exit('la dernière course a bien été supprimée');
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

    // !! NE PAS EFFACER !! //
?>