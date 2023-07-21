<div class="container my-4 connect line-up-generate">
    <a href="<?= $router->generate('main-home') ?>" class="btn btn-secondary float-end">Retour</a>
    <h2>Générer le line-up</h2>
    <?php
    // Pour afficher les messages d'erreurs éventuels.
    include __DIR__ . '/../partials/message.tpl.php';
    ?>

    <form id="line-up__form" action="" method="POST">
        <?php $i = 1; ?>
        <?php foreach ($users as $user) : ?>
            
            <div class="btn-group d-flex flex-column line-up__checkbox" role="group" aria-label="Basic checkbox toggle button group">
                <input type="checkbox" class="btn-check line-up__pilote" id="<?= $user->getPseudo()?>" name="selectedUsers[]" value="<?= $user->getId()?>" autocomplete="off">
                <label class="btn btn-outline-custom" for="<?= $user->getPseudo()?>"><?= $user->getPseudo()?></label>
            </div>

        <?php endforeach; ?>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-success mt-4">Valider</button>
        </div>
    </form>
</div>