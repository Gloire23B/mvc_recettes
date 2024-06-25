<?php ob_start(); ?>

<h2>Liste des Catégories</h2>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $categorie): ?>
            <tr>
                <td><?= $categorie->getId() ?></td>
                <td><?= $categorie->getNom() ?></td>
                <td>
                    <a href="?action=updateCategorie&id=<?= $categorie->getId() ?>" class="btn btn-primary">Modifier</a>
                    <a href="?action=deleteCategorie&id=<?= $categorie->getId() ?>" class="btn btn-danger">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="?action=categorieAdd" class="btn btn-success">Ajouter une Catégorie</a>

<?php
$content = ob_get_clean();
include 'views/template.php';
?>
