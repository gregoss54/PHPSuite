<?php
$title = 'Menu';

$lignes = file(__DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'menu.tsv');
foreach ($lignes as $k => $ligne) {
    //print_r(explode("\t", trim($ligne)));
    $lignes[$k] = explode("\t", trim($ligne));
}

require (__DIR__ . DIRECTORY_SEPARATOR . 'element' . DIRECTORY_SEPARATOR . 'header.php');
?>

<br>
<h2>Mon délicieux Menu</h2>
<br>
<div class="container_menu">
    <?php foreach ($lignes as $ligne): ?>
        <?php if (count($ligne) === 1): ?>
            <h2><?= $ligne[0] // Ligne Pizza... ?></h2>
        <?php else: ?>
            <div class="row">
                <div class="col md-8">
                    <p>
                        <strong><?= $ligne[0] // Ligne des intitulés (même que Pizza... mais avec un index sup à 1)?></strong>
                        <br>
                        <?= $ligne[1] // Ligne des ingrédients ?>
                    </p>
                </div>
                <div class="col-md-4">
                    <strong><?= number_format($ligne[2], 2, ',', '') . '€' // Ligne des prix ?></strong>
                </div>
            </div>
        <?php endif ?>
    <?php endforeach ?>
</div>

<?php
require 'element/footer.php';