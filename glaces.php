<?php
// Checkbox
$parfums = [
    'Fraise' => 4,
    'Chocolat' => 2,
    'Vanille' => 5
];
// Radio
$cornets = [
    'Pot' => 1,
    'Cornet' => 2
];
// Checkbox
$supplements = [
    'Pépites de chocolat' => 1,
    'Chantilly' => 2
];

$ingredients = [];
$total = 0;
if (isset($_GET['parfum'])) {
    foreach ($_GET['parfum'] as $parfum) {
        if (isset($parfums[$parfum])) {
            $ingredients[] = $parfum;
            $total += ($parfums[$parfum]);
        }
    }
}

if (isset($_GET['cornet'])) {
    $cornet = $_GET['cornet'];
    if (isset($cornets[$cornet])) {
        $ingredients[] = $cornet;
        $total += ($cornets[$cornet]);
    }
}

if (isset($_GET['supplement'])) {
    foreach ($_GET['supplement'] as $supplement) {
        if (isset($supplements[$supplement])) {
            $ingredients[] = $supplement;
            $total += ($supplements[$supplement]);
        }
    }
}



require 'element/header.php';
?>
<br>
<h2>Créez votre merveilleuse glace personnalisey</h2>
<br>
<div class="row container" style="text-align: left;">
    <div class="card text-black col-md-6 bg-light">
        <div class="card-body">
            <h3 class="card-title">Votre glace :</h3>
            <?php foreach ($ingredients as $ingredient): ?>
                <li><?= $ingredient ?></li>
            <?php endforeach ?>
            <p>
                <strong><?= 'Total: ' . $total . '€' ?></strong>
            </p>
        </div>
    </div>

    <br>

    <div class="col-md-6">
        <form action="/glaces.php" method="GET">
            <h4>Choisissez vos parfums :</h4>
            <?php foreach ($parfums as $parfum => $prix) : ?>
                <div class="checkbox">
                    <label>
                        <?= checkbox('parfum', $parfum, $_GET) ?>
                        <!--<input type="checkbox" name="parfum[]" value="<?= $parfum ?>">-->
                        <?= $parfum . ' - ' . $prix . '€' ?>
                    </label>
                </div>
            <?php endforeach ?>

            <br>

            <h4>Choisissez votre cornet :</h4>
            <?php foreach ($cornets as $cornet => $prix) : ?>
                <div class="radio">
                    <label>
                        <?= radio('cornet', $cornet, $_GET) ?>
                        <?= $cornet . ' - ' . $prix . '€' ?>
                    </label>
                </div>
            <?php endforeach ?>

            <br>

            <h4>Choisissez vos suppléments :</h4>
            <?php foreach ($supplements as $supplement => $prix) : ?>
                <div class="checkbox">
                    <label>
                        <?= checkbox('supplement', $supplement, $_GET) ?>
                        <?= $supplement . ' - ' . $prix . '€' ?>
                    </label>
                </div>
            <?php endforeach ?>

            <br>

            <button class="btn btn-primary" type="submit">Calculer le prix</button>

            <br>
            <br>
        </form>
    </div>
</div>
<br>
<br>

<pre>
    <?= var_dump($_GET) ?>
</pre>

<?php
require 'element/footer.php';
