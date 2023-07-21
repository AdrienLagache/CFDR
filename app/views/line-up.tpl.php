<section id="line-up__list">
  <h2>Line-up</h2>
  <div class="container text-center">
    <?php
    $subArrays = [];
    // je divise mon tableau en sous-tableaux de 4 éléments max
    for ($i = 0; $i < count($pilotes); $i += 4) {
      $subArray = array_slice($pilotes, $i, 4);
      $subArrays[] = $subArray;
    }
    // je controle la longueur de mon dernier sous-tableau
    $lastSubArrayIndex = count($subArrays) - 1;
    $lastSubArray = $subArrays[$lastSubArrayIndex];

    if (count($lastSubArray) === 1) {
      $firstPiloteArr = $lastSubArrayIndex - 1;
      $secondPiloteArr = $lastSubArrayIndex - 2;

      $firstPilote = array_pop($subArrays[$firstPiloteArr]);
      // j'utilise $subArrays[$lastSubArrayIndex] à la place de $lastSubArray pour modifier le tableau directement.
      array_push($subArrays[$lastSubArrayIndex], $firstPilote);

      $secondPilote = array_pop($subArrays[$secondPiloteArr]);
      array_push($subArrays[$lastSubArrayIndex], $secondPilote);
    }
    else if (count($lastSubArray) === 2) {
      $piloteArr = $lastSubArrayIndex - 1;

      $pilote = array_pop($subArrays[$piloteArr]);
      array_push($subArrays[$lastSubArrayIndex], $pilote);
    }
    ?>
    <?php foreach ($subArrays as $subArray) : ?>
    <div class="row row-cols-<?= count($subArray)?> line-up__row">
      <?php foreach ($subArray as $pilote) : ?>
        <div class="col line-up__col">
          <p><?= $pilote->getPseudo() ?></p>
          <span><?= $pilote->getCar() ?></span>
        </div>
      <?php endforeach; ?>
    </div>
    <?php endforeach; ?>
  </div>
</section>