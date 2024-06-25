<?php ob_start(); ?>

<h2>Ajouter un Commentaire</h2>

<form action="?action=addCommentaire" method="post">
    <div class="form-group">
        <label for="text">Texte</label>
        <input type="text" class="form-control" id="text" name="text" required>
    </div>
    <div class="form-group">
        <label for="date">Date</label>
        <input type="date" class="form-control" id="date" name="date">
    </div>
    <div class="form-group">
        <label for="id_user">ID Utilisateur</label>
        <select class="form-control" id="id_user" name="id_user" required>
            <?php foreach ($users as $user): ?>
                <option value="<?= $user->getId() ?>"><?= $user->getNom() ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="id_recette">ID Recette</label>
        <select class="form-control" id="id_recette" name="id_recette" required>
            <?php foreach ($recettes as $recette): ?>
                <option value="<?= $recette->getId() ?>"><?= $recette->getNom() ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>

<?php
$content = ob_get_clean();
include 'views/template.php';
?>
