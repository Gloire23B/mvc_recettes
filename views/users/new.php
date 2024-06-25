<?php ob_start(); ?>

<h1>Ajouter un Nouvel Utilisateur</h1>

<form action="?action=addUser" method="post">
    <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" class="form-control" id="nom" name="nom" required>
    </div>
    <div class="form-group">
        <label for="prenom">Prénom</label>
        <input type="text" class="form-control" id="prenom" name="prenom" required>
    </div>
    <div class="form-group">
        <label for="login">Login</label>
        <input type="text" class="form-control" id="login" name="login" required>
    </div>
    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
    <a href="?action=user" class="btn btn-secondary">Annuler</a>
</form>

<?php
$content = ob_get_clean();
include 'views/template.php';
?>
