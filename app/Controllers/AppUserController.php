<?php
namespace App\Controllers;

use App\Models\AppUser;

class AppUserController extends CoreController {

    public function login() 
    {

        $this->show('appuser/connect');
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
        $email      = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password   = filter_input(INPUT_POST, 'password');

        $errorList = [];

        $appUser = AppUser::findByEmail($email);

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
        $appUser->setEmail(filter_input(INPUT_POST, 'email'));
        $appUser->setPassword(filter_input(INPUT_POST, 'password'));
        $this->show("appuser/connect", [
            'appUser' => $appUser,
            'errorList' => $errorList
        ]);
    }

    public function list() 
    {


        $users = AppUSer::findAll();

        $this->show('appuser/list', [
            'users' => $users
        ]);
    }

    public function add() 
    {


        $user = new AppUser();

        $this->show('appuser/add', [
            'user' => $user
        ]);
    }

    public function edit($id) 
    {
        $user = AppUser::find($id);

        $this->show('appuser/add', [
            'user' => $user
        ]);
    }

    public function create($id = null) 
    {
        $updating = isset($id);

        $pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_STRING);
        $team = filter_input(INPUT_POST, 'team', FILTER_SANITIZE_STRING);
        $car = filter_input(INPUT_POST, 'car', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $role = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_STRING);

        $errorList = [];

        if (empty($pseudo)) {
            $errorList[] = "Le pseudo n'est pas valide";
        }
        if (empty($team)) {
            $errorList[] = "Le nom de la team n'est pas valide";
        }
        if (empty($car)) {
            $errorList[] = "Le nom du véhicule n'est pas valide";
        }
        if (empty($password)) {
            $errorList[] = "Le mot de passe n'est pas valide";
        }
        if (false === $email) {
            $errorList[] = "L'email n'est pas valide";
        }
        if (empty($role)) {
            $errorList[] = "Le role n'est pas valide";
        }

        if (strlen($password) < 8) {
            $errorList[] = "Votre mot de passe doit contenir au moins 8 characteres";
        }

        if (!preg_match('/[a-z]/', $password)) {
            $errorList[] = "Votre mot de passe doit contenir au moins 1 minuscule";
        }

        if (!preg_match('/[A-Z]/', $password)) {
            $errorList[] = "Votre mot de passe doit contenir au moins 1 majuscule";
        }

        if (!preg_match('/[0-9]/', $password)) {
            $errorList[] = "Votre mot de passe doit contenir au moins 1 chiffre";
        }

        if (!preg_match('/[_\-|%&*=@$]/', $password)) {
            $errorList[] = "Votre mot de passe doit contenir au moins 1 caractère spécial (_\-|%&*=@$)";
        }

        if ($updating === true) {
            $user = AppUser::find($id);

        } else {

            $user = new AppUser();
        }

        if (empty($errorList)) {

            $user->setPseudo($pseudo);
            $user->setTeam($team);
            $user->setCar($car);
            $user->setPassword($password);
            $user->setEmail($email);
            $user->setRole($role);

            if ($updating) {

                if ($user->update()) {

                    header("Location: " . $this->router->generate('appuser-list'));
                    exit;

                } else {
                    $errorList[] = 'La sauvegarde a échoué';
                }

            } else {

                if ($user->insert()) {

                    header('Location: ' . $this->router->generate('appuser-list'));
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
            $user->setTeam(filter_input(INPUT_POST, 'team'));
            $user->setCar(filter_input(INPUT_POST, 'car'));
            $user->setPassword(filter_input(INPUT_POST, 'password'));
            $user->setEmail(filter_input(INPUT_POST, 'email'));
            $user->setRole(filter_input(INPUT_POST, 'role'));

            $this->show('appuser/add', [
                'user' => $user,
                'errorList' => $errorList
            ]);
        }
    }
}