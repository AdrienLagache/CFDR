<div class="container my-4">
    <a href="<?= $router->generate('appuser-add')?>" class="btn btn-success float-end">Ajouter</a>
    <h2>Liste des pilotes</h2>
    <!-- Affichage des messages d'erreurs éventuels -->
    <?php include __DIR__ . '/../partials/message.tpl.php' ?>
    <table class="table mt-4">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Pseudo</th>
                <th scope="col">Team</th>
                <th scope="col">Voiture</th>
                <th scope="col">Mot de passe</th>
                <th scope="col">E-mail</th>
                <th scope="col">Role</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user):?>
                <tr>
                    <th scope="row"><?= $user->getId()?></th>
                    <td><?= $user->getPseudo()?></td>
                    <td><?= $user->getTeam()?></td>
                    <td><?= $user->getCar()?></td>
                    <td><?= $user->getPassword()?></td>
                    <td><?= $user->getEmail()?></td>
                    <td><?= $user->getRole()?></td>
                    <td class="text-end">
                        <a href="" class="btn btn-sm btn-warning">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                        <!-- Example single danger button -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="">Oui, je veux supprimer</a>
                                <a class="dropdown-item" href="#" data-bs-toggle="dropdown">Oups !</a>
                            </div>
                        </div>
                    </td>
                </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>