<?php

namespace App\Controllers;

use App\Models\SpringSeason;
use App\Models\FallSeason;

class AdminController extends MainController {

    public function admin() {   

        $fallSeason = FallSeason::findAll();
        $springSeason = SpringSeason::findAll();

        $this->show('admin', [
            'fall' => $fallSeason,
            'spring' => $springSeason,
            'eventToAdd' => new FallSeason()
        ]);
    }

    public function create() {

        $id = isset($_POST['race']) ? intval($_POST['race']) : '';
        $flag = isset($_POST['flag']) ? $_POST['flag'] : '';
        $country = isset($_POST['country']) ? $_POST['country'] : '';
        $track = isset($_POST['track']) ? $_POST['track'] : '';
        $date = isset($_POST['date']) ? $_POST['date'] : '';

        $newEvent = new FallSeason();
        $newEvent->insert($id, $flag, $country, $track , $date);

        $springSeason = SpringSeason::findAll();
        $fallSeason = FallSeason::findAll();

        $this->show('calendrier', [
            'spring' => $springSeason,
            'fall' => $fallSeason
        ]);
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