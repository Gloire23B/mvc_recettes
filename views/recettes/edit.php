<?php ob_start(); ?>

<h1>Modifier la Recette</h1>
<form action="?action=updateRecette" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $recette->getId() ?>">
    <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" class="form-control" id="nom" name="nom" value="<?= $recette->getNom() ?>" required>
    </div>
    <div class="form-group">
        <label for="photo">Photo</label>
        <input type="file" class="form-control" id="photo" name="photo">
        <img src="img/<?= $recette->getPhoto() ?>" alt="<?= $recette->getNom() ?>" style="width:100px;height:auto;">
    </div>
    <div class="form-group">
        <label for="origine">Origine</label>
        <input type="text" class="form-control" id="origine" name="origine" value="<?= $recette->getOrigine() ?>" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" rows="4" required><?= $recette->getDescription() ?></textarea>
    </div>
    <div class="form-group">
        <label for="id_categorie">Catégorie</label>
        <select class="form-control" id="id_categorie" name="id_categorie" required>
            <?php foreach ($categories as $categorie): ?>
                <option value="<?= $categorie->getId() ?>" <?= $recette->getIdCategorie() == $categorie->getId() ? 'selected' : '' ?>><?= $categorie->getNom() ?></option>
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
