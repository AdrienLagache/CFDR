<!-- affiche les erreurs -->
<?php if (!empty($errorList)) : ?>
    <div class="alert alert-danger">
        <?php foreach ($errorList as $error) : ?>
            <div> <?= $error ?> </div>
        <?php endforeach;  ?>
    </div>
<?php endif; ?>

<!-- affiche les success -->
<?php if (!empty($successList)) : ?>
    <div class="alert alert-success">
        <?php foreach ($successList as $success) : ?>
            <div> <?= $success ?> </div>
        <?php endforeach;  ?>
    </div>
<?php endif; ?>