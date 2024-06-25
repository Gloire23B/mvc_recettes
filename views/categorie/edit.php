<?php ob_start(); ?>

<h2>Modifier la Catégorie</h2>

<form action="?action=updateCategorie" method="post">
    <input type="hidden" name="id" value="<?= $categorie->getId() ?>">
    <div class="form-group">
        <label for="nom">Nom de la Catégorie</label>
        <input type="text" class="form-control" id="nom" name="nom" value="<?= $categorie->getNom() ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Modifier</button>
</form>

<?php
$content = ob_get_clean();
include 'views/template.php';
?>
