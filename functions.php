<?php

function menuItemGlow(string $lien, string $titre): string {
    $classe = 'nav-link';
    if ($_SERVER['SCRIPT_NAME'] === $lien) {
        $classe .= ' active';
    }
    return  <<<HTML
            <li class="nav-item">
                <a class="$classe" href="$lien">$titre</a>
            </li>
            HTML;
}

function checkbox(string $name, string $value, array $data): string {
    $attribut = '';
    if (isset($data[$name]) && in_array($value, $data[$name])) {
        $attribut .= ' checked';
    }
    return <<<HTML
        <input type="checkbox" name="{$name}[]" value="$value" $attribut>
    HTML;
}

function radio(string $name, string $value, array $data): string {
    $attribut = '';
    $type = 'radio';
    if (isset($data[$name]) && $value === $data[$name]) {
        $attribut .= ' checked';
    }
    return <<<HTML
        <input type="$type" name="{$name}" value="$value" $attribut>
    HTML;
}

function creneauxHTML(array $creneaux): string {
    if (empty(count($creneaux))) {
        return 'Fermé';
    }
    $phrases = [];
    foreach ($creneaux as $creneau) {
        $phrases[] = "{$creneau[0]}h à {$creneau[1]}h";
    }
    return 'Ouvert de ' . implode(' et de ', $phrases);
}

// Compteur Vues intégré au Footer
function ajouterVue(): void {
    $fichier = __DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur';
    $fichierJournalier = $fichier . '-' . date('Y-m-d');
    incrementerCompteur($fichier);
    incrementerCompteur($fichierJournalier);
}

function incrementerCompteur(string $fichier): void {
    $compteur = 1;
    if (file_exists($fichier)) {
        $compteur = (int)file_get_contents($fichier);
        $compteur++;
    }
    file_put_contents($fichier, $compteur);
}

function nombreVues(): string {
    $fichier = __DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur';
    return file_get_contents($fichier);
}

// Authentification
function estConnecte(): bool {
    if (!session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    return !empty($_SESSION['connecte']);
}