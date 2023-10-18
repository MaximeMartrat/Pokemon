<?php
include('header_tpl.php');
?>

<body class="accueil">
    <!-- barre de nav dans les menus -->
    <div id="pocketred"><img src="views/assets/images/pokeballred.png"></div>
    <div id="pocketblue"><img src="views/assets/images/pokeballblue.png"></div>
    <div id="redShadow"></div>
    <div id="blueShadow"></div>
    <!--Si mode solo sélectionné au rechargement de la page alors affichage du container joueur1-->
    <?php if (isset($_SESSION['random'])): ?>
        <style>
            #joueur1_container {
                display: block;
            }

            #solo {
                display: none;
            }
        </style>
    <?php elseif (isset($_SESSION['joueur2'])): ?>
        <style>
            #joueur1_container,
            #joueur_container2 {
                display: block;
            }

            #solo,
            #duo {
                display: none;
            }
        </style>
    <?php else: ?>
        <style>
            #joueur1_container,
            #joueur_container2 {
                display: none;
            }

            #solo,
            #duo {
                display: block;
            }
        </style>
    <?php endif; ?>
    <div id="loggin_container">
        <div id="select_play">
            <button type='text' id='solo'>SOLO</button>
            <button type='text' id='duo'>DUO</button>
            <h1>
                <?php $message ?>
            </h1>
            <div id="joueur1_container">
                <!--Si session joueur 1 existe afficher le nom joueur1 -->
                <?php if (isset($_SESSION['joueur1'])): ?>
                    <h2>
                        <?= strtoupper($_SESSION['joueur1']) ?>
                    </h2>
                <? else: ?>
                    <h2>J1</h2>
                <?php endif; ?>
                <form name='form1' id='form1' action="/Signin/checkJoueur" method='POST'>
                    <input type="text" name="Pseudo" id="connect-pseudo" required>
                    <div class="connexion">
                        <input type="password" name="password" id="connect-password" required>
                        <img src="views/assets/images/invisible.png" id="connect-eye" onClick="closeEye()">
                    </div>
                    <button type="submit" name="submit1" id="submit1">OK</button>
                </form>
                <!-- Si joueur 1 selectionné caché formulaire et afficher bouton selection pokemon -->
                <?php if (isset($_SESSION['joueur1'])) { ?>
                    <style>
                        #form1 {
                            display: none;
                        }

                        #solo {
                            display: none;
                        }

                        #joueur1_container {
                            display: block;
                        }
                    </style>
                    <div class='button_select_poke'>
                        <a href="/Accueil/displayAll/<?= $_SESSION['id1'] ?>" class="select-pokemon" id="select1"><img
                                class="pokeball" src="/views/assets/images/pokeballred.png"></a>
                    </div>
                <?php } ?>
            </div>
            <div id="joueur2_container">
                <!--si session joueur2 existe afficher nom joueur2-->
                <?php if (isset($_SESSION['joueur2'])): ?>
                    <h2>
                        <?= strtoupper($_SESSION['joueur2']) ?>
                    </h2>
                    <?php if (isset($_SESSION['random'])) {
                        unset($_SESSION['random']);
                    } ?>
                <? else: ?>
                    <h2>J2</h2>
                <?php endif; ?>
                <form name='form2' id='form2' action="/Signin/checkJoueur" method='POST'>
                    <input type="text" name="Pseudo" id="connect-pseudo2" required>
                    <div class="connexion">
                        <input type="password" name="password" id="connect-password2" required>
                        <img src="views/assets/images/invisible.png" id="connect-eye2" onClick="closeEye2()">
                    </div>
                    <button type="submit" name="submit2" id="submit2">OK</button>
                </form>
                <!-- Si joueur 2 selectionné afficher container, cacher le formulaire et afficher bouton selection pokemon -->
                <?php if (isset($_SESSION['joueur2'])) { ?>
                    <style>
                        #form2 {
                            display: none;
                        }

                        #duo {
                            display: none;
                        }

                        #joueur2_container {
                            display: block;
                        }
                    </style>
                    <div class='button_select_poke'>
                        <a href="/Accueil/displayAll/<?= $_SESSION['id2'] ?>" class="select-pokemon" id="select2"><img
                                class="pokeball" src="/views/assets/images/pokeballblue.png"></a>
                    </div>
                <?php } ?>
            </div>
            <!--Si au moins un pokemon a été selectionné alors afficher le bouton start-->
            <?php if (isset($_SESSION['pokemon1'])): ?>
                <?php if (isset($_SESSION['pokemon2']) || isset($_SESSION['random'])): ?>
                    <div id='start'>
                        <a id='start_button' href="/Combat/index"><img src="/views/assets/images/bats-toi.png"></a>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
    <script type="text/javascript">
        let connectPass1 = document.getElementById("connect-password");
        let connectEye1 = document.getElementById("connect-eye");
        let connectPass2 = document.getElementById("connect-password2");
        let connectEye2 = document.getElementById("connect-eye2");
        let eye = true;
        let eye2 = true;
        function closeEye() {
            if (eye) {
                connectPass1.setAttribute("type", "text");
                connectEye1.src = "views/assets/images/visible.png";
                eye = false;
            }
            else {
                connectPass1.setAttribute("type", "password");
                connectEye1.src = "views/assets/images/invisible.png";
                eye = true;
            }
        }
        function closeEye2() {
            if (eye2) {
                connectPass2.setAttribute("type", "text");
                connectEye2.src = "views/assets/images/visible.png";
                eye2 = false;
            }
            else {
                connectPass2.setAttribute("type", "password");
                connectEye2.src = "views/assets/images/invisible.png";
                eye2 = true;
            }
        }
    </script>
    <?php
    include('footer_tpl.php');
    ?>