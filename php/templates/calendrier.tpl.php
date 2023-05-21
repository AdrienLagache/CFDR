    <section class="calendrier">
        <h2 class="calendrier-title">Calendrier saison Spring 2023</h2>
        
        <div class="table-responsive">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th class="thead-flag" scope="col">Flag</th>
                        <th class="thead-race" scope="col">#</th>
                        <th class="thead-country" scope="col">Country</th>
                        <th class="thead-track" scope="col">Track</th>
                        <th class="thead-date" scope="col">Date</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
        
                <?php foreach ($viewDatas['spring'] as $Event) :?>
                    <tr>
                        <th class="calendrier-item__flag" scope="row"><img src="../images/<?= $Event->flag()?>" alt="drapeaux des émirats arabes unis"></th>
                        <td class="calendrier-item__race">R<?= $Event->race()?></td>
                        <td class="calendrier-item__country"><?= $Event->country()?></td>
                        <td class="calendrier-item__track"><?= $Event->track()?></td>
                        <td class="calendrier-item__date"><?= $Event->date()?></td>
                    </tr>
                <?php endforeach;?>
        
                </tbody>
            </table>
        </div>
    </section>
    
    <?php if ($viewDatas['fall'] !== ''):?>
    <section class="calendrier">
        <h2 class="calendrier-title">Calendrier saison Fall 2023</h2>
        
        <div class="table-responsive">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th class="thead-flag" scope="col">Flag</th>
                        <th class="thead-race" scope="col">#</th>
                        <th class="thead-country" scope="col">Country</th>
                        <th class="thead-track" scope="col">Track</th>
                        <th class="thead-date" scope="col">Date</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
        
                <?php foreach ($viewDatas['fall'] as $Event) :?>
                    <tr>
                        <th class="calendrier-item__flag" scope="row"><img src="../images/<?= $Event->flag()?>" alt="drapeaux des émirats arabes unis"></th>
                        <td class="calendrier-item__race">R<?= $Event->race()?></td>
                        <td class="calendrier-item__country"><?= $Event->country()?></td>
                        <td class="calendrier-item__track"><?= $Event->track()?></td>
                        <td class="calendrier-item__date"><?= $Event->date()?></td>
                    </tr>
                <?php 
                    endforeach;
                    endif;
                ?>        
                </tbody>
            </table>
        </div>
    </section>   
 
