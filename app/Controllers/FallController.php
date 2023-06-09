<?php

namespace App\Controllers;

use App\Models\SpringSeason;
use App\Models\FallSeason;

class FallController extends CoreController {

    public function create($id = null) {
        global $router;
        //je check si en mode create ou update
        // $id est envoyé en paramètre de la méthode par altoDispatcher
        $updating = isset($id);

        $id = filter_input(INPUT_POST, 'race', FILTER_VALIDATE_INT);
        $flag = filter_input(INPUT_POST, 'flag', FILTER_SANITIZE_STRING);
        $country = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_STRING);
        $track = filter_input(INPUT_POST, 'track', FILTER_SANITIZE_STRING);
        $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
        // servira a controler et a afficher les erreurs dans la page admin.tpl.php
        $errorList = [];

        if (false === $id) {
            $errorList[] = "Le numéro de course n'est pas valide";
        }
        if (empty($flag)) {
            $errorList[] = "L'Url de l'image du drapeau n'est pas valide";
        }
        if (empty($country)) {
            $errorList[] = "Le pays n'est pas valide";
        }
        if (empty($track)) {
            $errorList[] = "Le circuit n'est pas valide";
        }
        if (empty($country)) {
            $errorList[] = "La date n'est pas valide";
        }

        if ($updating) {
            
            $event = FallSeason::find($id);

        } else {
            $event = new FallSeason();
        }

        if (empty($errorList)) {
            // je met à jour les propriétés
            // $id = filter_input(INPUT_POST, 'race', FILTER_VALIDATE_INT);

            $event->setId($id);
            $event->setFlag($flag);
            $event->setCountry($country);
            $event->setTrack($track);
            $event->setDate($date);

            if ($updating) {

                if ($event->update()) {

                    header('Location: ' . $router->generate('admin-fall'));
                }
            } else {
                
                if ($event->insert()) {
            
                    header('Location: ' . $router->generate('admin-fall'));
                    exit;
            
                } else {
            
                    $errorList[] = 'La sauvegarde n\'a pas fonctionné';
                }
            }

        } else {

            $event->setFlag(filter_input(INPUT_POST, 'flag'));
            $event->setCountry(filter_input(INPUT_POST, 'country'));
            $event->setTrack(filter_input(INPUT_POST, 'track'));
            $event->setDate(filter_input(INPUT_POST, 'date'));

            $springSeason = SpringSeason::findAll();
            $fallSeason = FallSeason::findAll();

            $this->show('calendar/fall', [
                // $eventToUpdate dans la template correspond a la propriété value de mes input (pré-remplissage)
                'eventToAdd' => $event,
                'fall' => $fallSeason,
                'errorList' => $errorList
            ]
            );
        }
    }


    public function edit($id) {
        // dump($id);
        $fallSeason = FallSeason::findAll();
        $springSeason = SpringSeason::findAll();

        $eventToUpdate = FallSeason::find($id);

        $this->show('calendar/fall', [
            'fall' => $fallSeason,
            'spring' => $springSeason,
            'eventToUpdate' => $eventToUpdate
        ]);

        return $eventToUpdate->id();
    }

    public function remove($id){

        global $router;

        $event = FallSeason::find($id);

        if ($event->delete()) {

            header("Location: " . $router->generate("admin-fall"));
            exit;
        } else {
            $errorList[] = 'La suppression a échoué';
        }
    }
}