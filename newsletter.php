<?php
$title = 'Newsletter';

$error = null;
$success = null;
$email = null;
if (!empty($_POST['email'])) {
    $email = $_POST['email'];
    // Filtre de validation
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // On créé un fichier emails
        $file = __DIR__ . DIRECTORY_SEPARATOR . 'emails' . DIRECTORY_SEPARATOR . date('Y-m-d');
        // On ajoute au fichier notre email s'il est validé
        file_put_contents($file, $email . PHP_EOL, FILE_APPEND);
        $success = 'Votre email a bien été enregistré';
        // On réinitialise la variable $email
        $email = null;
    } else {
        $error = 'Email invalide';
    }
}

require 'element/header.php';
?>

<h2>S'inscrire à ma formidab Newsletter</h2>
<br>
<?php if ($success): ?>
    <div class="alert alert-success col-md-3 container">
        <?= $success ?>
    </div>
<?php endif ?>
<?php if ($error): ?>
    <div class="alert alert-danger col-md-3 container">
        <?= $error ?>
    </div>
<?php endif ?>
<br>
<form action="/newsletter.php" method="POST" class="form-group container col-md-3">
    <input class="form-control" type="text" name="email" placeholder="Entrez votre email" value="<?= htmlentities($email) ?>" required>
    <br>
    <button class="btn btn-success" type="submit">S'inscrire</button>
</form>

<?php
require 'element/footer.php';