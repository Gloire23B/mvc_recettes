<?php ob_start(); ?>

<h1>Ajouter une Nouvelle Recette</h1>

<form action="?action=recetteAdd" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" class="form-control" id="nom" name="nom" required>
    </div>
    <div class="form-group">
        <label for="photo">Photo</label>
        <input type="file" class="form-control" id="photo" name="photo" required>
    </div>
    <div class="form-group">
        <label for="origine">Origine</label>
        <input type="text" class="form-control" id="origine" name="origine" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
    </div>
    <div class="form-group">
        <label for="id_categorie">Catégorie</label>
        <select class="form-control" id="id_categorie" name="id_categorie" required>
            <?php foreach ($categories as $categorie): ?>
                <option value="<?= $categorie->getId() ?>"><?= $categorie->getNom() ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
    <a href="?action=recette" class="btn btn-secondary">Annuler</a>
</form>


<?php
$content = ob_get_clean();
include 'views/template.php';
?>
