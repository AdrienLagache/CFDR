<?php
namespace App\Controllers;

class CoreController {

    public function show($viewName, $viewDatas = []) {
        global $router;

        dump(get_defined_vars());

        extract($viewDatas);

        require __DIR__."/../views/header.tpl.php";
        require __DIR__."/../views/".$viewName.".tpl.php";
        require __DIR__."/../views/footer.tpl.php";
    }
}