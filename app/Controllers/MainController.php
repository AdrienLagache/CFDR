<?php

class MainController {
    public function show($viewName, $viewDatas = []) {
        require __DIR__."/../views/header.tpl.php";
        require __DIR__."/../views/".$viewName.".tpl.php";
        require __DIR__."/../views/footer.tpl.php";

    }

    public function home() {
        // require __DIR__."/../TEMPORARY/calendrierFunction.php";
        $calendarDatas = [
            'spring' => $springSeason,
            'fall' => $fallSeason
        ];

        $this->show('calendrier', $calendarDatas);
    }

    public function admin() {        
        require __DIR__."/../TEMPORARY/adminFunctions.php";

        $this->show('admin');
    }

    public function calendrier() {
        require __DIR__."/../TEMPORARY/calendrierFunction.php";
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