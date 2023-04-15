<?php
include('views/header_tpl.php');
?>
<body class="accueil">
<!-- barre de nav dans les menus -->
<div id="pocketred"><img src="views/assets/images/pokeballred.png"></div>
<div id="pocketblue"><img src="views/assets/images/pokeballblue.png"></div>
<div id="redShadow"></div>
<div id="blueShadow"></div>
<!--Si mode solo sélectionné au rechargement de la page alors affichage du container joueur1-->
<?php if(isset($_SESSION['random'])): ?>
    <style>#joueur1_container{ display:block; }</style>
<?php elseif(isset($_SESSION['joueur2'])): ?>
    <style>#joueur1_container, #joueur_container2{ display:block; }</style>
<?php else: ?>
    <style>#joueur1_container, #joueur_container2{ display:none; }</style>
<?php endif; ?>
<div id="loggin_container">
    <div id="select_play">
        <button type='text' id='solo'>SOLO</button>
        <button type='text' id='duo'>DUO</button>
    </div>
    <h1><?php $message ?></h1>
    <div id="joueur1_container">
    <!--Si session joueur 1 existe afficher le nom joueur1 -->
    <?php if(isset($_SESSION['joueur1'])): ?>
        <h2><?= $_SESSION['joueur1'] ?></h2>
    <? else : ?>
        <h2>J1</h2>
    <?php endif; ?>
        <form name='form1' id='form1'action="/Signin/checkJoueur" method='POST'>
            <input type="text" name="Pseudo" required>
            <input type="password" name="password" required>
            <button type="submit" name="submit1" id="submit1">OK</button>
        </form>
        <!-- Si joueur 1 selectionné caché formulaire et afficher bouton selection pokemon -->
        <?php if (isset($_SESSION['joueur1'])) { ?>
            <style> #form1{ display:none }
            </style>
            <div class='button_select_poke'>
                <a href="/Accueil/displayAll/1" class="select-pokemon" id="select1"><img class="pokeball" src="/views/assets/images/pokeballred.png"></a>
            </div>
                <?php } ?>
    </div>
    <div id="joueur2_container">
    <!--si session joueur2 existe afficher nom joueur2-->
    <?php if (isset($_SESSION['joueur2'])): ?>
        <h2><?= $_SESSION['joueur2'] ?></h2>
        <?php if(isset($_SESSION['random'])){
            unset($_SESSION['random']);
            } ?>
    <? else : ?>
        <h2>J2</h2>
    <?php endif; ?>
        <form name='form2' id ='form2' action="/Signin/checkJoueur" method='POST'>
            <input type="text" name="Pseudo" required>
            <input type="password" name="password" required>
            <button type="submit" name="submit2" id="submit2">OK</button>
        </form>
        <!-- Si joueur 2 selectionné afficher container, cacher le formulaire et afficher bouton selection pokemon -->
        <?php if (isset($_SESSION['joueur2'])) { ?>
            <style>
                #form2{ display:none; }
                #joueur2_container{ display:block; }
            </style>
            <div class='button_select_poke'>
                <a href="/Accueil/displayAll/2" class="select-pokemon" id="select2"><img class="pokeball" src="/views/assets/images/pokeballblue.png"></a>
            </div>
        <?php } ?>
    </div>
    <!--Si au moins un pokemon a été selectionné alors afficher le bouton start-->
    <?php if(isset($_SESSION['pokemon1'])): ?>
        <div id='start'>
            <h1>FIGHT</h1>
            <a id='start_button' href="/Combat/index"><img src="/views/assets/images/bats-toi.png"></a>
        </div>
    <?php endif; ?>
</div>
<script>
        //recuperation des varaiables du dom
    let solo = document.getElementById('solo');
    let duo = document.getElementById('duo');
    let log = document.getElementById('loggin_container');
    let joueur1 = document.getElementById('joueur1_container');
    let joueur2 = document.getElementById('joueur2_container');
    //action sur les boutons solo et duo pour affichage des divs
    solo.addEventListener('click', function() {
        if(joueur1.style.display ='none') {
            joueur1.style.display='block';
            joueur2.style.display='none';
            window.location.href= '/Select/select_random';
        }
    });
    duo.addEventListener('click', function() {
        if((joueur1.style.display ='none') || (joueur2.style.display='none')) {
            joueur1.style.display='block';
            joueur2.style.display='block';
        } 
    });
</script>
<?php
include('footer_tpl.php');
?>