<?php
include('header_tpl.php');
?>

<body class="top3_container">

    <div id='ultrapokeball'><img src="/views/assets/images/ultra-ball.png"></div>
    <div id="pockred"><img src="/views/assets/images/pokeballred.png"></div>
    <div id="pockblue"><img src="/views/assets/images/pokeballblue.png"></div>
    <div id="top3">
        <h1>TOP 3</h1>
        <table>
            <thead>
                <tr>
                    <th>Place</th>
                    <th>Joueur</th>
                    <th>Total Combats</th>
                    <th>Score</th>
                    <th>Moyenne</th>
                </tr>
            </thead>
            <tbody>
                <?php $count = 1 ?>
                <?php foreach ($_SESSION['topScore'] as $combat): ?>
                    <tr>
                        <td>
                            <?php echo $count++; ?>
                        </td>
                        <td>
                            <?= $combat['Pseudo'] ?>
                        </td>
                        <td>
                            <?= $combat['NombreDeCombats'] ?>
                        </td>
                        <td>
                            <?= $combat['Score'] ?>
                        </td>
                        <td>
                            <?= number_format($combat['AverageScore'] * 100) ?>%
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php
    include('footer_tpl.php');
    ?>