<?php

namespace App\Controllers;

use App\Models\SpringSeason;
use App\Models\FallSeason;

class CalendarController extends CoreController {

    public function create() {
        global $router;

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

        $event = new FallSeason();

        if (empty($errorList)) {
            
            $event->setId($id);
            $event->setFlag($flag);
            $event->setCountry($country);
            $event->setTrack($track);
            $event->setDate($date);

            if ($event->insert()) {

                header('Location: ' . $router->generate('main-admin'));
                exit;

            } else {

                $errorList[] = 'La sauvegarde n\'a pas fonctionné';
            }

        } else {

            $event->setFlag(filter_input(INPUT_POST, 'flag'));
            $event->setCountry(filter_input(INPUT_POST, 'country'));
            $event->setTrack(filter_input(INPUT_POST, 'track'));
            $event->setDate(filter_input(INPUT_POST, 'date'));

            $springSeason = SpringSeason::findAll();
            $fallSeason = FallSeason::findAll();

            $this->show('admin', [
                // $eventToAdd dans la template correspond a la propriété value de mes input (pré-remplissage)
                'eventToAdd' => $event,
                'fall' => $fallSeason,
                'spring' => $springSeason,
                'errorList' => $errorList
            ]
            );
        }

        // $id = isset($_POST['race']) ? intval($_POST['race']) : '';
        // $flag = isset($_POST['flag']) ? $_POST['flag'] : '';
        // $country = isset($_POST['country']) ? $_POST['country'] : '';
        // $track = isset($_POST['track']) ? $_POST['track'] : '';
        // $date = isset($_POST['date']) ? $_POST['date'] : '';

        // $newEvent = new FallSeason();
        // $newEvent->insert($id, $flag, $country, $track , $date);

        // $springSeason = SpringSeason::findAll();
        // $fallSeason = FallSeason::findAll();

        // $this->show('calendrier', [
        //     'spring' => $springSeason,
        //     'fall' => $fallSeason
        // ]);
    }

    public function remove() {
                
        $newFallSeason = new FallSeason();
        $newFallSeason->delete();
    }

    public function edit($id) {
        // dump($id);
        $fallSeason = FallSeason::findAll();
        $springSeason = SpringSeason::findAll();        
        $eventToAdd = SpringSeason::find($id);

        $this->show('admin', [
            'fall' => $fallSeason,
            'spring' => $springSeason,
            'eventToAdd' => $eventToAdd
        ]);
    }
}