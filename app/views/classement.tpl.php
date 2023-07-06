<section class="calendrier">
    <h2 class="calendrier-title">Classement Pilotes</h2>
    
    <div class="table-responsive">
        <table class="table table-dark table-striped table-hover">
            <thead>
                <tr>
                    <th class="thead-flag" scope="col">#</th>
                    <th class="thead-race" scope="col">Pilote</th>
                    <th class="thead-country" scope="col">Ecurie</th>
                    <th class="thead-date" scope="col">Constructeur</th>
                    <th class="thead-track" scope="col">Points</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
            <?php $i = 1;?>
            <?php foreach ($pilotes as $pilote) :?>
                <tr>
                    <th class="classement-item__flag" scope="row"><?= $i++?></th>
                    <td class="classement-item__race"><?= $pilote->getPseudo()?></td>
                    <td class="classement-item__country"><?= $pilote->getTeam()?></td>
                    <td class="classement-item__date"><?= $pilote->getManufacturer()?></td>
                    <td class="classement-item__track"><?= $pilote->getPoints()?></td>
                </tr>
            <?php endforeach;?>
    
            </tbody>
        </table>
    </div>
</section>
<section class="calendrier">
    <h2 class="calendrier-title">Classement Écuries</h2>
    
    <div class="table-responsive">
        <table class="table table-dark table-striped table-hover">
            <thead>
                <tr>
                    <th class="thead-flag" scope="col">#</th>
                    <th class="thead-race" scope="col">Team</th>
                    <th class="thead-country" scope="col">Constructeur</th>
                    <th class="thead-track" scope="col">Points</th>
                    <!-- <th class="thead-date" scope="col">Diff</th> -->
                </tr>
            </thead>
            <tbody class="table-group-divider">
            <?php $i = 1;?>
            <?php foreach ($teamPoints as $team => $value) :?>
                <tr>
                    <th class="classement-item__flag" scope="row"><?= $i++?></th>
                    <td class="classement-item__race"><?= $team?></td>
                    <td class="classement-item__country"><?= $value[1]?></td>
                    <td class="classement-item__track"><?= $value[0]?></td>
                    <!-- <td class="classement-item__date"> - </td> -->
                </tr>
            <?php endforeach;?>
    
            </tbody>
        </table>
    </div>
</section>