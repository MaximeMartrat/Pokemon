<?php
    include('header_tpl.php');
    //recupération du params 2 dans l'URL pour identifier joueur1 ou joueur2
    $params = explode('/', $_GET['p']);
    $param = $params['2'];
?>
<body class='pokemon_body'>

    <div class="pokemon_container">
        <!-- si  joueur1 sur la page -->
        <?php if($param == 1):?>
            <!-- titre = nom joueur1 -->
            <h1 class='poke_user'><?= $_SESSION['joueur1'] ?></h1>
        <?php else: ?>
            <!-- sinon titre = nom joueur2 -->
            <h1 class='poke_user'><?= $_SESSION['joueur2'] ?></h1>
        <?php endif; ?>
        <!-- si joueur 2 connecté affiché deuxième bouton -->
        <?php if(isset($_SESSION['joueur2'])): ?>
            <style>#play2{ display: inline ; }</style>
        <?php endif; ?>
        <div id="form_div">
            <form method="POST" action="/Select/select_pokemon/<?= $param ?>">
                <table id='table_pokemon'>
                    <thead>
                        <tr>
                            <th>Pokemon</th>
                            <th>PV</th>
                            <th>Pvmax</th>
                            <th>PC</th>
                            <th>Type</th>
                            <th><img id="balle" src="/views/assets/images/balle.png"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($_SESSION['pokemons'] as $pokemon): ?>  
                            <tr id="tr<?= $pokemon['Id_pokemon'] ?>">
                                <td><?= $pokemon['Nom'] ?></td>
                                <td><?= $pokemon['PV'] ?></td>
                                <td><?= $pokemon['Pvmax'] ?></td>
                                <td><?= $pokemon['PC'] ?></td>
                                <td class="type"><?= $pokemon['Type'] ?></td>
                                <!-- si la FK d'un pokemon n'est pas null pokemon déja sélectionné -->
                                <?php if($pokemon['Id_Joueur_Fk'] != NULL): ?>
                                    <!-- afficher un check à la place du bouton de sélection -->
                                    <td style="color:red;"><i class="fa-solid fa-check fa-beat"></i></td>    
                                <?php else: ?>
                                    <!-- sinon afficher le bouton de sélection -->
                                    <td><button class='select-one-pokemon' name='pokemon' value="<?= $pokemon['Nom'] ?>">OK</button></td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </form>
            <div id="player_div">
                <!-- si joueur 2 connecté -->
                <?php if(isset($_SESSION['joueur2'])) : ?>
                    <!-- afficher bouton d'affichage de selection de pokemon -->                
                    <a id='play1' class="player" href="/Accueil/displayAll/1"><?= $_SESSION['joueur1'] ?></a>
                    <a id='play2' class="player" href="/Accueil/displayAll/2"><?= $_SESSION['joueur2'] ?></a>
                    <?php if(isset($_SESSION['joueur2']) && isset($_SESSION['pokemon1']) && isset($_SESSION['pokemon2'])) :?>
                        <a id='start_button' class="player" href="/Combat/index">Fight</a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    <?php
    //si param1
    if($param == '1') {
        //si pokemon sélectionné
        if(isset($_SESSION['Id_Pokemon'])){      
            //id du pokemon selectionné = variable session idpok1
            $_SESSION['id_pokemon1'] = $_SESSION['Id_Pokemon'];
            //pokemon selectionné = variable de session pok1
            $_SESSION['pokemon1'] = serialize($_SESSION['pokemon_select']);
        }
    }
    //si param2
    if($param == '2') {
        //si pokemon sélectionné
        if(isset($_SESSION['Id_Pokemon'])){
            //id du pokemon selectionné = variable session idpok2
            $_SESSION['id_pokemon2'] = $_SESSION['Id_Pokemon'];
            //pokemon selectionné = variable de session pok2
            $_SESSION['pokemon2'] = serialize($_SESSION['pokemon_select']);
        }
    }
    ?>
</div>
<script>
    //recupération de la colonne type pour affichage custom
    let types = document.getElementsByClassName('type');
    //boucles sur toutes les cases types du tableau
    for(let i = 0; i < types.length; i++) {
        let type = types[i].innerText;
        switch(type) {
            //changement de couleur des cases en fonction des types
            case 'FEU': types[i].style.background = '#F75231'; 
            break;
            case 'EAU': types[i].style.background = '#399CFF';
            break;
            case 'PLANTE': types[i].style.background = '#7BCE52';
            break;
            default: types[i].style.background = '#EDCE61';
            break;
        }
    }   
</script>

<?php
    include('footer_tpl.php');
?>

