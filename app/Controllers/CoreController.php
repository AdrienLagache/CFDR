<?php
namespace App\Controllers;

class CoreController {

    public function show($viewName, $viewDatas = []) {
        global $router;

        // dump(get_defined_vars());

        extract($viewDatas);

        require __DIR__."/../views/header.tpl.php";
        require __DIR__."/../views/".$viewName.".tpl.php";
        require __DIR__."/../views/footer.tpl.php";
    }


    /**
     * Méthode qui permet de vérifier les droits d'accès
     *
     * @param array $authorizedRole
     * @return void
     */
    // protected function checkAuthorization($authorizedRole = [])
    // {
    //     // l'utilisateur est il connecté
    //     if (array_key_exists("user", $_SESSION)) {
    //         $user = $_SESSION["user"];
    //         // on récupère son rôle
    //         $role = $user->getRole();

    //         // on vérifie que ce role fait partie des roles autorisés pour la page
    //         if (in_array($role, $authorizedRole)) {
    //             // tout est OK, on peut continuer
    //             return true;
    //         } else {
    //             // on est connecté, mais on n'a pas les droits sur la page
    //             // Erreur 403 Forbidden
    //             $this->show("error/err403");
    //             exit;
    //         }
    //     } else {
    //         // non : on le renvoie vers la page de connection
    //         header('Location: ' . $this->router->generate('appuser-connect'));
    //         exit;
    //     }
    // }
}