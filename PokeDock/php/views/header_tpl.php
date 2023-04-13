<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/c68e41c693.js" crossorigin="anonymous"></script>
        <link  href="/views/assets/style.css" rel="stylesheet">
        <title>Pokemon</title>
    </head>
    <body>
    <style>
        .navigation{
            padding:10px;
            background-color: #FFCB05;
            color:black;
            border: 2px solid #3A5DAF;
            border-radius: 5px;
            text-decoration: none;
        }
        .navigation:hover{
            background-color: #3A5DAF;
            border: 2px solid #FFCB05;
            color: #FFCB05;
        }
        nav{
            margin-top: 50px;
            margin-left: 50px;
        }
        #container_form{
            display:flex;
            justify-content: center;
            margin-top: 10%;
        }

        form input {
            display: block;
        }
    </style>
    <!-- barre de nav dans les menus -->
    <nav>
        <a class="navigation" href="/Signin">Inscription</a>
        <a class="navigation" href="/Signin/deconnect">Deconnexion</a>
        <a class="navigation" href="/">Accueil</a>
        <a class="navigation" href="/Combat/displayCombats">Stats</a>
        <a class="navigation" href="/Combat/displayTop">Top3</a>
    </nav>



    