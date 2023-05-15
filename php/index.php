<?php
require __DIR__."/inc/pdo.php";
require __DIR__."/classes/Event.php";


$sqlEvent = 'SELECT * FROM event';
$pdoStatement = $pdo->query($sqlEvent);

if ($pdoStatement === false) {
    exit ("Problème lors de l'exécution de la requête");
}

$fetchEventResults = $pdoStatement->fetchAll();

foreach ($fetchEventResults as $eventArr) {
    $dataEventList[$eventArr['id']] = new Event(
        $eventArr['flag'],
        $eventArr['id'],
        $eventArr['country'],
        $eventArr['track'],
        $eventArr['date'],
    );
}    

require __DIR__."/templates/header.tpl.php";
require __DIR__."/templates/calendrier.tpl.php";
require __DIR__."/templates/footer.tpl.php";
?>