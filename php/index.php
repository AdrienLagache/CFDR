<?php
require __DIR__."/inc/pdo.php";
require __DIR__."/classes/Event.php";


$sqlSpringSeason = 'SELECT * FROM spring_season';
$pdoStatement = $pdo->query($sqlSpringSeason);

if ($pdoStatement === false) {
    exit ("Problème lors de l'exécution de la requête");
}

$fetchEventResults = $pdoStatement->fetchAll();

foreach ($fetchEventResults as $eventArr) {
    $springSeason[$eventArr['id']] = new Event(
        $eventArr['flag'],
        $eventArr['id'],
        $eventArr['country'],
        $eventArr['track'],
        $eventArr['date'],
    );
}

// TODO : $sqlFallSeason = 'INSERT INTO ...'
// mettre en place un formulaire pour remplir le calendrier de la saison fall

require __DIR__."/templates/header.tpl.php";
require __DIR__."/templates/calendrier-spring.tpl.php";
require __DIR__."/templates/calendrier-fall.tpl.php";
require __DIR__."/templates/footer.tpl.php";
?>