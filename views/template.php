<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application de Recettes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="?action=accueil">Recettes</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                

                <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="?action=categorie">Catégories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?action=recette">Recettes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?action=user">Utilisateurs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?action=commentaire">Commentaire</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?action=dashboard">Mon espace</a>
                    </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?action=logout">Déconnexion</a>
                        </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="?action=default">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?action=addUser">Inscription</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?action=login">Connexion</a>
                    </li>    
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <?= isset($content) ? $content : 'Contenu non défini'; ?>
    </div>

    <footer class="footer mt-auto py-3 bg-light">
        <div class="container">
            <span class="text-muted"><p style="text-align:center">&copy; 2024 Application de Recettes. Tous droits réservés. Gloire BOBOTI - EASIG .</p></span>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
