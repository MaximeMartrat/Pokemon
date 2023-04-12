<?php
include('header_tpl.php');
$params = explode('/', $_GET['p']);
if(isset($params['2'])) {
    $param = $params['2'];
}
?>
<style>
    #all_combat_container{
        height: 90vh;
        width:100vw;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    h1{
        text-align: center;
    }
    table {
        border-radius: 10px;
        border: 2px solid black;
        background-color: black;
        overflow: hidden;
        border-collapse: collapse;
        font-size: 20px;
        text-align: center;
    }
    th, td{
        background-color: white;
        border: 1px solid black;
        height: 30px;
        width: 200px;
    }
    th{
        background-color: #EDCE61;
    }
    #form_display_combat{
        display: flex;
        margin-top:50px;
    }
    .button_display_combat{
        padding:10px;
        margin: 10px;
        background-color: #ED1C24;
        color:white;
        border: 2px solid #ED1C24;
        border-radius: 5px;
        text-decoration: none;
     }
    .button_display_combat:hover{
        background-color: white;
        color: black;
    }
</style>
<div id='all_combat_container'>
    <h1>Stats des Combats</h1>
    <table>
        <thead>
            <tr>
                <th>Combat</th>
                <th>Joueur 1</th>
                <th>Pokemon J1</th>
                <th>Score J1</th>
                <th>Joueur 2</th>
                <th>Pokemon J2</th>
                <th>Score J2</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($_SESSION['combats'] as $combat): ?>  
                <tr>
                    <td><?= $combat['Id_combat'] ?></td>
                    <td><?= $combat['joueur1'] ?></td>
                    <td><?= $combat['pokemon1'] ?></td>
                    <td><?= $combat['Score_J1'] ?></td>
                    <td><?= $combat['joueur2'] ?></td>
                    <td><?= $combat['pokemon2'] ?></td>
                    <td><?= $combat['Score_J2'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <!--Si joueur 1 connecté affichage du bouton de selection de ses stats-->
    <?php if(isset($_SESSION['joueur1'])): ?>
    <div id='form_display_combat'>
        <form action="/Combat/displayCombatsById/<?= $_SESSION['id1'] ?>" method="POST">
            <button class="button_display_combat" type="submit">Stats <?= $_SESSION['joueur1'] ?></button>
        </form>
        <!-- si joueur 2 connecté affichage du bouton de sélection de ses stats -->
        <?php if(isset($_SESSION['joueur2'])) : ?>
        <form action="/Combat/displayCombatsById/<?= $_SESSION['id2'] ?>" method="POST">
            <button class="button_display_combat" type="submit">Stats <?= $_SESSION['joueur2'] ?></button>
        </form>
        <!-- si jeu solo affichage bouton stat ordi -->
        <?php elseif(isset($_SESSION['random'])): ?>
        <form action="/Combat/displayCombatsById/99" method="POST">
            <button class="button_display_combat" type="submit">Stats Ordi</button>
        </form>
        <?php endif; ?>
    </div>
    <?php endif; ?>
    
</div>
<?php
include('footer_tpl.php');
?>

