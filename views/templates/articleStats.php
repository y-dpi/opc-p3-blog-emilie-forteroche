<?php 
    /** 
     * Affichage du menu de statistiques des articles : liste des informations disponibles sur les articles.
     */
?>

<?php 
/**
 * Configuration de la template pour de potentielles modifications futurs.
 */
$tableContents = [
    "title" => "Titre",
    "views" => "Vues",
    "comment_count" => "Commentaires",
    "date_creation" => "Date de publication",
]
?>

<h2>Statistiques des articles</h2>

<div class="adminArticleStats">
    <table class="statsTable">
        <tr class="statsHead">
            <?php foreach ($tableContents as $tableContentKey => $tableContent) : ?>
                <th class="<?= ($tableContentKey === "title") ? "statsTitle" : "statsValue" ?>"<?= ($sortBy === $tableContentKey) ? (' data-sort-by="' . htmlspecialchars($sortOrder) . '"') : "" ?>>
                    <a href="index.php?action=articleStats<?= Utils::formatSortParameters($tableContentKey, $sortBy, $sortOrder) ?>"><?= $tableContent ?></a>
                </th>
            <?php endforeach ?>
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