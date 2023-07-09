<section class="classement">
    <h2 class="classement-title">Classement Pilotes</h2>
    
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th class="thead-standing" scope="col">#</th>
                    <th class="thead-pilote" scope="col">Pilote</th>
                    <th class="thead-manufacturer" scope="col">Constructeur</th>
                    <th class="thead-team" scope="col">Ecurie</th>
                    <th class="thead-points" scope="col">Points</th>
                </tr>
            </thead>
            <tbody class="table-group-divider border-light">
            <?php $i = 1;?>
            <?php foreach ($pilotes as $pilote) :?>
                <tr class="border-top border-dark-subtl">
                    <th class="classement-item" scope="row"><?= $i++?></th>
                    <td class="classement-item"><?= $pilote->getPseudo()?></td>
                    <td class="classement-item"><img src="assets/images/manufacturers-logos/<?= $pilote->getManufacturer()?>"></td>
                    <td class="classement-item"><?= $pilote->getTeam()?></td>
                    <td class="classement-item"><?= $pilote->getPoints()?></td>
                </tr>
            <?php endforeach;?>
    
            </tbody>
        </table>
    </div>
</section>
<section class="classement">
    <h2 class="classement-title">Classement Écuries</h2>
    
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th class="thead-standing" scope="col">#</th>
                    <th class="thead-team" scope="col">Écurie</th>
                    <th class="thead-manufacturer" scope="col">Constructeur</th>
                    <th class="thead-points" scope="col">Points</th>
                </tr>
            </thead>
            <tbody class="table-group-divider border-light">
            <?php $i = 1;?>
            <?php foreach ($teamPoints as $team => $value) :?>
                <tr class="border-top border-dark-subtl">
                    <th class="classement-item" scope="row"><?= $i++?></th>
                    <td class="classement-item"><?= $team?></td>
                    <td class="classement-item"><img src="assets/images/manufacturers-logos/<?= $value[1]?>"></td>
                    <td class="classement-item"><?= $value[0]?></td>
                </tr>
            <?php endforeach;?>
    
            </tbody>
        </table>
    </div>
</section>