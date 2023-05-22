<section class="meteo">
    <h2 class="meteo-title">Météo</h2>

    <form class="meteo-location" action="./meteo" method="get">
        <select id="meteo"  onchange="this.form.submit()" name="meteo">
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

    <?php $location = isset($_GET['meteo']) ? $_GET['meteo'] : '18276642';?>

    <div class="meteo-widget">
        <iframe src="https://api.wo-cloud.com/content/widget/?geoObjectKey=<?=$location?>&language=fr&region=FR&timeFormat=HH:mm&windUnit=kmh&systemOfMeasurement=metric&temperatureUnit=celsius" name="CW2" scrolling="no" width="290" height="318" frameborder="0" style="border: border-radius: 8px"></iframe>
    </div>
</section>

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