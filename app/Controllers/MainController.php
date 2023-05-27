<?php


class MainController {
    public function show($viewName, $viewDatas = []) {
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
        // require_once __DIR__ . "/../Utils/Database.php";
        if (!empty($_POST)) {
            $flag = isset($_POST['flag']) ? $_POST['flag'] : '';
            $race = isset($_POST['race']) ? intval($_POST['race']) : '';
            $country = isset($_POST['country']) ? $_POST['country'] : '';
            $track = isset($_POST['track']) ? $_POST['track'] : '';
            $date = isset($_POST['date']) ? $_POST['date'] : '';

            $newFall = new FallSeason;
            $addEvent = $newFall->addEvent($flag, $race, $country, $track, $date);
        }

        if (isset($_GET['request'])) {
            $newDelete = new FallSeason;
            $newDelete->delete();
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