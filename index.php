<?php
require 'element/header.php';
?>

<main class="px-3">
    <h1>Accueil</h1>
    <p class="lead">C'est formidab</p>

    <pre>
        <?= var_dump($_SERVER['SCRIPT_NAME']) ?>
        <?= var_dump($_SESSION['connecte']) ?>
    </pre>
</main>

<?php
require 'element/footer.php';
?>