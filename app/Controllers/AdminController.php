<?php

namespace App\Controllers;

use App\Models\SpringSeason;
use App\Models\FallSeason;

class AdminController extends MainController {

    public function admin() {   

        // if (isset($_POST['request'])) {
        //     $flag = isset($_POST['flag']) ? $_POST['flag'] : '';
        //     $race = isset($_POST['race']) ? intval($_POST['race']) : '';
        //     $country = isset($_POST['country']) ? $_POST['country'] : '';
        //     $track = isset($_POST['track']) ? $_POST['track'] : '';
        //     $date = isset($_POST['date']) ? $_POST['date'] : '';

        //     $newFall = new FallSeason;
        //     $newFall->calendar($flag, $race, $country, $track, $date);
        // }

        $this->show('admin');
    }

    public function create() {

        $flag = isset($_POST['flag']) ? $_POST['flag'] : '';
        $race = isset($_POST['race']) ? intval($_POST['race']) : '';
        $country = isset($_POST['country']) ? $_POST['country'] : '';
        $track = isset($_POST['track']) ? $_POST['track'] : '';
        $date = isset($_POST['date']) ? $_POST['date'] : '';
        dump($_POST);
        dump($flag);

    }
}