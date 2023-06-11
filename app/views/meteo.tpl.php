<section class="meteo">
    <h2 class="meteo-title">Météo</h2>

    <form class="meteo-location" action="<?= $router->generate('main-meteo')?>" method="GET">
        <select id="meteo" class="form-select" onchange="this.form.submit()" name="location">
                <option value="18276642">--choisir un circuit--</option>
                <option value="15472914">Yas Marina</option>
                <option value="9038451">Barcelona-Catalunya</option>
                <option value="4758584">Mettet</option>
                <option value="3286510">Silverstone</option>
                <option value="7047983">Lydden-hill</option>
                <option value="17379825">Hell</option>
                <option value="10243862">Höljes</option>
                <option value="16958703">Trois Rivières</option>
                <option value="18276642">Lohéac</option>
                <option value="6508658">Riga</option>
                <option value="17804068">Le Cap</option>
                <option value="389410">Estering</option>
                <option value="4345984">Montalegre</option>
            </select>
        </form>

    <?php $location = isset($_GET['location']) ? $_GET['location'] : '18276642';?>

    <div class="meteo-widget">
        <iframe src="https://api.wo-cloud.com/content/widget/?geoObjectKey=<?=$location?>&language=fr&region=FR&timeFormat=HH:mm&windUnit=kmh&systemOfMeasurement=metric&temperatureUnit=celsius" name="CW2" scrolling="no" width="300" height="400" frameborder="0"></iframe>
    </div>
</section>

<!-- weather widget start --><a target="_blank" href="https://hotelmix.fr/weather/lamorlaye-60028"><img src="https://w.bookcdn.com/weather/picture/32_60028_1_3_34495e_250_2c3e50_ffffff_ffffff_1_2071c9_ffffff_0_6.png?scode=50707&domid=581&anc_id=62968"  alt="booked.net"/></a><!-- weather widget end -->

<!-- weather widget start --><a target="_blank" href="https://hotelmix.fr/weather/pau-2673"><img src="https://w.bookcdn.com/weather/picture/32_2673_1_3_34495e_250_2c3e50_ffffff_ffffff_1_2071c9_ffffff_0_6.png?scode=50707&domid=581&anc_id=62968"  alt="booked.net"/></a><!-- weather widget end -->

<!-- url site du widget : https://www.meteoetradar.com/widget-meteo -->

<!--
    REFERENCES DE LOCALISATION geoObjectKey POUR LE WIDGET

YAS MARINA => 15472914,
BARCELONE => 9038451,
METTET => 4758584,
SILVERSTONE => 3286510,
LYDDEN-HILL => 7047983,
HELL => 17379825,
HOLJES => 10243862,
TROIS RIVIERES => 16958703,
LOHEAC => 18276642,
RIGA => 6508658,
LE CAP => 17804068,
ESTERING => 389410,
MONTALEGRE => 4345984, -->