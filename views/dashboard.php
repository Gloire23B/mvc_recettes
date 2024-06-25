<?php ob_start(); ?>

<style>
    .card-hover {
        transition: all 0.3s ease-in-out;
        overflow: hidden;
        max-height: 200px;
    }
    .card-hover:hover {
        max-height: 500px;
    }
    .card-body {
        display: none;
    }
    .card-hover:hover .card-body {
        display: block;
    }
</style>

<h1 style="text-align: center;">Bienvenue sur votre tableau de bord!</h1>
<br>
<p style="text-align: center;">découvrer de façon intuitive ce que nous vous proposons</p>
<br>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-3">
            <div class="card card-hover">
                <img src="img/img_recette.png" class="card-img-top" alt="Card image">
                <div class="card-body">
                    <h5 class="card-title">Recettes</h5>
                    <p class="card-text">This is a summary of the card. It provides more details about the content of the card.</p>
                    <a href="?action=recette" class="btn btn-primary">Voir nos Recettes</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-hover">
                <img src="img/img_carnet" class="card-img-top" alt="Card image">
                <div class="card-body">
                    <h5 class="card-title">Catégories</h5>
                    <p class="card-text">This is a summary of the card. It provides more details about the content of the card.</p>
                    <a href="?action=categorie" class="btn btn-primary">Voir mon Carnet</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-hover">
                <img src="img/img_commentaires.jpg" class="card-img-top" alt="Card image">
                <div class="card-body">
                    <h5 class="card-title">Commentaires</h5>
                    <p class="card-text">This is a summary of the card. It provides more details about the content of the card.</p>
                    <a href="?action=commentaire" class="btn btn-primary">Avis</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-hover">
                <img src="img/img_user.jpg" class="card-img-top" alt="Card image">
                <div class="card-body">
                    <h5 class="card-title">Profil</h5>
                    <p class="card-text">This is a summary of the card. It provides more details about the content of the card.</p>
                    <a href="?action=user" class="btn btn-primary">Gerer les utilisateurs</a>
                </div>
            </div>
        </div>
    </div>
</div>

<br><br>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function(){
        $(".card-hover").hover(
            function() {
                $(this).find(".card-body").slideDown(400);
            }, function() {
                $(this).find(".card-body").slideUp(300);
            }
        );
    });
</script>


<?php
$content = ob_get_clean();
include 'views/template.php';
?>


