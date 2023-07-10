
<div class="container my-4 connect">
<a href="<?= $router->generate('main-home') ?>" class="btn btn-secondary float-end">Retour</a>
<h2>Générer le line-up</h2>
<?php
// Pour afficher les messages d'erreurs éventuels.
include __DIR__ . '/../partials/message.tpl.php';
?>

<form action="" method="POST">
    <?php $i = 1; ?>
    <?php foreach ($users as $user) :?>
    <div class="form-group">
        <label for="pilote">Pilote <?= $i++?></label>
        <select class="form-select" name="pilote" id="pilote">
            <option value="">-- Renseignez un pilote --</option>
            <?php foreach ($users as $user) :?>
            <option value="<?= $user->getPseudo()?>"><?= $user->getPseudo()?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <?php endforeach; ?>
    
    <div class="d-grid gap-2">
        <button type="submit" class="btn btn-success mt-4">Valider</button>
    </div>
</form>

</div>