<style>
    body{
        margin-top: 15%;
        text-align: center;
        background-image: url('/views/assets/images/arene.jpg');
        background-repeat: no-repeat ;
        background-size: cover;
        font-size: 25px;
        color: white;
    }
    #battle{
        margin-top:-10%;
        height:110px;
        width:180px;

    }
    h1{
        font-size: 40px;
        color: #ED1C24;
    }
    button{
        padding:10px;
        margin: 10px;
        background-color: #ED1C24;
        color:white;
        border: 2px solid #ED1C24;
        border-radius: 5px;
    }
    button:hover{
        background-color: white;
        color: black;
    }
    .redtext{
        color:red;
    }
    .greentext{
        color:green;
    }
</style>
<body>
<img id='battle' src="/views/assets/images/bataille.png">
<div id="arene">
<?php
//boucle pour recupérer la session pokemon1 et envoi des resultats dans des variables
foreach($_SESSION['pokemon1'] as $key => $value) {
    switch ($key) {
    
        case 'nom': $nom1 = $value; 
        break;
        case 'pv': $pv1 = $value;
        break;
        case 'pvmax': $pvmax1 = $value;
        break;
        case 'pc' : $pc1 = $value;
        break;
        case 'type' : $type1 = $value;
        break;
    }
};
//instanciation de classe pokemon1 avec variables recupérées comme arguments
$pokemon1 = new Pokemon($nom1, $pv1, $pvmax1, $pc1, $type1);

//si session pokemon 2 existe boucle pour recupérer ses resultats et envoi dans des variables
if(isset($_SESSION['pokemon2'])) {
    foreach($_SESSION['pokemon2'] as $key => $value) {
        switch ($key) {
            case 'nom': $nom2 = $value; 
            break;
            case 'pv': $pv2 = $value;
            break;
            case 'pvmax': $pvmax2 = $value;
            break;
            case 'pc' : $pc2 = $value;
            break;
            case 'type' : $type2 = $value;
            break;
        }
    };
} else {
    //sinon recupération session random et envoi des résultats comme variables
    foreach($_SESSION['random'] as $random) {
        $id2 = $random['Id_pokemon'];
        $nom2 = $random['Nom'];
        $pv2 = $random['PV'];
        $pvmax2 = $random['Pvmax'];
        $pc2 = $random['PC'];
        $type2 = $random['Type'];
    }
}
//instanciation de classe pokemon2 avec variables recupérées comme arguments
$pokemon2 = new Pokemon($nom2, $pv2, $pvmax2, $pc2, $type2);
$attaque1 = TRUE; 
$attaque2 = TRUE;
// Compteur de tour de boucle
$count = 0;
//tant que pokemon 1 et 2 sont vivants combat continu
while ($pokemon1->EstVivant() && $pokemon2->EstVivant()) {
    if ($pokemon1->EstVivant()) {
        //si les pv de pokemon1 sont inferieurs a ses pvmax
        if($pokemon1->get('pv') < $pokemon1->get('pvmax')) {
            //pokemon 1 boitpotion
            $pokemon1->BoitPotion(10);
        } else {
            echo $pokemon1->get('nom'). " <span class='greentext'>a ". $pokemon1->get('pv'). " PV</span><br>";
        }
        //timer d'une seconde avant prochaine instance
        sleep(1);
        flush();
        //envoi de la methode attaque du pokemon1 et recupération dans une variable attaque1
        $attaque1 = $pokemon1->Attaque($pokemon2);
        sleep(1);
        flush();
    }
    //si pokemon2 est vivant
    if ($pokemon2->EstVivant()) {
        //si les pv de pokemon2 sont inferieurs a ses pvmax
        if($pokemon2->get('pv') < $pokemon2->get('pvmax')) {
            //pokemon 2 boitpotion
            $pokemon2->BoitPotion(10);
        } else {
            echo $pokemon2->get('nom'). ' a '. $pokemon2->get('pv'). ' PV<br>';
        }
        //timer d'une seconde avant prochaine instance
        sleep(1);
        flush();
        //envoi de la methode attaque du pokemon2 et recupération dans une variable attaque2
        $attaque2 = $pokemon2->Attaque($pokemon1);
        sleep(1);
        flush(); 
    }
     // Incrémentation du compteur
    $count++; 
    //si compteur >= 2
    if ($count >= 2) {
        // contenu de la page = string vide
        echo '<script>document.body.innerHTML = "";</script>';
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

} else {
    //sinon pokemon2 a gagné
    echo "<h1>" . $pokemon2->get('nom') . " a gagné !</h1>";
    //récupération des scores dans variable de session
    $_SESSION['score2'] = 3;
    $_SESSION['score1'] = 0;

}
//fin du combat
?>
</div>
</body>
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
    <button>Fin du match</button>
</form>

