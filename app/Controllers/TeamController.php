<?php
namespace App\Controllers;

use App\Models\Team;

class TeamController extends CoreController {

  public function add()
  {
    $team = new Team();

    $this->show('team/add', [
        'team' => $team
    ]);
  }

  public function edit($id) 
  {
      $team = Team::find($id);

      $this->show('team/add', [
          'team' => $team
      ]);
  }

  public function create($id = null) 
  {
      $updating = isset($id);

      $name = filter_input(INPUT_POST, 'team', FILTER_SANITIZE_STRING);
      $manufacturer = filter_input(INPUT_POST, 'manufacturer', FILTER_SANITIZE_STRING);

      $errorList = [];

      if (empty($name)) {
          $errorList[] = "Le nom de la team n'est pas remplit";
      }
      if (empty($manufacturer)) {
          $errorList[] = "Le nom du constructeur n'est pas remplit";
      }

      if ($updating === true) {
          $team = Team::find($id);

      } else {

          $team = new Team();
      }

      if (empty($errorList)) {

          $team->setName($name);
          $team->setManufacturer($manufacturer);

          if ($updating) {

              if ($team->update()) {

                  header("Location: " . $this->router->generate('appuser-list'));
                  exit;

              } else {
                  $errorList[] = 'La sauvegarde a échoué';
              }

          } else {

              if ($team->insert()) {

                  header('Location: ' . $this->router->generate('appuser-list'));
                  exit;

              } else {
                  $errorList[] = 'La sauvegarde a échoué';
              }
          }
      }

      if (!empty($errorList)) {

          if ($updating === true) {
              $user = Team::find($id);

          } else {
              $user = new Team;
          }

          $team->setName(filter_input(INPUT_POST, 'team'));
          $team->setManufacturer(filter_input(INPUT_POST, 'manufacturer'));

          $this->show('team/add', [
              'team' => $team,
              'errorList' => $errorList
          ]);
      }
  }

  public function remove($id)
  {
      $user = Team::find($id);

      if ($user->delete()) {

          header("Location: " . $this->router->generate("appuser-list"));
          exit;

      } else {
          $errorList[] = 'La suppression a échoué';
      }
  }
}