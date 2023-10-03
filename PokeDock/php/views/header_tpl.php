<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <link href="../../views/assets/style.css?<?php echo time(); ?>" type="text/css" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/c68e41c693.js" crossorigin="anonymous"></script>
        <title>Pokemon</title>
    </head>
    <nav class="navigation">
        <button class="redirection" data-page="/">ACCUEIL</button>
        <button class="redirection" data-page="/Combat/displayCombats">STATS</button>
        <button class="redirection" data-page="/Combat/displayTop">TOP3</button>
        <button class="redirection" data-page="/Signin">INSCRIPTION</button>
        <button class="redirection" data-page="/Signin/deconnect">DECONNEXION</button>
    </nav>
    <script>
        // Sélectionnez tous les boutons avec la classe "redirection-button"
        const buttons = document.querySelectorAll('.redirection');

        // Ajoutez un gestionnaire d'événement à chaque bouton
        buttons.forEach(button => {
            button.addEventListener('click', () => {
                // Récupérez la valeur de l'attribut "data-page" du bouton
                const page = button.getAttribute('data-page');
                
                // Redirigez l'utilisateur vers la page correspondante
                window.location.href = `${page}`;
            });
        });
    </script>


    