<a href="<?= $router->generate('main-calendar') ?>" class="btn btn-secondary mt-4 ms-4 w-25">Retour</a>

<section class="admin">

    <div class="admin-input">
        <form action="" method="POST" class="mt-5">

            <div class="form-group">
                <label for="flag" class="form-label">drapeau</label>
                <select class="form-select" name="flag" id="flag">
                    <option value="">--choisir un drapeau--</option>
                    <option value="Flag_of_the_United_Arab_Emirates.png" <?php if ($eventToUpdate->flag() == 'Flag_of_the_United_Arab_Emirates.png') echo " selected"; ?>>Abu-Dhabi</option>
                    <option value="Flag_of_Spain.png" <?php if ($eventToUpdate->flag() == 'Flag_of_Spain.png') echo " selected"; ?>>Espagne</option>
                    <option value="Flag_of_Belgium.png" <?php if ($eventToUpdate->flag() == 'Flag_of_Belgium.png') echo " selected"; ?>>Belgique</option>
                    <option value="Flag_of_the_United_Kingdom.webp" <?php if ($eventToUpdate->flag() == 'Flag_of_the_United_Kingdom.webp') echo " selected"; ?>>Grande-Bretagne</option>
                    <option value="Flag_of_Norway.png" <?php if ($eventToUpdate->flag() == 'Flag_of_Norway.png') echo " selected"; ?>>Norvège</option>
                    <option value="Flag_of_Sweden.png" <?php if ($eventToUpdate->flag() == 'Flag_of_Sweden.png') echo " selected"; ?>>Suède</option>
                    <option value="Flag_of_Canada.png" <?php if ($eventToUpdate->flag() == 'Flag_of_Canada.png') echo " selected"; ?>>Canada</option>
                    <option value="Flag_of_France.png" <?php if ($eventToUpdate->flag() == 'Flag_of_France.png') echo " selected"; ?>>France</option>
                    <option value="Flag_of_Latvia.png" <?php if ($eventToUpdate->flag() == 'Flag_of_Latvia.png') echo " selected"; ?>>Lettonie</option>
                    <option value="Flag_of_South_Africa.png" <?php if ($eventToUpdate->flag() == 'Flag_of_South_Africa.png') echo " selected"; ?>>Afrique du sud</option>
                    <option value="Flag_of_Germany.png" <?php if ($eventToUpdate->flag() == 'Flag_of_Germany.png') echo " selected"; ?>>Allemagne</option>
                    <option value="Flag_of_Portugal.png" <?php if ($eventToUpdate->flag() == 'Flag_of_Portugal.png') echo " selected"; ?>>Portugal</option>
                </select>
            </div>

            <div class="form-group">
                <label for="country">Pays</label>
                <input type="text" class="form-control" id="country" name="country" value="<?= $eventToUpdate->country() ?>" placeholder="Nom du pays">
            </div>

            <div class="form-group">
                <label for="track">Nom du circuit</label>
                <input type="text" class="form-control" id="track" name="track" value="<?= $eventToUpdate->track() ?>" placeholder="Nom du circuit">
            </div>

            <div class="form-group">
                <label for="date">Date</label>
                <input type="text" class="form-control" id="date" name="date" value="<?= $eventToUpdate->date() ?>" placeholder="Date de l'évènement">
            </div>

            <button type="submit" class="btn btn-success btn-block mt-5 w-100 h-100 admin-submit__button">Ajouter</button>
        </form>
    </div>

    <div class="container admin-preview">

        <table class="table mb-5 preview">
            <h3 class="mt-5 preview__title">Calendrier Spring</h3>

            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Pays</th>
                    <th scope="col">Circuit</th>
                    <th scope="col">Date</th>
                    <th scope="col"></th>
                </tr>
            </thead>

            <tbody class="table-group-divider">
                <?php $i = 1; ?>
                <?php foreach ($spring as $event) : ?>

                    <tr class="border-top border-dark-subtl">
                        <th scope="row"><?= $i++ ?></th>
                        <td><?= $event->country() ?></td>
                        <td><?= $event->track() ?></td>
                        <td><?= $event->date() ?></td>

                        <td class="text-end">
                            <a href="<?= $router->generate('spring-edit', ['id' => $event->id()]) ?>" class="btn btn-sm btn-warning">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?= $router->generate('spring-remove', ['id' => $event->id()]) ?>">Oui, je veux supprimer</a>
                                    <a class="dropdown-item" href="#" data-bs-toggle="dropdown">Oups !</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>