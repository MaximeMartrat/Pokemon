<style>
    body{
        margin-top: 10%;
        text-align: center;
        background-image: url('/views/assets/images/arene.jpg');
        background-repeat: no-repeat ;
        background-size: cover;
        font-size: 25px;
        color: white;
    }
    #battle{
        margin:auto;
        height:110px;
        width:180px;
    }
    
    h1{
        font-size: 40px;
        color: #ED1C24;
    }
    #button_match{
        padding:10px;
        margin: 10px;
        background-color: #ED1C24;
        color:white;
        border: 2px solid #ED1C24;
        border-radius: 5px;
    }
    #button_match:hover{
        background-color: white;
        color: black;
    }
    .redtext{
        color:red;
    }
    .greentext{
        color:green;
    }
    #pokemon1_img, #poke1_dead{
        position:absolute;
        height:300px;
        width:300px;
        border-radius:100%;
        margin-top:5%;
        left:18%;
    }
    #pokemon2_img, #poke2_dead{
        position:absolute;
        height:300px;
        width:300px;
        border-radius:100%;
        margin-top:5%;
        left:63%;
    }
    .pokemon_img{
        height:200px;
        width:200px;
        margin-left:30px;
        margin-top:30px;
    }
    .dead_img{
        height:200px;
        width:200px;
        margin-top:-25%;
    }
    .potion{
        animation: 0.5s ease 0s 2 alternate boitpotion;
    }
    .degat{
        animation: 0.5s ease 0s 2 alternate degat;
    }
    .attaque1 {
        animation: 0.5s ease 0s 2 alternate attaque1;
    }
    .attaque2 {
        animation: 0.5s ease 0s 2 alternate attaque2;
    }
    @keyframes boitpotion {
    from {
        margin-top:2%;
        background-color: #acdb96; 
        border: 40px double #acdb96; 
        }

    50%{
        margin-top:2%;
        height:220px;
        width:220px;
        background-color:#ff000000;
        border: 40px double limegreen;
    }
    to {
        margin-top:2%;
        background-color: #acdb96; 
        border: 40px double #acdb96;
    }

}
@keyframes degat {
    from {
        margin-top:2%;
        background-color: #fea33c; 
        border: 40px double #fea33c;
        }

    50%{
        margin-top:2%;
        height:200px;
        width:200px;
        border: 40px double red;
        background-color:#ff000000;
    }
    to {
        margin-top:2%;
        background-color:#fea33c;
        border: 40px double #fea33c;
    }

}
@keyframes attaque1 {
    from {
        left:20%;
        z-index:0;  
        }

    to {
        left:65%;
        z-index:1;
    }

}
@keyframes attaque2 {
    from {
        left:70%;
        z-index:0;
        }

    to {
        left:20%;
        z-index:1;
    }

}
</style>
<body>
    <div id="img_battle">
        <img id='battle' src="/views/assets/images/bataille.png"><br><br>
    <?php
        $pokemon1 = unserialize($_SESSION['pokemon1']);
            $nom1 = $pokemon1->nom;    
        //instanciation de classe pokemon1 avec variables recupérées comme arguments
        // $pokemon1 = new Pokemon($nom1, $pv1, $pvmax1, $pc1, $type1);
        //si session pokemon 2 existe boucle pour recupérer ses resultats et envoi dans des variables
        if(isset($_SESSION['pokemon2'])) {
            $pokemon2 = unserialize($_SESSION['pokemon2']);
            $nom2 = $pokemon2->nom;
        } else {
            //sinon recupération session random et envoi des résultats comme variables
            // var_dump($_SESSION['random']);
            foreach($_SESSION['random'] as $random) {
                $id2 = $random['Id_pokemon'];
                $nom2 = $random['Nom'];
                $pv2 = $random['PV'];
                $pvmax2 = $random['Pvmax'];
                $pc2 = $random['PC'];
                $type2 = $random['Type'];
            }
            $pokemon2 = new Pokemon($nom2, $pv2, $pvmax2, $pc2,$type2);
        }

        $image1 = "/views/assets/images/";
        $image2 = "/views/assets/images/";
        
        //instanciation de classe pokemon2 avec variables recupérées comme arguments
        // $pokemon2 = new Pokemon($nom2, $pv2, $pvmax2, $pc2, $type2);
        switch ($nom1) {
            case 'Salamèche' : $image1 .= 'salamèche.png';
            break;
            case 'Feunard' : $image1 .= 'feunard.jpg';
            break;
            case 'Magmar' : $image1 .= 'Magmar.png';
            break;
            case 'Poussifeu' : $image1 .= 'Poussifeu.png';
            break;
            case 'Carapuce' : $image1 .= 'Carapuce.png';
            break;
            case 'Tortank' : $image1 .= 'Tortank.png';
            break;
            case 'Magicarpe' : $image1 .= 'Magicarpe.png';
            break;
            case 'Concombaffe' : $image1 .= 'Concombaffe.png';
            break;
            case 'Saquedeneu' : $image1 .= 'Saquedeneu.png';
            break;
            case 'Gorythmic' : $image1 .= 'Gorythmic.png';
            break;
            case 'Jungko' : $image1 .= 'Jungko.png';
            break;
            case 'Tortipouss' : $image1 .= 'Tortipouss.png';
            break;
            case 'Pikachu' : $image1 .= 'Pikachu.png';
            break;
            case 'Elekable' : $image1 .= 'Elekable.png';
            break;
            case 'Lainergie' : $image1 .= 'Lainergie.png';
            break;
            default : $image1 .= 'Dynavolt.png';
            break;
        }
        switch ($nom2) {
            case 'Salamèche' : $image2 .= 'salamèche.png';
            break;
            case 'Feunard' : $image2 .= 'feunard.jpg';
            break;
            case 'Magmar' : $image2 .= 'Magmar.png';
            break;
            case 'Poussifeu' : $image2 .= 'Poussifeu.png';
            break;
            case 'Carapuce' : $image2 .= 'Carapuce.png';
            break;
            case 'Tortank' : $image2 .= 'Tortank.png';
            break;
            case 'Magicarpe' : $image2 .= 'Magicarpe.png';
            break;
            case 'Concombaffe' : $image2 .= 'Concombaffe.png';
            break;
            case 'Saquedeneu' : $image2 .= 'Saquedeneu.png';
            break;
            case 'Gorythmic' : $image2 .= 'Gorythmic.png';
            break;
            case 'Jungko' : $image2 .= 'Jungko.png';
            break;
            case 'Tortipouss' : $image2 .= 'Tortipouss.png';
            break;
            case 'Pikachu' : $image2 .= 'Pikachu.png';
            break;
            case 'Elekable' : $image2 .= 'Elekable.png';
            break;
            case 'Lainergie' : $image2 .= 'Lainergie.png';
            break;
            default : $image2 .= 'Dynavolt.png';
            break;
        }
        ?>
        <div id='pokemon1_img'><img class='pokemon_img' src="<?php echo $image1 ?>"></div>
        <div id='pokemon2_img'><img class='pokemon_img' src="<?php echo $image2 ?>"></div>
    </div>
    <div id="arene">
        <?php
        $attaque1 = TRUE; 
        $attaque2 = TRUE;
        // Compteur de tour de boucle
        $count = 0;
        //tant que pokemon 1 et 2 sont vivants combat continu
        while ($pokemon1->EstVivant() && $pokemon2->EstVivant()) {
            if ($pokemon1->EstVivant()) {
                //si les pv de pokemon1 sont inferieurs a ses pvmax
                if($pokemon1->get('pv') < ($pokemon1->get('pvmax')-50)) {
                    //pokemon 1 boitpotion
                    $pokemon1->BoitPotion(10);
                } else {
                    echo $pokemon1->get('nom'). " <span class='greentext'>a ". $pokemon1->get('pv'). " PV</span><br>";
                }
                //timer d'une seconde avant prochaine instance
                flush();
                sleep(1);
                echo "<script>pokemon1_img.removeAttribute('class', 'potion')</script>";
                //envoi de la methode attaque du pokemon1 et recupération dans une variable attaque1
                $attaque1 = $pokemon1->Attaque($pokemon2);
                flush();
                sleep(1.5);
                echo "<script>pokemon2_img.removeAttribute('class', 'attaque1')</script>";
                flush();
                sleep(1);
                echo "<script>pokemon2_img.removeAttribute('class', 'degat')</script>";
            }
            //si pokemon2 est vivant
            if ($pokemon2->EstVivant()) {
                //si les pv de pokemon2 sont inferieurs a ses pvmax
                if($pokemon2->get('pv') < ($pokemon2->get('pvmax')-50)) {
                    //pokemon 2 boitpotion
                    $pokemon2->BoitPotion(10);
                } else {
                    echo $pokemon2->get('nom'). " <span class='greentext'>a ". $pokemon1->get('pv'). " PV</span><br>";
                }
                //timer d'une seconde avant prochaine instance
                flush();
                sleep(1);
                echo "<script>pokemon2_img.removeAttribute('class', 'potion')</script>";
                //envoi de la methode attaque du pokemon2 et recupération dans une variable attaque2
                $attaque2 = $pokemon2->Attaque($pokemon1);
                sleep(1.0);
                flush(); 
                echo "<script>pokemon2_img.removeAttribute('class', 'attaque2')</script>";
                flush();
                sleep(1);
                echo "<script>pokemon1_img.removeAttribute('class', 'degat')</script>";
            }
            // Incrémentation du compteur
            $count++; 
            //si compteur >= 2
            if ($count >= 1) {
                // contenu de la page = string vide
                echo '<script>arene.innerHTML = "";</script>';
                // compteur = 0
                $count = 0;
            }
        }
        //si attaque1 retourne false pokemon2 est ko
        if($attaque1 === FALSE) {
            //pokemon 1 a gagné
            echo "<h1>". $pokemon1->get('nom') . " a gagné !</h1>";
            // recupération des scores dans variables de session
            $_SESSION['score1'] = 3;
            $_SESSION['score2'] = 0;
            ?>
            <script>pokemon2_img.style.display="none"</script>
            <div id="poke2_dead"><img class='dead_img' src="/views/assets/images/ko.png"></div>
            <?php
            
        } else {
            //sinon pokemon2 a gagné
            echo "<h1>" . $pokemon2->get('nom') . " a gagné !</h1>";
            //récupération des scores dans variable de session
            $_SESSION['score2'] = 3;
            $_SESSION['score1'] = 0;
            ?>
            <script>pokemon1_img.style.display="none"</script>
            <div id="poke1_dead"><img class='dead_img' src="/views/assets/images/ko.png"></div>
            <?php
        }
        //fin du combat
    ?>
</div>
<!-- formulaire caché pour envoi des scores et des infos du match avec post -->
<form action="/Combat/recordCombat" method="POST">
    <input name="Joueur1" type="hidden" value="<?= $_SESSION['id1']; ?>">
    <input type="hidden" name="Pokemon_J1" value="<?= $_SESSION['id_pokemon1']; ?>">
    <input type="hidden" name="Score_J1" value="<?= $_SESSION['score1']; ?>">
    <!-- si mode duo recupération des infos du joueur2 -->
    <?php if(isset($_SESSION['id2'])): ?>
        <input type="hidden" name="Joueur2" value="<?= $_SESSION['id2']; ?>">
        <input type="hidden" name="Pokemon_J2" value="<?= $_SESSION['id_pokemon2']; ?>">
        <input type="hidden" name="Score_J2" value="<?= $_SESSION['score2']; ?>">
        <?php else: ?>
            <!-- sinon recupération des infos ordi -->
            <input type="hidden" name="Joueur2" value="99">
            <input type="hidden" name="Pokemon_J2" value="<?= $id2 ?>">
            <input type="hidden" name="Score_J2" value="<?= $_SESSION['score2']; ?>">
            <?php endif; ?>
            <button id="button_match">Fin du match</button>
        </form>
        <!-- <script>
            let poke1 = document.getElementById('pokemon1_img');
        </script> -->
    </body>
    
    