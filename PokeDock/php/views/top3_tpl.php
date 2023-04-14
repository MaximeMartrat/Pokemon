<?php
include('header_tpl.php');
?>
<style>
    body{
        background-color: #3A5DAF;
        height: 70vh;
        overflow:hidden;
    }
    #top3{
        height: 90%;
        width:98vw;
        margin-top:10%;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    h1{
        grid-row: 2;
        grid-column:2;
        text-align: center;
        text-shadow: 2px 5px 3px #1A2D5F; 
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
        box-shadow: 10px 10px 8px #1A2D5F;
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
    #ultrapokeball img{
        position: absolute;
        z-index:1;
        height:210px;
        width:210px;
        border-radius: 100%;
        animation: ultra 1.5s linear 0s infinite ;
    }
    #pockred img{
        position: absolute;
        height:200px;
        width:200px;
        border-radius: 100%;
        animation: pocke 1.8s ease-in 0s infinite ;
    }
    #pockblue img{
        position: absolute;
        height:200px;
        width:200px;
        border-radius: 100%;
        animation: pocke 2.5s ease-out 0s infinite ;
    }
    @keyframes ultra {
        0% {
            top:80%;
            left:-10%;
        }
        100% {
            top:80%;
            left:110%;
            transform: rotate(480deg);
        }
    }
    @keyframes pocke {
        0% {
            top:80%;
            left:110%;
            transform: rotate(360deg);
        } 
        100% {
            top:80%;
            left:-15%;
        }
    }
</style>
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
                <th>Score</th>
            </tr>
            </thead>
            <tbody>
            <?php $count = 1 ?>    
            <?php foreach($_SESSION['topScore'] as $combat): ?>  
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td><?= $combat['Pseudo'] ?></td>
                    <td><?= $combat['Score'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>    
<?php
    include('footer_tpl.php');
?>