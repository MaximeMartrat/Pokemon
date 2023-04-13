<?php
include('header_tpl.php');
?>
<style>
    body{
        background-color: #3A5DAF;
    }
    #top3{
        height: 90vh;
        width:100vw;
        margin-top: 10%;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    h1{
        text-align: center;
        color: #C0BB05;
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
</style>
<div id="top3">
    <h1>TOP 3</h1>
    <table>
        <thead>
            <tr>
                <th>Place</th>
                <th>Joueur</th>
                <th>Score</th>
            </tr>
            </thead>
            <tbody>
            <?php $count = 1 ?>    
            <?php foreach($_SESSION['topScore'] as $combat): ?>  
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td><?= $combat['Nom'] ?></td>
                    <td><?= $combat['Score'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>    
<?php
    include('footer_tpl.php');
?>