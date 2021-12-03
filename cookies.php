<?php
$title = 'Cookies';

$user = [
    'prenom' => 'Jo',
    'nom' => 'GI',
    'age' => 18
];

//setcookie('test', serialize($user));

$nom = null;
if (!empty($_COOKIE['utilisateur'])) {
    $nom = $_COOKIE['utilisateur'];
}

if (!empty($_GET['nom'])) {
    setcookie('utilisateur', $_GET['nom']);
}

// POUR SUPPRIMER UN COOKIE
if (!empty($_GET['action']) && $_GET['action'] === 'deco') {
    setcookie('utilisateur', '', time());
}

//setcookie('utilisateur', 'Jojo', time() + 60 * 60); // Ce cookie existera une heure
require (__DIR__ . DIRECTORY_SEPARATOR . 'element' . DIRECTORY_SEPARATOR . 'header.php');
?>

<?php if($nom): ?>
    <a href="cookies.php?action=deco">Se déconnecter</a>
    <h3>Bonjour <?= htmlentities($nom) // FAILLE XSS : ATTENTION DE BIEN SECURISER CE QUE L'UTILISATEUR PEUT RENTRER?></h3>
<?php else: ?>
    <form action="/cookies.php" method="GET">
        <div class="form-group col-sm-3 container">
            <input class="form-control" type="text" name="nom" placeholder="Entrez votre nom"><br>
        </div>
        <button class="btn btn-success" type="submit">Soumettre</button>
    </form>
<?php endif ?>

<?php
require (__DIR__ . DIRECTORY_SEPARATOR . 'element' . DIRECTORY_SEPARATOR . 'footer.php');