<?php 
    /** 
     * Affichage du menu de statistiques des articles : liste des informations disponibles sur les articles.
     */
?>

<h2>Statistiques des articles</h2>

<div class="adminArticleStats">
    <table class="statsTable">
        <tr class="statsHead">
            <th class="statsTitle">Titre</th>
            <th class="statsValue">Vues</th>
            <th class="statsValue">Commentaires</th>
            <th class="statsValue">Date de publication</th>
        </tr>
        <?php foreach ($articles as $article) : ?>
            <tr class="statsRow">
                <td class="statsTitle"><?= htmlspecialchars($article->getTitle()) ?></td>
                <td class="statsValue"><?= htmlspecialchars($article->getViews()) ?></td>
                <td class="statsValue"><?= htmlspecialchars($article->getCommentCount()) ?></td>
                <td class="statsValue"><?= Utils::convertDateToFrenchFormat($article->getDateCreation()) ?></td>
            </tr>
        <?php endforeach ?>
    </table>
</div>