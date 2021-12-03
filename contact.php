<?php
$title = 'Contact';
require 'element/header.php';
?>

<style>
    ul {
        list-style: none;
    }
</style>

<div class="row">
    <div class="col-md-8">
        <h2>Contact</h2>
        <p>Les contacts, bah c'est ici</p>
    </div>
    <div class="col-md-4">
        <h2>Horaires d'ouverture</h2>
        <ul>
            <?php foreach (JOURS as $k => $jour): ?>
                <li <?php if ($k + 1 === (int)date('N')): ?> style="color: green" <?php endif ?>><strong><?= $jour ?></strong> : <?= creneauxHTML(CRENEAUX[$k]) ?></li>
            <?php endforeach ?>
        </ul>
    </div>
</div>

<pre>
    <?= 'Variable stockée en Session (depuis le header) sous la clé \'role\' : ' .  $_SESSION['role'] ?>
</pre>

<?php
require 'element/footer.php';
?>