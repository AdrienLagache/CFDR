<?php
namespace App\Controllers;

use App\Models\SpringSeason;
use App\Models\FallSeason;

class MainController {
    
    public function show($viewName, $viewDatas = []) {
        global $router;

        dump(get_defined_vars());

        extract($viewDatas);

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