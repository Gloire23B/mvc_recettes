<?php ob_start(); ?>

<h2>Liste des Commentaires</h2>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Texte</th>
            <th>Date</th>
            <th>ID Utilisateur</th>
            <th>ID Recette</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($commentaires as $commentaire): ?>
            <tr>
                <td><?= $commentaire->getId() ?></td>
                <td><?= $commentaire->getText() ?></td>
                <td><?= $commentaire->getDate() ?></td>
                <td><?= $commentaire->getIdUser() ?></td>
                <td><?= $commentaire->getIdRecette() ?></td>
                <td>
                    <a href="?action=updateCommentaire&id=<?= $commentaire->getId() ?>" class="btn btn-primary">Modifier</a>
                    <a href="?action=deleteCommentaire&id=<?= $commentaire->getId() ?>" class="btn btn-danger">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="?action=addCommentaire" class="btn btn-success">Ajouter un Commentaire</a>

<?php
$content = ob_get_clean();
include 'views/template.php';
?>
