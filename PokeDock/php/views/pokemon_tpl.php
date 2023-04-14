<?php
include('header_tpl.php');
//recupération du params 2 dans l'URL pour identifier joueur1 ou joueur2
$params = explode('/', $_GET['p']);
$param = $params['2'];
?>
<style>
    body{
        background-color: #3A5DAF;
    }
    #all_pokemon_container{
        height: 80vh;
        display: grid;
        grid-template-rows: 10% 20% 60% 10%;
        grid-template-columns: 20% 60% 20%;
    }
    h1{
        grid-row: 2;
        grid-column:2;
        text-align: center;
        text-shadow: 2px 5px 3px #1A2D5F; 
        color: #C0BB05;
    }
    #form_div{
        grid-row:3;
        grid-column:2;
    }
    table {
        border-radius: 10px;
        border: 2px solid #3A5DAF;
        background-color: #3A5DAF;
        overflow: hidden;
        border-collapse: collapse;
        font-size: 20px;
        text-align: center;
        box-shadow: 10px 10px 8px #1A2D5F;
    }
    th, td{
        background-color: white;
        border: 1px solid #3A5DAF;
        height: 20px;
        width: 200px;
    }
    .select-pokemon{
        width:200px;
        height: 100%;
        background-color: white;
        border: 1px solid white;
    }
    .select-pokemon:hover{
        background-color: #EDCE61;
        border: 1px solid #EDCE61;
    }
    .fa-brands{
        font-size: 50px;
    }
    th {
        background-color: #EDCE61;
    }
    a{
        text-decoration: none;
    }
    .player{
        padding:10px;
        background-color: #ED1C24;
        color:white;
        border: 2px solid #ED1C24;
        border-radius: 5px;
        text-decoration: none;
    }
    .player:hover{
        background-color: white;
        color: #ED1C24;
    }
    #player_div{
        grid-row:4;
        grid-column:2;
        margin:auto;
    }
    #play2{
        display: none;
    }
    #balle{
        height:40px;
        width:40px;
    }
</style>

<div id='all_pokemon_container'>
    <!-- si  joueur1 sur la page -->
    <?php if($param == 1):?>
        <!-- titre = nom joueur1 -->
        <h1><?= $_SESSION['joueur1'] ?></h1>
    <?php else: ?>
        <!-- sinon titre = nom joueur2 -->
        <h1><?= $_SESSION['joueur2'] ?></h1>
    <?php endif; ?>
    <!-- si joueur 2 connecté affiché deuxième bouton -->
    <?php if(isset($_SESSION['joueur2'])): ?>
        <style>#play2{ display: inline ; }</style>
    <?php endif; ?>
    <div id="form_div">
        <form method="POST" action="/Select/select_pokemon/<?= $param ?>">
            <table>
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
                                <td><button class='select-pokemon' name='pokemon' value="<?= $pokemon['Nom'] ?>">OK</button></td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </form>
    </div>
    <div id="player_div">
        <!-- si joueur 2 connecté -->
        <?php if(isset($_SESSION['joueur2'])) : ?>
            <!-- afficher bouton d'affichage de selection de pokemon -->                
            <a id='play1' class="player" href="/Accueil/displayAll/1"><?= $_SESSION['joueur1'] ?></a>
            <a id='play2' class="player" href="/Accueil/displayAll/2"><?= $_SESSION['joueur2'] ?></a>
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
        $_SESSION['pokemon1'] = $_SESSION['pokemon_select'];
    }
}
//si param2
if($param == '2') {
    //si pokemon sélectionné
    if(isset($_SESSION['Id_Pokemon'])){
        //id du pokemon selectionné = variable session idpok2
        $_SESSION['id_pokemon2'] = $_SESSION['Id_Pokemon'];
        //pokemon selectionné = variable de session pok2
        $_SESSION['pokemon2'] = $_SESSION['pokemon_select'];
    }
}
?>

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

