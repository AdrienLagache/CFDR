<main class="admin">
    
    <a href="<?= $router->generate('main-calendar') ?>" class="btn btn-success float-right">Retour</a>
        <h2>Ajouter un produit</h2>
    
        <form action="<?= $router->generate('admin-create')?>" method="POST" class="mt-5 admin-submit">
            <div class="form-group">
                <label for="flag" class="form-label">drapeau</label>
                <select class="custom-select" name="flag" id="flag" aria-describedby="rateHelpBlock">
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
                <label for="race">Nom du circuit</label>
                <input type="text" class="form-control" id="race" name="race" placeholder="Nom du circuit">
            </div>
            <div class="form-group">
                <label for="race">Date</label>
                <input type="text" class="form-control" id="race" name="race" placeholder="Date de l'évènement">
            </div>
            <button type="submit" class="btn btn-primary btn-block mt-5">Ajouter</button>
        </form>
        <form action="<?= $router->generate('admin-remove')?>" method="POST" class="mt-5 admin-submit">
            <input type="hidden" name="remove" value="lastFallDelete">
            <button type="submit" class="btn btn-primary btn-block mt-5">Effacer dernière course</button>
        </form>


        <!-- <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nom du produit" >
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" name="description" placeholder="Description"  aria-describedby="descriptionHelpBlock">
            <small id="subtitleHelpBlock" class="form-text text-muted">
                La description du produit
            </small>
        </div>
        <div class="form-group">
            <label for="picture">Image</label>
            <input type="text" class="form-control" id="picture" name="picture" placeholder="image jpg, gif, svg, png"  aria-describedby="pictureHelpBlock">
            <small id="pictureHelpBlock" class="form-text text-muted">
                URL relative d'une image (jpg, gif, svg ou png) fournie sur
                <a href="https://benoclock.github.io/S06-images/" target="_blank">cette page</a>
            </small>
        </div>
        <div class="form-group">
            <label for="price">Prix</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Prix"  aria-describedby="priceHelpBlock">
            <small id="priceHelpBlock" class="form-text text-muted">
                Le prix du produit
            </small>
        </div>
    
        <div class="form-group">
            <label for="rate" class="form-label">Avis</label>
            <select class="custom-select" name="rate" id="rate" aria-describedby="rateHelpBlock">
                <option value="1" >Médiocre</option>
                <option value="2" >Passable</option>
                <option value="3" >Décent</option>
                <option value="4" >Remarquable</option>
                <option value="5" >Excellent</option>
            </select>
            <small id="rateHelpBlock" class="form-text text-muted">
                Le statut du produit
            </small>
        </div>
    
        <div class="form-group">
            <label for="status" class="form-label">Disponibilité</label>
            <select class="custom-select" name="status" id="status" aria-describedby="statusHelpBlock">
                <option value="0" >Non renseigné</option>
                <option value="1" >Disponible</option>
                <option value="2" >Indisponible</option>
            </select>
            <small id="statusHelpBlock" class="form-text text-muted">
                Le statut du produit
            </small>
        </div>
    
        <div class="form-group">
            <label for="category" class="form-label">Catégorie</label>
            <select class="custom-select" id="category" name="category_id" aria-describedby="categoryHelpBlock" ?>">
                <option value="1" >Détente </option>
                <option value="2" >Au travail </option>
                <option value="3" >Cérémonie </option>
            </select>
            <small id="categoryHelpBlock" class="form-text text-muted">
                La catégorie du produit
            </small>
        </div>
    
        <div class="form-group">
            <label for="brand" class="form-label">Marque</label>
            <select class="custom-select" id="brand" name="brand_id" aria-describedby="brandHelpBlock" value="">
                <option value="1" >oCirage</option>
                <option value="2" >BOOTstrap</option>
                <option value="3" >Talonette</option>
            </select>
            <small id="brandHelpBlock" class="form-text text-muted">
                La marque du produit
            </small>
        </div>
    
        <div class="form-group">
            <label for="type" class="form-label"> Type</label>
            <select class="custom-select" id="type" name="type_id" aria-describedby="typeHelpBlock" value="">
                <option value="1" >Chaussures de ville</option>
                <option value="2" >Chaussures de sport</option>
                <option value="3" >Tongs</option>
            </select>
            <small id="typeHelpBlock" class="form-text text-muted">
                Le type de produit
            </small>
        </div>
    
        <button type="submit" class="btn btn-primary btn-block mt-5">Valider</button>
    </form> -->









    <form class="admin-submit" action="" method="POST">
        <input type="hidden" name="request" value="addOne">
        <label for="flag">drapeau</label>
        <select id="flag" name="flag">
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
        <!-- <label for="race">Numero de course</label>
        <input type="text" id="race" name="race">
        <label for="country">Nom du pays</label>
        <input type="text" id="country" name="country">
        <label for="track">Nom du circuit</label>
        <input type="text" id="track" name="track">
        <label for="date">Date de la course</label>
        <input type="text" id="date" name="date">
        <input id="admin_add" type="submit" value="Ajouter course"> -->
    </form>
    <form class="admin-submit" action="<?= $router->generate('admin-remove')?>" method="POST">
        <input type="hidden" name="remove" value="lastFallDelete">
        <input id="admin-delete_last" type="submit" value="Effacer dernière course">
    </form>
    <form class="admin-submit" action="<?= $router->generate('admin-remove')?>" method="POST">
        <input type="hidden" name="remove" value="allFallDelete">
        <input id="admin-delete_all" type="submit" value="Effacer le calendrier Fall">
    </form>
</main>