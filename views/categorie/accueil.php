<?php ob_start(); ?>

<h2>Liste des Catégories</h2>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $categorie): ?>
            <tr>

                <td><?= $categorie->getId() ?></td>
                <td><?= $categorie->getNom() ?></td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="?action=login" class="btn btn-success">Connectez-vous</a>

<?php
$content = ob_get_clean();
include 'views/template.php';
?>
