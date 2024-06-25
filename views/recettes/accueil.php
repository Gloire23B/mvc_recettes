<?php ob_start(); ?>

<h2>Liste des Recettes</h2>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Photo</th>
            <th>Origine</th>
            <th>Description</th>
            <th>Categorie</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($recettes as $recette): ?>
            <tr>
                <td><?= $recette->getId() ?></td>
                <td><?= $recette->getNom() ?></td>
                <td><img src="img/<?= $recette->getPhoto() ?>" alt="<?= $recette->getNom() ?>" style="width:100px;height:auto;"></td>
                <td><?= $recette->getOrigine() ?></td>
                <td><?= $recette->getDescription() ?></td>
                <td><?= $recette->getIdCategorie() ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<?php
$content = ob_get_clean();
include 'views/template.php';
?>
