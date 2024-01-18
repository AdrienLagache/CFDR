<div class="container my-4">
    <a href="<?= $router->generate('appuser-list') ?>" class="btn btn-success float-end">Retour</a>
    <h2>Ajouter une écurie</h2>
    <?php
    // Pour afficher les messages d'erreurs éventuels.
    include __DIR__ . '/../partials/message.tpl.php';
    ?>
    
    <form action="" method="POST">

        <div class="form-group">
            <label for="team">Team</label>
            <input type="text" class="form-control" id="team" name="team" placeholder="Le nom de la team" value="<?= $team->getName()?>">
        </div>

        <div class="form-group">
            <label for="manufacturer" class="form-label">Constructeur</label>
            <select class="form-select" name="manufacturer" id="manufacturer">
                <option value="peugeot-logo.svg" <?php if ($team->getManufacturer() == 'peugeot-logo.svg') echo 'selected'?>>Peugeot</option>
                <option value="seat-logo.svg" <?php if ($team->getManufacturer() == 'seat-logo.svg') echo 'selected'?>>Seat</option>
                <option value="audi-logo.svg" <?php if ($team->getManufacturer() == "audi-logo.svg") echo 'selected'?>>Audi</option>
                <option value="renault-logo.png" <?php if ($team->getManufacturer() == "renault-logo.png") echo 'selected'?>>Renault</option>
                <option value="mini-logo.svg" <?php if ($team->getManufacturer() == "mini-logo.svg") echo 'selected'?>>Mini</option>
                <option value="ford-logo.svg" <?php if ($team->getManufacturer() == "ford-logo.svg") echo 'selected'?>>Ford</option>
            </select>
        </div>
        
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary mt-5">Valider</button>
        </div>
    </form>

</div>