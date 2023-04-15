<?php
include('header_tpl.php');
$params = explode('/', $_GET['p']);
if(isset($params['2'])) {
    $param = $params['2'];
}
?>
<body class="stats_combat_container">
    
<div id='all_combat_container'>
    <h1>Combats</h1>
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
            <?php $count = 1 ?>
            <?php foreach($_SESSION['combats'] as $combat): ?>  
                <tr>
                    <td><?= $count ++ ?></td>
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
            <button class="button_display_combat" type="submit"><?= $_SESSION['joueur1'] ?></button>
        </form>
        <!-- si joueur 2 connecté affichage du bouton de sélection de ses stats -->
        <?php if(isset($_SESSION['joueur2'])) : ?>
        <form action="/Combat/displayCombatsById/<?= $_SESSION['id2'] ?>" method="POST">
            <button class="button_display_combat" type="submit"><?= $_SESSION['joueur2'] ?></button>
        </form>
        <!-- si jeu solo affichage bouton stat ordi -->
        <?php elseif(isset($_SESSION['random'])): ?>
        <form action="/Combat/displayCombatsById/99" method="POST">
            <button class="button_display_combat" type="submit">Ordi</button>
        </form>
        <?php endif; ?>
    </div>
    <?php endif; ?>   
</div>
<?php
include('footer_tpl.php');
?>

