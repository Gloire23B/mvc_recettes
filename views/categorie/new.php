<?php ob_start(); ?>

<h2>Ajouter une Nouvelle Catégorie</h2>

<form action="?action=categorieAdd" method="post">
    <div class="form-group">
        <label for="nom">Nom de la Catégorie</label>
        <input type="text" class="form-control" id="nom" name="nom" required>
    </div>
    <button type="submit" class="btn btn-success">Ajouter</button>
</form>

<?php
$content = ob_get_clean();
include 'views/template.php';
?>
