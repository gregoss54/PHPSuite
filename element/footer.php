<?php
ajouterVue();
$vues = nombreVues();
?>

<footer class="mt-auto text-white-50" id="black">
    <p>Nombre de visite<?php if ($vues > 1): ?>s<?php endif ?> sur le site : <?= $vues ?></p>
    <p>Made with &#9829; from <a href="https://www.nancy.fr" class="text-white" target="_blank">Nancy</a></p>
</footer>
</div>

</body>

</html>