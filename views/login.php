<?php ob_start(); ?>

<h2>Connexion</h2>

<?php if (isset($error)): ?>
    <div class="alert alert-danger">
        <?= htmlspecialchars($error, ENT_QUOTES) ?>
    </div>
<?php endif; ?>

<form action="?action=login" method="post">
    <div class="form-group">
        <label for="login">Login</label>
        <input type="text" class="form-control" id="login" name="login" required>
    </div>
    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary">Se connecter</button>
</form>

<?php
$content = ob_get_clean();
include 'views/template.php';
?>
