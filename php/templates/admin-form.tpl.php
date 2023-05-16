<form class="admin" action='./index.php' method="post">
    <label for="flag">nom de l'image du drapeau</label>
    <input type="text" id="flag" name="flag">
    <label for="race">Numero de course</label>
    <input type="text" id="race" name="race">
    <label for="country">Nom du pays</label>
    <input type="text" id="country" name="country">
    <label for="track">Nom du circuit</label>
    <input type="text" id="track" name="track">
    <label for="date">Date de la course</label>
    <input type="text" id="date" name="date">
    <div class="admin-delete">
        <input id="admin_add" type="submit" formaction="./index.php" value="Ajouter course">
        <input id="admin-delete_last" type="submit" formaction="./index.php?page=admin&request=delete-last" value="Effacer dernière">
        <input class="admin-delete_all" type="submit" formaction="./index.php?page=admin&request=delete-all" value="Tout effacer">
    </div>
</form>
<form >

</form>