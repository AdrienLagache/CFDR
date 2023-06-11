<div class="container my-4">
    <a href="<?= $router->generate('appuser-list') ?>" class="btn btn-success float-end">Retour</a>
    <h2>Ajouter un utilisateur</h2>
    <?php
    // Pour afficher les messages d'erreurs éventuels.
    include __DIR__ . '/../partials/message.tpl.php';
    ?>
    
    <form action="" method="POST">

        <div class="form-group">
            <label for="email">Pseudo</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Votre Pseudo" value="">
        </div>

        <div class="form-group">
            <label for="email">Team</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Le nom de la team" value="">
        </div>

        <div class="form-group">
            <label for="role" class="form-label">Véhicule</label>
            <select class="form-select" name="role" id="role" aria-describedby="roleHelpBlock">
                <option value="Renault Sport Mégame R.S. RX">Renault Sport Mégame R.S. RX</option>
                <option value="Peugeot 208 WRX">Peugeot 208 WRX</option>
                <option value="Audi S1 EKS RX Quattro">Audi S1 EKS RX Quattro</option>
                <option value="Renault Sport Clio R.S. RX">Renault Sport Clio R.S. RX</option>
                <option value="Ford Fiesta RXS Evo 5">Ford Fiesta RXS Evo 5</option>
                <option value="Ford Fiesta Rallycross MK8">Ford Fiesta Rallycross MK8</option>
                <option value="Mini Cooper SX1">Mini Cooper SX1</option>
                <option value="Ford Fiesta Rallycross (STARD)">Ford Fiesta Rallycross (STARD)</option>
                <option value="Seat Ibiza RX">Seat Ibiza RX</option>
            </select>
        </div>

        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="text" class="form-control" id="password" name="password" placeholder="Votre mot de passe" value="">
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Votre e-mail" value="">
        </div>

        <div class="form-group">
            <label for="role" class="form-label">Role</label>
            <select class="form-select" name="role" id="role" aria-describedby="roleHelpBlock">
                <option value="pilote">pilote</option>
                <option value="admin">admin</option>
            </select>
        </div>
        
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary mt-5">Valider</button>
        </div>
    </form>

</div>