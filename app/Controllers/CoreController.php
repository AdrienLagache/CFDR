<?php
namespace App\Controllers;

class CoreController {

    protected $router;
    protected $match;

    public function __construct($router, $match) 
    {
        $this->router = $router;
        $this->match = $match;
        //ACL = access control list
        $acl = [
            'admin-spring' => ['admin'],
            'spring-create' => ['admin'],
            'spring-edit' => ['admin'],
            'spring-update' =>['admin'],
            'spring-remove' => ['admin'],
            'admin-fall' => ['admin'],
            'fall-create' => ['admin'],
            'fall-edit' => ['admin'],
            'fall-update' =>['admin'],
            'fall-remove' => ['admin'],
            'appuser-list' => ['admin'],
            'appuser-add' => ['admin'],
            'appuser-create' => ['admin'],
            'appuser-edit' => ['admin'],
            'appuser-update' => ['admin']
        ];

        // le nom de la route se trouve a l'index 'name' du tableau $match
        if ($match && array_key_exists($match['name'], $acl)) {
            $authorizedRole = $acl[$match['name']];
            $this->checkAuthorization($authorizedRole);
        }
    }

    public function show($viewName, $viewDatas = []) {

        $viewDatas['currentPage'] = $viewName;
        $viewDatas['router'] = $this->router;

        // dump(get_defined_vars());
        // dump($_SESSION);
        extract($viewDatas);

        require __DIR__."/../views/layout/header.tpl.php";
        require __DIR__."/../views/".$viewName.".tpl.php";
        require __DIR__."/../views/layout/footer.tpl.php";
    }


    /**
     * Méthode qui permet de vérifier les droits d'accès
     *
     * @param array $authorizedRole
     * @return void
     */
    protected function checkAuthorization($authorizedRole = [])
    {
        // l'utilisateur est il connecté
        if (array_key_exists("userObject", $_SESSION)) {
            $user = $_SESSION["userObject"];
            // on récupère son rôle
            $role = $user->getRole();

            // on vérifie que ce role fait partie des roles autorisés pour la page
            if (in_array($role, $authorizedRole)) {
                // tout est OK, on peut continuer
                return true;
            } else {
                // on est connecté, mais on n'a pas les droits sur la page
                // Erreur 403 Forbidden
                $this->show("error/err403");
                exit;
            }
        } else {

            header('Location: ' . $this->router->generate('appuser-login'));
            exit;
        }
    }
}