<?php
$title = 'Login';

$password = '$2y$10$QMGdCNImCePUhu7RzlWXju047wwBMi5vb4GEGoQkU593SJeD8EGpu';
$error = null;
if (!empty($_POST['id']) && !empty($_POST['password'])) {
    if ($_POST['id'] === 'admin' && password_verify($_POST['password'], $password)) {
        // On se connecte
        session_start();
        $_SESSION['connecte'] = 1;
        header('Location: /admin.php');
        exit();
    } else {
        $error = 'Identifiant incorrect';
    }
}

require 'element/header.php';
?>


<?php if ($error) : ?>
    <div class="alert alert-danger col-sm-3 container">
        <?= $error ?>
    </div>
<?php endif ?>

<div class="container col-sm-3">
    <form action="/login.php" method="POST">
        <div class="form-group">
            <input class="form-control" type="text" name="id" placeholder="Entrez votre identifiant"><br>
        </div>
        <div class="form-group">
            <input class="form-control" type="password" name="password" placeholder="Entrez votre mot de passe"><br>
        </div>
        <button class="btn btn-success" type="submit">Se connecter</button>
    </form>
</div>

<?php
require 'element/footer.php';
