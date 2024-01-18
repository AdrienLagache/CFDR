<div class="form-group">
            <label for="pilote">Pilote <?= $i++?></label>
            <select class="form-select" name="pilote" id="pilote">
                <option value="">-- Renseignez un pilote --</option>
                <?php foreach ($users as $user) :?>
                <option value="<?= $user->getPseudo()?>"><?= $user->getPseudo()?></option>
                <?php endforeach; ?>
            </select>
        </div>