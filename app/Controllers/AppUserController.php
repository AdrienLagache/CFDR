<?php
namespace App\Controllers;

use App\Models\AppUser;
use App\Models\Team;

class AppUserController extends CoreController {

    public function generate()
    {
        $users = AppUser::findAll();

        $this->show('appuser/generate', [
            'users' => $users
        ]);
    }

    public function lineUp()
    {
        AppUser::resetAvailabilities();

        $selectedUsers = $_POST['selectedUsers'];

        foreach ($selectedUsers as $userId) {
            AppUser::updateAvailability($userId);
        } 

        $users = AppUser::findAll();

        $this->show('appuser/generate', [
            'users' => $users
        ]);
    }

    public function login() 
    {
        $appUser = new AppUser;
        
        $this->show('appuser/connect', [
            'appUser' => $appUser
        ]);
    }

    public function logout()
    {
        unset($_SESSION['userId']);
        unset($_SESSION['userObject']);
        header('Location: ' . $this->router->generate('appuser-login'));
        exit;
    }

    public function validate() 
    {
        $pseudo = filter_input(INPUT_POST, 'pseudo');
        $password = filter_input(INPUT_POST, 'password');

        $errorList = [];

        $appUser = AppUser::findByPseudo($pseudo);

        if (!$appUser) {
            $errorList[] = 'Identifiant invalide';
        } else {
            // if ($appUser->getPassword() != $password) {
            if (!password_verify($password, $appUser->getPassword())) {
                $errorList[] = 'Mot de passe erroné';
            }
        }

        if (empty($errorList)) {
            $_SESSION['userId']     =   $appUser->getId();
            $_SESSION['userObject'] =   $appUser;

            header('Location: ' . $this->router->generate('main-home'));
            exit;
        }

        // on arrive ici si on n'as pas pu valider le couple email/password
        $appUser = new AppUser();
        $appUser->setPseudo(filter_input(INPUT_POST, 'pseudo'));
        $appUser->setPassword(filter_input(INPUT_POST, 'password'));
        $this->show("appuser/connect", [
            'appUser' => $appUser,
            'errorList' => $errorList
        ]);
    }

    public function list() 
    {
        $users = AppUSer::findAllByPoints();
        $teams = Team::findAll();

        $this->show('appuser/list', [
            'users' => $users,
            'teams' => $teams
        ]);
    }

    public function add() 
    {
        $user = new AppUser();
        $teams = Team::findAll();

        $this->show('appuser/add', [
            'user' => $user,
            'teams' => $teams
        ]);
    }

    public function edit($id) 
    {
        $user = AppUser::find($id);
        $teams = Team::findAll();

        $this->show('appuser/add', [
            'user' => $user,
            'teams' => $teams
        ]);
    }

    public function create($id = null) 
    {
        $updating = isset($id);

        $pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_STRING);
        $team = filter_input(INPUT_POST, 'team', FILTER_VALIDATE_INT);
        $car = filter_input(INPUT_POST, 'car', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $role = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_STRING);
        $points = filter_input(INPUT_POST, 'points', FILTER_VALIDATE_INT);
        
        $password = $role === 'pilote' ? 'password' : $password;

        $errorList = [];

        if (empty($pseudo)) {
            $errorList[] = "Le pseudo n'est pas valide";
        }
        if (false === $team) {
            $errorList[] = "Le nom de la team n'est pas valide";
        }
        if (empty($car)) {
            $errorList[] = "Le nom du véhicule n'est pas valide";
        }
        if (empty($password) && (false === $updating)) {
            $errorList[] = "Le mot de passe n'est pas valide";         
        }
        // if (false === $email) {
        //     $errorList[] = "L'email n'est pas valide";
        // }
        if (empty($role)) {
            $errorList[] = "Le role n'est pas valide";
        }
        if (false === $points && $updating) {
            $errorList[] = "Les points ne sont pas valides";
        }

        // if (strlen($password) < 8) {
        //     $errorList[] = "Votre mot de passe doit contenir au moins 8 characteres";
        // }

        // if (!preg_match('/[a-z]/', $password)) {
        //     $errorList[] = "Votre mot de passe doit contenir au moins 1 minuscule";
        // }

        // if (!preg_match('/[A-Z]/', $password)) {
        //     $errorList[] = "Votre mot de passe doit contenir au moins 1 majuscule";
        // }

        // if (!preg_match('/[0-9]/', $password)) {
        //     $errorList[] = "Votre mot de passe doit contenir au moins 1 chiffre";
        // }

        // if (!preg_match('/[_\-|%&*=@$]/', $password)) {
        //     $errorList[] = "Votre mot de passe doit contenir au moins 1 caractère spécial (_\-|%&*=@$)";
        // }

        if ($updating === true) {
            $user = AppUser::find($id);

        } else {

            $user = new AppUser();
        }

        if (empty($errorList)) {

            $user->setPseudo($pseudo);
            $user->setTeamId($team);
            $user->setCar($car);
            // je ne renseigne le mot de passe que lorsque je crée un utilisateur
            if (false === $updating) {
                $user->setPassword($password);
            }
            $user->setEmail($email);
            $user->setRole($role);
            // je ne change les points que lorsque je met à jour un utilisateur
            if ($updating) {
                $user->setPoints($user->getPoints() + $points);
            }

            if ($updating) {

                if ($user->update()) {
                    header("Location: " . $this->router->generate('appuser-list'));
                    exit;

                } else {
                    $errorList[] = 'La sauvegarde a échoué';
                }

            } else {

                if ($user->insert()) {
                    header("Location: " . $this->router->generate('appuser-list'));
                    exit;

                } else {
                    $errorList[] = 'La sauvegarde a échoué';
                }
            }
        }

        if (!empty($errorList)) {

            if ($updating === true) {
                $user = AppUser::find($id);

            } else {
                $user = new AppUser;
            }

            $user->setPseudo(filter_input(INPUT_POST, 'pseudo'));
            $user->setTeamId(filter_input(INPUT_POST, 'team'));
            $user->setCar(filter_input(INPUT_POST, 'car'));
            $user->setPassword(filter_input(INPUT_POST, 'password'));
            $user->setEmail(filter_input(INPUT_POST, 'email'));
            $user->setRole(filter_input(INPUT_POST, 'role'));

            $teams = Team::findAll();

            $this->show('appuser/add', [
                'user' => $user,
                'teams' => $teams,
                'errorList' => $errorList
            ]);
        }
    }

    // suppression utilisateur
    public function remove($id)
    {
        $user = AppUser::find($id);

        // on appelle la méthode "delete" qui modifie en base de donnée et renvoie
        // un booléen

        if ($user->delete()) {
            // La suppression a fonctionné
            // Le header ne peut être apellé que si aucun affichage n'est fait (attention au dump())
            header("Location: " . $this->router->generate("appuser-list"));
            // toujours exit après une redirection pour éviter de charger le reste de la page
            exit;
        } else {
            $errorList[] = 'La suppression a échoué';
        }
    }
}