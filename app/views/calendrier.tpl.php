    <section class="calendrier">
        <h2 class="calendrier-title">Calendrier saison Spring 2023</h2>
        
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="thead-flag" scope="col">Flag</th>
                        <th class="thead-race" scope="col">#</th>
                        <th class="thead-country" scope="col">Country</th>
                        <th class="thead-track" scope="col">Track</th>
                        <th class="thead-date" scope="col">Date</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider border-light">
                <?php $i = 1;?>
                <?php foreach ($spring as $Event) :?>
                    <tr class="border-top border-dark-subtl">
                        <th class="calendrier-item" scope="row"><img src="assets/images/<?= $Event->flag()?>" alt="drapeaux des émirats arabes unis"></th>
                        <td class="calendrier-item">R<?=$i++?></td>
                        <td class="calendrier-item"><?= $Event->country()?></td>
                        <td class="calendrier-item"><?= $Event->track()?></td>
                        <td class="calendrier-item"><?= $Event->date()?></td>
                    </tr>
                <?php endforeach;?>
        
                </tbody>
            </table>
        </div>
    </section>
    <!-- j'utilise ce compteur pour afficher le numéro de course
    au lieu de l'id afin de supprimer des éléments tout en gardant
    un ordre cohérent -->
    <?php $i = 1;?>
    <?php if (!empty($fall)):?>
    <section class="calendrier">
        <h2 class="calendrier-title">Calendrier saison Fall 2023</h2>
        
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="thead-flag" scope="col">Flag</th>
                        <th class="thead-race" scope="col">#</th>
                        <th class="thead-country" scope="col">Country</th>
                        <th class="thead-track" scope="col">Track</th>
                        <th class="thead-date" scope="col">Date</th>
                    </tr>
                </thead>
    <?php endif;?>
                <tbody class="table-group-divider border-light">
        
                <?php foreach ($fall as $Event) :?>
                    <tr class="border-top border-dark-subtl">
                        <th class="calendrier-item" scope="row"><img src="assets/images/<?= $Event->flag()?>" alt="drapeaux des émirats arabes unis"></th>
                        <td class="calendrier-item">R<?= $i++?></td>
                        <td class="calendrier-item"><?= $Event->country()?></td>
                        <td class="calendrier-item"><?= $Event->track()?></td>
                        <td class="calendrier-item"><?= $Event->date()?></td>
                    </tr>
                <?php 
                    endforeach;
                ?>        
                </tbody>
            </table>
        </div>
    </section>   
 
