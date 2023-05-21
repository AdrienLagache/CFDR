<?php
    include "templates/header.tpl.php";
?>

<form class="form" action="formulaire.input.php" method="get">
    <label for ="name">Nom :</label>
    <input type="text" id="name" name="user_name">
    <label for ="surname">Prénom :</label>
    <input type="text" id="firstname" name="user_firstname">
    <label for ="surname">Pseudo :</label>
    <input type="text" id="surname" name="user_surname">
    <label for ="surname">Steam Id :</label>
    <input type="text" id="surname" name="user_surname">
    <label for ="team">Team :</label>
    <input type="text" id="team" name="user_team">
    <label for="points">voiture choisie :</label>
    <input type="number" id="points" name="user_points">
    <button id="admin_input">Envoyer</button>
</form>

<?php
    $datas = [];
    $datas = $_GET;
if(isset($datas)) {
    echo '<p><br>' . $datas["user_name"] . ' ' . $datas["user_surname"] . ' : ' . $datas["user_team"] . ' => ' . intval($datas["user_points"]) . '</p>';
}