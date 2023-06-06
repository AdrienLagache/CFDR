<main class="admin">
    
    <a href="<?= $router->generate('main-calendar') ?>" class="btn btn-secondary float-right my-3 w-25">Retour</a>
    
        <form action="<?= $router->generate('admin-create')?>" method="POST" class="mt-1">
            <div class="form-group">
                <label for="flag" class="form-label">drapeau</label>
                <select class="form-select" name="flag" id="flag">
                    <option value="">--choisir un drapeau--</option>
                    <option value="Flag_of_the_United_Arab_Emirates.png">Abu-Dhabi</option>
                    <option value="Flag_of_Spain.png">Espagne</option>
                    <option value="Flag_of_Belgium.png">Belgique</option>
                    <option value="Flag_of_the_United_Kingdom.webp">Grande-Bretagne</option>
                    <option value="Flag_of_Norway.png">Norvège</option>
                    <option value="Flag_of_Sweden.png">Suède</option>
                    <option value="Flag_of_Canada.png">Canada</option>
                    <option value="Flag_of_France.png">France</option>
                    <option value="Flag_of_Latvia.png">Lettonie</option>
                    <option value="Flag_of_South_Africa.png">Afrique du sud</option>
                    <option value="Flag_of_Germany.png">Allemagne</option>
                    <option value="Flag_of_Portugal.png">Portugal</option>
                </select>
            </div>
            <div class="form-group">
                <label for="race">Numero de course</label>
                <input type="text" class="form-control" id="race" name="race" placeholder="Numéro de course">
            </div>
            <div class="form-group">
                <label for="country">Pays</label>
                <input type="text" class="form-control" id="country" name="country" placeholder="Nom du pays">
            </div>
            <div class="form-group">
                <label for="track">Nom du circuit</label>
                <input type="text" class="form-control" id="track" name="track" placeholder="Nom du circuit">
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="text" class="form-control" id="date" name="date" placeholder="Date de l'évènement">
            </div>
            <button type="submit" class="btn btn-success btn-block mt-5 w-100 h-100 admin-submit__button">Ajouter</button>
        </form>
        <div class="admin-delete">
            <form action="<?= $router->generate('admin-remove')?>" method="POST" class="mt-1 admin-submit">
                <input type="hidden" name="remove" value="lastFallDelete">
                <button type="submit" class="btn btn-warning btn-block mt-3 w-100 h-100">Effacer dernière course</button>
            </form>
            <form action="<?= $router->generate('admin-remove')?>" method="POST" class="mt-1 admin-submit">
                <input type="hidden" name="remove" value="allFallDelete">
                <button type="submit" class="btn btn-danger btn-block mt-3 mb-3 w-100 h-100">Effacer le calendrier Fall</button>
            </form>
        </div>
</main>