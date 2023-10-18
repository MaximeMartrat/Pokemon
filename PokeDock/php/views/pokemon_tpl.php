<?php
include('header_tpl.php');
//recupération du params 2 dans l'URL pour identifier joueur1 ou joueur2
$params = explode('/', $_GET['p']);
$param = $params['2'];
?>

<body class='pokemon_body'>

    <div class="pokemon_container">
        <!-- si  joueur1 sur la page -->
        <?php if ($param == 1 || $param == $_SESSION['id1']): ?>
            <!-- titre = nom joueur1 -->
            <h1 class='poke_user'>
                <?= strtoupper($_SESSION['joueur1']) ?>
            </h1>
        <?php else: ?>
            <!-- sinon titre = nom joueur2 -->
            <h1 class='poke_user'>
                <?= strtoupper($_SESSION['joueur2']) ?>
            </h1>
        <?php endif; ?>
        <!-- si joueur 2 connecté affiché deuxième bouton -->
        <?php if (isset($_SESSION['joueur2'])): ?>
            <style>
                #play2 {
                    display: inline;
                }
            </style>
        <?php endif; ?>
        <div id="form_div">
            <?php if ($param == $_SESSION['id1']): ?>
                <form method="POST" action="/Select/select_pokemon/<?= $_SESSION['id1'] ?>">
                <?php else: ?>
                    <form method="POST" action="/Select/select_pokemon/<?= $_SESSION['id2'] ?>">
                    <?php endif; ?>
                    <table id='table_pokemon'>
                        <thead>
                            <tr>
                                <th>Pokemon</th>
                                <th>PV</th>
                                <th>PC</th>
                                <th>Type</th>
                                <th><img id="balle" src="/views/assets/images/balle.png"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($_SESSION['pokemons'] as $pokemon): ?>
                                <tr id="tr<?= $pokemon['Id_pokemon'] ?>">
                                    <td class="colorType">
                                        <?= strtoupper($pokemon['Nom']) ?>
                                    </td>
                                    <td>
                                        <?= $pokemon['PV'] ?>
                                    </td>
                                    <td>
                                        <?= $pokemon['PC'] ?>
                                    </td>
                                    <td class="type">
                                        <?= $pokemon['Type'] ?>
                                    </td>
                                    <!-- si la FK d'un pokemon n'est pas null pokemon déja sélectionné -->
                                    <?php if ($pokemon['Id_Joueur_Fk'] != NULL): ?>
                                        <?php if ($pokemon['Id_Joueur_Fk'] == $_SESSION['id1']): ?>
                                            <!-- Afficher le check en rouge pour le joueur 1 -->
                                            <td class="player-check-red"><i class="fa-solid fa-check fa-beat"></i></td>
                                        <?php elseif ($pokemon['Id_Joueur_Fk'] == $_SESSION['id2']): ?>
                                            <!-- Afficher le check en bleu pour le joueur 2 -->
                                            <td class="player-check-blue"><i class="fa-solid fa-check fa-beat"></i></td>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <!-- sinon afficher le bouton de sélection -->
                                        <?php if ($param == $_SESSION['id1']): ?>
                                            <td class="td_button_select">
                                                <button class='select-one-pokemon-player-1' name='pokemon'
                                                    value="<?= $pokemon['Nom'] ?>" data-player="1">OK</button>
                                            </td>
                                        <?php elseif ($param == $_SESSION['id2']): ?>
                                            <td class="td_button_select">
                                                <button class='select-one-pokemon-player-2' name='pokemon'
                                                    value="<?= $pokemon['Nom'] ?>" data-player="2">OK</button>
                                            </td>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </form>
                <div id="player_div">
                    <!-- si joueur 2 connecté -->
                    <?php if (isset($_SESSION['joueur2'])): ?>
                        <!-- afficher bouton d'affichage de selection de pokemon -->
                        <a id='play1' class="player" href="/Accueil/displayAll/<?= $_SESSION['id1'] ?>">
                            <?= strtoupper($_SESSION['joueur1']) ?>
                        </a>
                        <a id='play2' class="player" href="/Accueil/displayAll/<?= $_SESSION['id2'] ?>">
                            <?= strtoupper($_SESSION['joueur2']) ?>
                        </a>
                        <?php if (isset($_SESSION['joueur2']) && isset($_SESSION['pokemon1']) && isset($_SESSION['pokemon2'])): ?>
                            <a id='start_button' class="player" href="/Combat/index">FIGHT</a>
                        <?php elseif (isset($_SESSION['pokemon1']) && isset($_SESSION['random'])): ?>
                            <a id='start_button' class="player" href="/Combat/index">FIGHT</a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
        </div>

    </div>
    <?php
    include('footer_tpl.php');
    ?>