<?php
include('header_tpl.php');
$params = explode('/', $_GET['p']);
//recupération du param 2 pour identifier joueur 1 ou 2 sur la page
$param = $params['2'];
if($params['2'] == 1) {
    $play = 1;
} else {
    $play = 2;
}
?>

<style>
    body{
        background-color: #3A5DAF;
    }
    h1{
        text-align: center;
        color: #C0BB05;
    }
    #combat_container{
        height: 90vh;
        width:100vw;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    table {
        border-radius: 10px;
        border: 2px solid #3A5DAF;
        background-color: #3A5DAF;
        overflow: hidden;
        border-collapse: collapse;
        font-size: 20px;
        text-align: center;
    }
    th, td{
        background-color: white;
        border: 1px solid #3A5DAF;
        height: 30px;
        width: 200px;
    }
    th{
        background-color: #EDCE61;
    }
    #form_select_combat_joueur{
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

 

<div id="combat_container">
<?php 
// Initialisez une variable pour stocker la somme des scores des joueurs
$totalScoreJ1 = 0;
$totalScoreJ2 = 0;
?>
<?php if($play == 1): ?>
    <h1><?= $_SESSION['joueur1'] ?></h1>
<?php else: ?>
    <?php if(isset($_SESSION['joueur2'])): ?>
        <h1><?= $_SESSION['joueur2'] ?></h1>
    <?php else: ?>
        <h1>Ordi</h1>
    <?php endif; ?>
<?php endif; ?>
    <table>
        <thead>
            <tr>
                <th>Combat</th>
                <th>Pokemon joueur</th>
                <th>Pokemon adversaire</th>
                <th>Score</th>

            </tr>
            </thead>
            <tbody>
            <?php $count =1 ?>
            <?php foreach($_SESSION['combatsbyid'] as $combat): ?>  
                <tr>
                    <td><?= $count++ ?></td>
                    <?php if($param === $combat['Joueur1']): ?>
                        <td><?= $combat['pokemon1'] ?></td>
                        <td><?= $combat['pokemon2'] ?></td>
                        <td><?= $combat['Score_J1'] ?></td>
                        <?php 
                            // Ajoutez le score actuel du joueur 1 à la variable totalScoreJ1
                            $totalScoreJ1 += $combat['Score_J1'];
                        ?>
                        
                    <?php else: ?>
                        <td><?= $combat['pokemon2'] ?></td>
                        <td><?= $combat['pokemon1'] ?></td>
                        <td><?= $combat['Score_J2'] ?></td>

                        <?php 
                            // Ajoutez le score actuel du joueur 1 à la variable totalScoreJ1
                            $totalScoreJ2 += $combat['Score_J2'];
                        ?>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
            <?php if($play == 1): ?>            
                <tr><td colspan='3'>TOTAL</td><td><?= $totalScoreJ1 ?></td></tr>
            <?php else: ?>    
                <tr><td colspan='3'>TOTAL</td><td><?= $totalScoreJ2 ?></td></tr>
            <?php endif; ?>    
            
            <?php if(isset($_SESSION['joueur1']) && isset($_SESSION['joueur2'])): ?>
                <?php endif; ?>
            </tbody>
        </table>
        <!-- si joueur1 connecté affichage du bouton des stats du joueur1 avec son nom -->
        <?php if(isset($_SESSION['joueur1'])): ?>
            <div id='form_select_combat_joueur'>
            <form action="/Combat/displayCombatsById/<?= $_SESSION['id1'] ?>" method="POST">
                <button class="button_display_combat" type="submit">Stats <?= $_SESSION['joueur1'] ?></button>
            </form>
            <!-- si joueur2 connecté affichage du bouton des stats du joueur2 avec son nom -->
            <?php if(isset($_SESSION['joueur2'])) : ?>
                <form action="/Combat/displayCombatsById/<?= $_SESSION['id2'] ?>" method="POST">
                    <button class="button_display_combat" type="submit">Stats <?= $_SESSION['joueur2'] ?></button>
                </form>
            <!-- si session random affichage du bouton des stats de l'ordi -->
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
