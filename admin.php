<?php
$title = 'Administration';
require 'element/header.php';

if (!estConnecte()) {
    header('Location: /login.php');
    exit();
}
?>

<h2 class="red">Administration (nécessite de s'être connecté)</h2>

<?php require 'element/footer.php';