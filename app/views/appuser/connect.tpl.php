<div class="container my-4 connect">
    <a href="<?= $router->generate('main-home') ?>" class="btn btn-secondary float-end">Retour</a>
    <h2>Se connecter</h2>
    <?php
    // Pour afficher les messages d'erreurs éventuels.
    include __DIR__ . '/../partials/message.tpl.php';
    ?>
    
    <form action="" method="POST">
        <div class="form-group">
            <label for="pseudo">Pseudo</label>
            <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Votre Pseudo" value="<?= $appUser->getPseudo() ?>">
        </div>

        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Votre mot de passe" value="<?= isset($_POST['password'])? $_POST['password'] : ''; ?>">
        </div>
        
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-success mt-4">Valider</button>
        </div>
    </form>

</div>