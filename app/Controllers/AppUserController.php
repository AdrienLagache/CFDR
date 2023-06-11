<?php
namespace App\Controllers;

use App\Models\AppUser;

class AppUserController extends CoreController {

    public function connect() {
        global $router;

        $this->show('appuser/connect');
    }

    public function list() {
        global $router;

        $users = AppUSer::findAll();

        $this->show('appuser/list', [
            'users' => $users
        ]);
    }
}