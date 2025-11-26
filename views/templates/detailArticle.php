<?php
    /**
     * Ce template affiche un article et ses commentaires.
     * Il affiche également un formulaire pour ajouter un commentaire.
     */
?>

<article class="mainArticle">
    <h2> <?= Utils::format($article->getTitle()) ?> </h2>
    <span class="quotation">«</span>
    <p><?= Utils::format($article->getContent()) ?></p>

    <div class="footer">
        <span class="info"> Publié le <?= Utils::convertDateToFrenchFormat($article->getDateCreation()) ?></span>
        <?php if ($article->getDateCreation() != $article->getDateUpdate()) : ?>
            <span class="info"> Modifié le <?= Utils::convertDateToFrenchFormat($article->getDateUpdate()) ?></span>
        <?php endif ?>
    </div>
</article>

<div class="comments">
    <h2 class="commentsTitle">Vos Commentaires</h2>
    <?php 
        if (empty($comments)) {
            echo '<p class="info">Aucun commentaire pour cet article.</p>';
        } else {
            echo '<ul>';
            foreach ($comments as $comment) {
                echo '<li>';
                echo '  <div class="smiley">☻</div>';
                echo '  <div class="detailComment">';
                echo '      <h3 class="info">Le ' . Utils::convertDateToFrenchFormat($comment->getDateCreation()) . ", " . Utils::format($comment->getPseudo()) . ' a écrit :</h3>';
                echo '      <p class="content">' . Utils::format($comment->getContent()) . '</p>';
                if ($isAdmin) // Si on est connecté, on affiche le bouton de suppression, sinon, on affiche rien
                    echo '  <p class="delete"><a href="index.php?action=deleteComment&id=' . htmlspecialchars($comment->getId()) . '&redirect=' . htmlspecialchars($article->getId()) . '" ' . Utils::askConfirmation("Êtes-vous sûr de vouloir supprimer ce commentaire ?") .'>Supprimer le commentaire<a></p>';
                echo '  </div>';
                echo '</li>';
            }
            echo '</ul>';
        }
    ?>

    <form action="index.php" method="post" class="foldedCorner">
        <h2>Commenter</h2>

        <div class="formComment formGrid">
            <label for="pseudo">Pseudonyme</label>
            <input type="text" name="pseudo" id="pseudo" required>

            <label for="content">Commentaire</label>
            <textarea name="content" id="content" required></textarea>

            <input type="hidden" name="action" value="addComment">
            <input type="hidden" name="idArticle" value="<?= htmlspecialchars($article->getId()) ?>">

            <button class="submit">Ajouter un commentaire</button>
        </div>
    </form>
</div>