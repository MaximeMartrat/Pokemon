<?php
include('header_tpl.php');
?>
<style>
    h1{
        color: #ED1C24;
    }
    body{
        height: 80vh;
        width: 98vw;
        background-image: url('views/assets/images/Pokémon-simbolo.jpg');
        background-size: cover;
        overflow: hidden;
    }
    #loggin_container{
        height: 90vh;
        display:grid;
        justify-content: center;
        grid-template-columns: 30% 10% 20% 10% 30%;
        grid-template-rows: 10% 20% 20% 20% 20%;
    }
    #select_play{
        grid-row: 2;
        grid-column: 3;
    }
    #select_play button{
        height: 50px;
        width: 80px;
        margin-left: 20%;
        padding:10px;
        background-color: #FFCB05;
        color:black;
        border: 2px solid #ED1C24;
        border-radius: 5px;
        text-decoration: none;
        box-shadow: 5px 5px 8px #1A2D5F;
    }#select_play button:hover{
        background-color: #ED1C24;
        color: #FFCB05;
    }
    #joueur1_container{
        grid-row: 3;
        grid-column: 2;
        display: none;
        width: 220px;
        height: 220px;
        border: 3px solid red;
        background: linear-gradient(to bottom, red 50%, white 50%);
        box-shadow: 2px 10px 10px #23386B;
        border-radius: 100%;
        text-align: center;
    }
    #joueur2_container{
        grid-row: 3;
        grid-column: 4;
        display: none;
        width: 220px;
        height: 220px;
        border: 3px solid #3A5DAF;
        background: linear-gradient(to bottom, #3A5DAF 50%, white 50%);
        box-shadow: 2px 10px 10px #23386B;
        border-radius: 100%;
        text-align: center;
    }
    #start{
        grid-row: 4;
        grid-column: 3;
        margin-top: 5%;
        margin:auto;
        width: 220px;
        height: 220px;
        border: 3px solid #1F3871;
        background-color: #3A5DAF;
        box-shadow: 2px 10px 10px #23386B;
        border-radius: 100%;
        text-align: center;
    }
    
    #welcome{
        text-align: center;
        margin-top : 2%;
    }
    #start_button img{
       height:100px;
       width:100px;

    }
    .pokeball{
        height:80px;
        width:80px;
        border-radius: 100%;
        box-shadow: 2px 5px 10px #23386B; 
    }
    .pokeball:hover{
        height:90px;
        width:90px;
    }
    #start_button img:hover{
        height:120px;
        width:120px;
    }
    a{
        text-decoration: none;
    }
    h2{
      text-align: center;
      color:black;
      text-shadow: 2px 5px 10px #23386B;  
    }
    .button_select_poke{
        height:120px;
    }
    #form1 input, #form2 input{
        margin:auto;
        border-radius: 5px;
        height: 30px;
        background-color: white;
    }
    #form1 input:focus, #form2 input:focus{
        outline:  none;
        background-color: #F7F7F8;
    }
    #submit1, #submit2 {
        margin:auto;
        margin-top: 10px;
        background-color: red;
        border-radius: 5px;
        height: 30px;
        width:40px;
        box-shadow: 0px 3px 5px #23386B;
    }
    #submit1{
        background-color: #FFFFFF;
        border: 1px solid black;
        color:red;
    }
    #submit2{
        background-color: #FFFFFF;
    }
    #submit1:hover {
        background-color: red;
        color:white;
    }
    #submit2:hover{
        background-color: #3A5DAF;
        border: 1px solid #3A5DAF;
        color: white;
        box-shadow: 0px 0px 5px #23386B;
    }
    #pocketred{
        position: absolute;
        height:200px;
        width:200px;
        top:-40%;
        border-radius: 100px;
        animation: 0.7s ease-in 0s infinite alternate poketred;
    }
    #pocketred img{
        height: 100%;
        width:100%;
    }
    #blueShadow, #redShadow{
        background-color: black;
        opacity: 0.2;
        position: absolute;
        z-index:-1;
        height:200px;
        width:200px;
        top:-40%;
        border-radius: 100px;
    }
    #blueShadow{
        animation: 0.8s ease 0s infinite alternate blue1;
    }
    #redShadow{
        animation: 0.7s ease-in 0s infinite alternate red1;
    }
    #pocketblue{
        position: absolute;
        height:200px;
        width:200px;
        top:-40%;
        border-radius: 100px;
        animation: 0.8s ease 0s infinite alternate poketblue;
    }
    #pocketblue img{
        height: 100%;
        width:100%;
    }
    @keyframes poketred {
        from {
            top:20%;
            left:10%;
            height:200px;
            border-radius: 100px;
            }

        90%{
            height:180px;
            border-radius: 95px;
        }
        to {
            top:84%;
            left:10%;
            height:150px;
            border-radius:90px;
        }
    
    }
    @keyframes red1 {
        from {
            top:35%;
            left:12%;
            height:210px;
            width:210px;
            border-radius: 100%;
            }

        90%{
            height:180px;
            width:180px;
            border-radius: 98%;
        }
        to {
            opacity: 0.6;
            top:84%;
            left:11%;
            height:150px;
            width:150px;
            border-radius:95%;
        }
    
    }
    @keyframes poketblue {
        from {
            top:85%;
            left:80%;
            height:130px;
            border-radius: 80px;
            }
        10% {
            height:180px;
            border-radius: 90px;
        }
        to {
            top:5%;
            left:80%;
            height:200px;
            border-radius:100px;
        }
    
    }
    @keyframes blue1 {
        from {
            opacity: 0.8;
            top:86%;
            left:82%;
            height:100px;
            width: 100px;
            border-radius: 80%;
            }
        10% {
            height:150px;
            width: 150px;
            border-radius: 80%;
        }
        50%{
            height: 210px;
            width: 210px;
        }
        to {
            top:25%;
            left:82%;
            height:220px;
            width:220px;
            border-radius:100%;
        }
    
    }
</style>
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
    <div id="joueur1_container">
    <!--Si session joueur 1 existe afficher le nom joueur1 -->
    <?php if(isset($_SESSION['joueur1'])): ?>
        <h2><?= $_SESSION['joueur1'] ?></h2>
    <? else : ?>
        <h2>J1</h2>
    <?php endif; ?>
        <form name='form1' id='form1'action="/Signin/checkJoueur" method='POST'>
            <input type="text" name="Pseudo">
            <input type="password" name="password">
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
            <input type="text" name="Pseudo">
            <input type="password" name="password">
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