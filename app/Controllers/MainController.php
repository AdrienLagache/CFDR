<?php
namespace App\Controllers;

use App\Models\SpringSeason;
use App\Models\FallSeason;
use App\Models\AppUser;

class MainController extends CoreController {

    public function home()
    {
        $springSeason = SpringSeason::findAll();

        $fallSeason = FallSeason::findAll();

        $calendarDatas = [
            'spring' => $springSeason,
            'fall' => $fallSeason
        ];

        $this->show('calendrier', $calendarDatas);
    }

    public function calendrier()
    {
        $springSeason = SpringSeason::findAll();

        $fallSeason = FallSeason::findAll();

        $calendarDatas = [
            'spring' => $springSeason,
            'fall' => $fallSeason
        ];

        $this->show('calendrier', $calendarDatas);
    }

    public function classement()
    {
        $pilotes = AppUser::findAllByPoints();
        $teamPoints = AppUser::getPointsByTeam();

        $this->show('classement', [
            'pilotes' => $pilotes,
            'teamPoints' => $teamPoints
        ]);
    }

    public function lineUp()
    {
        $this->show('line-up');
    }

    public function meteo()
    {
        $this->show('meteo');
    }

    public function live()
    {        
        $this->show('live');
    }

    public function fall()
    {
        $fallSeason = FallSeason::findAll();

        $this->show('calendar/fall', [
            'fall' => $fallSeason,
            // 'spring' => $springSeason,
            'eventToUpdate' => new FallSeason()
        ]);
    }

    public function spring()
    {
        $springSeason = SpringSeason::findAll();

        $this->show('calendar/spring', [
            'spring' => $springSeason,
            // 'spring' => $springSeason,
            'eventToUpdate' => new FallSeason()
        ]);
    }
}