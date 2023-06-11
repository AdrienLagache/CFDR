<?php
namespace App\Controllers;

use App\Models\Appuser;

class AppUserController extends CoreController {

    public function connect() {
        global $router;

        $this->show('appuser/connect');
    }
}