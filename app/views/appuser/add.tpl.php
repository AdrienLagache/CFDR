<div class="container my-4">
    <a href="<?= $router->generate('appuser-list') ?>" class="btn btn-success float-end">Retour</a>
    <h2><?= (null === $user->getId()) ? 'Ajouter un utilisateur' : 'Mettre à jour'; ?> un utilisateur</h2>
    <?php
    // Pour afficher les messages d'erreurs éventuels.

                use App\Models\AppUser;

    include __DIR__ . '/../partials/message.tpl.php';
    ?>
    
    <form action="" method="POST">

        <div class="form-group">
            <label for="pseudo">Pseudo</label>
            <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Votre Pseudo" value="<?= $user->getPseudo()?>">
        </div>

        <div class="form-group">
            <label for="team">Team</label>
            <select class="form-select" name="team" id="team">
                <?php foreach ($teams as $team) :?>
                    <option value="<?= $team->getId()?>" <?php if ($team->getId() == $user->getTeamId()) echo 'selected'?>><?= $team->getName()?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="car" class="form-label">Véhicule</label>
            <select class="form-select" name="car" id="car">
                <option value="Renault Sport Mégane R.S. RX" <?php if ($user->getCar() == 'Renault Sport Mégane R.S. RX') echo 'selected'?>>Renault Sport Mégane R.S. RX</option>
                <option value="Peugeot 208 WRX" <?php if ($user->getCar() == 'Peugeot 208 WRX') echo 'selected'?>>Peugeot 208 WRX</option>
                <option value="Audi S1 EKS RX Quattro" <?php if ($user->getCar() == "Audi S1 EKS RX Quattro") echo 'selected'?>>Audi S1 EKS RX Quattro</option>
                <option value="Renault Sport Clio R.S. RX" <?php if ($user->getCar() == "Renault Sport Clio R.S. RX") echo 'selected'?>>Renault Sport Clio R.S. RX</option>
                <option value="Ford Fiesta RXS Evo 5" <?php if ($user->getCar() == "Ford Fiesta RXS Evo 5") echo 'selected'?>>Ford Fiesta RXS Evo 5</option>
                <option value="Ford Fiesta Rallycross MK8" <?php if ($user->getCar() == "Ford Fiesta Rallycross MK8") echo 'selected'?>>Ford Fiesta Rallycross MK8</option>
                <option value="Mini Cooper SX1" <?php if ($user->getCar() == "Mini Cooper SX1") echo 'selected'?>>Mini Cooper SX1</option>
                <option value="Ford Fiesta Rallycross (STARD)" <?php if ($user->getCar() == "Ford Fiesta Rallycross (STARD)") echo 'selected'?>>Ford Fiesta Rallycross (STARD)</option>
                <option value="Seat Ibiza RX" <?php if ($user->getCar() == "Seat Ibiza RX") echo 'selected'?>>Seat Ibiza RX</option>
            </select>
        </div>
        
        <?php if (null === $user->getId()) :?>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Votre mot de passe" value="">
        </div>
        <?php endif; ?>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Votre e-mail" value="<?= $user->getEmail()?>">
        </div>

        <div class="form-group">
            <label for="role" class="form-label">Role</label>
            <select class="form-select" name="role" id="role">
                <option value="pilote" <?php if ($user->getRole() == 'pilote') echo 'selected'?>>pilote</option>
                <option value="admin" <?php if ($user->getRole() == 'admin') echo 'selected'?>>admin</option>
            </select>
        </div>
        
        <?php if (null !== $user->getId()) :?>
            <div class="form-group">
                <label for="points">Points</label>
                <input type="text" class="form-control" id="points" name="points" placeholder="Les points actuels (vide : 0)" value="<?= $user->getPoints()?>">
            </div>
        <?php endif;?>
        
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary mt-5">Valider</button>
        </div>
    </form>

</div>