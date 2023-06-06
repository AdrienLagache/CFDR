<?php
namespace App\Controllers;

use App\Models\SpringSeason;
use App\Models\FallSeason;

class MainController {
    public function show($viewName, $viewDatas = []) {
        $absoluteURL = isset($_SERVER['BASE_URI']) ? $_SERVER['BASE_URI'] : '';

        require __DIR__."/../views/header.tpl.php";
        require __DIR__."/../views/".$viewName.".tpl.php";
        require __DIR__."/../views/footer.tpl.php";
    }

    public function home() {

        $newSpring = new SpringSeason;
        $springSeason = $newSpring->findAll();

        $newFall = new FallSeason;
        $fallSeason = $newFall->findAll();

        $calendarDatas = [
            'spring' => $springSeason,
            'fall' => $fallSeason
        ];

        $this->show('calendrier', $calendarDatas);
    }

    public function admin() {   

        if (isset($_GET['request'])) {
            $flag = isset($_GET['flag']) ? $_GET['flag'] : '';
            $race = isset($_GET['race']) ? intval($_GET['race']) : '';
            $country = isset($_GET['country']) ? $_GET['country'] : '';
            $track = isset($_GET['track']) ? $_GET['track'] : '';
            $date = isset($_GET['date']) ? $_GET['date'] : '';

            $newFall = new FallSeason;
            $newFall->calendar($flag, $race, $country, $track, $date);
        }

        $this->show('admin');
    }

    public function calendrier() {

        $newSpring = new SpringSeason;
        $springSeason = $newSpring->findAll();

        $newFall = new FallSeason;
        $fallSeason = $newFall->findAll();

        $calendarDatas = [
            'spring' => $springSeason,
            'fall' => $fallSeason
        ];

        $this->show('calendrier', $calendarDatas);
    }

    public function meteo() {

        $this->show('meteo');
    }

    public function live() {
        
        $this->show('live');
    }
}