<?php
$title = 'Jeu';

$aDeviner = 22;

$erreur = null;
$succes = null;
$valeur = null;

if (isset($_GET['chiffre'])) {
    if ($_GET['chiffre'] < $aDeviner) {
        $erreur = 'Votre nombre est trop petit';
    } elseif ($_GET['chiffre'] > $aDeviner) {
        $erreur = 'Votre nombre est trop grand';
    } else {
        $succes = "Bravo, le nombre à deviner était bien ";
    }
    $valeur = $_GET['chiffre'];
}

require 'element/header.php';
?>

<h2>Jeu</h2>
<br>

<?php if ($erreur): ?>
    <div class="alert alert-danger">
        <?= $erreur ?>
    </div>
<?php elseif ($succes): ?>
    <div class="alert alert-success">
        <?= $succes ?><strong><?= $aDeviner ?></strong>
    </div>
<?php endif ?>

<br>
<div class="container">
    <form action="/jeu.php" method="GET">
        <div class="form-group">
            <input class="form-control" type="number" name="chiffre" placeholder="Entrez un nombre entre 0 et 100">
            <br>
            <button class="btn btn-primary" type="submit">Deviner</button>
        </div>
    </form>
    <br>
    <br>
    <pre>
        <h2>GET</h2>
        <?= var_dump($_GET) ?>
    </pre>

    <pre>
        <h2>POST</h2>
        <?= var_dump($_POST) ?>
    </pre>
</div>

<?php
require 'element/footer.php';
?>