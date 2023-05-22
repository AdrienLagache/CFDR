<?php

class MainController {
    public function show($viewName, $viewDatas = []) {
        require __DIR__."/../templates/header.tpl.php";
        require __DIR__."/../templates/".$viewName.".tpl.php";
        require __DIR__."/../templates/footer.tpl.php";

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