<?php 
    /** 
     * Affichage de la partie admin : liste des actions admin avec un bouton "accéder" pour chacune.
     */
?>

<h2>Administration</h2>

<div class="adminMain">
    <?php foreach ($adminActions as $action => $label) : ?>
        <div class="adminAction">
            <div class="title"><?= htmlspecialchars($label) ?></div>
            <div><a class="submit" href="index.php?action=<?= htmlspecialchars($action) ?>">Accéder</a></div>
        </div>
    <?php endforeach ?>
</div>