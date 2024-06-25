<?php ob_start(); ?>

<h1>Liste des Utilisateurs</h1>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Login</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user->getId() ?></td>
                <td><?= $user->getNom() ?></td>
                <td><?= $user->getPrenom() ?></td>
                <td><?= $user->getLogin() ?></td>
                <td>
                    <a href="?action=updateUser&id=<?= $user->getId() ?>" class="btn btn-primary">Modifier</a>
                    <a href="?action=deleteUser&id=<?= $user->getId() ?>" class="btn btn-danger">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="?action=addUser" class="btn btn-success">Ajouter un Utilisateur</a>

<?php
$content = ob_get_clean();
include 'views/template.php';
?>
