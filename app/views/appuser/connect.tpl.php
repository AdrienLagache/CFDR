<div class="container my-4 connect">
    <a href="<?= $router->generate('main-home') ?>" class="btn btn-secondary float-end">Retour</a>
    <h2>Se connecter</h2>
    <?php
    // Pour afficher les messages d'erreurs éventuels.
    include __DIR__ . '/../partials/message.tpl.php';
    ?>
    
    <form action="" method="POST">
        <div class="form-group">
            <label for="email">Identifiant</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Votre e-mail" value="">
        </div>

        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Votre mot de passe" value="">
        </div>
        
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-success mt-4">Valider</button>
        </div>
    </form>

</div>