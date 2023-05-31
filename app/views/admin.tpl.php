<main class="admin"> 
    <form class="admin-submit" action="./admin" method="get">
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
        <label for="race">Numero de course</label>
        <input type="text" id="race" name="race">
        <label for="country">Nom du pays</label>
        <input type="text" id="country" name="country">
        <label for="track">Nom du circuit</label>
        <input type="text" id="track" name="track">
        <label for="date">Date de la course</label>
        <input type="text" id="date" name="date">
        <input id="admin_add" type="submit" value="Ajouter course">
    </form>
    <form class="admin-submit" action="./admin" method="get">
        <input type="hidden" name="request" value="lastFallDelete">
        <input id="admin-delete_last" type="submit" value="Effacer dernière course">
    </form>
    <form class="admin-submit" action="./admin" method="get">
        <input type="hidden" name="request" value="allFallDelete">
        <input id="admin-delete_all" type="submit" value="Effacer le calendrier Fall">
    </form>
</main>