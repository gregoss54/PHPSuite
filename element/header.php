<?php
session_start();
$_SESSION['role'] = 'admin';

require 'functions.php';
require 'data/config.php';
?>

<!doctype html>
<html lang="fr" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>
        <?php
        if (isset($title)) {
            echo $title;
        } else {
            echo 'Accueil';
        }
        ?>
    </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body class="d-flex h-100 text-center text-white bg-dark">

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="mb-auto">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/index.php">Mon site esstraordinaire</a>
                    <div class="collapse navbar-collapse" id="navbarColor01">
                        <ul class="navbar-nav me-auto">
                            <!-- <li class="nav-item">
                                <a class="nav-link <?php if ($_SERVER['SCRIPT_NAME'] === '/index.php') : ?>active<?php endif ?>" href="/index.php">Accueil</a>
                            </li> -->
                            <?= menuItemGlow('/index.php', 'Accueil') ?>
                            <?= menuItemGlow('/contact.php', 'Contact') ?>
                            <?= menuItemGlow('/jeu.php', 'Jeu') ?>
                            <?= menuItemGlow('/glaces.php', 'Glaces') ?>
                            <?= menuItemGlow('/newsletter.php', 'Newsletter') ?>
                            <?= menuItemGlow('/menu.php', 'Menu') ?>
                            <?= menuItemGlow('/cookies.php', 'Cookies') ?>
                            <?= menuItemGlow('/admin.php', 'Administration') ?>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <?php if (estConnecte()) : ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="/logout.php">Se déconnecter</a>
                                </li>
                            <?php endif ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>