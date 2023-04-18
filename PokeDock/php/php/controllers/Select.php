<?php

class Select extends Controller {

    public function select_pokemon($param) {
        //si param reçu 
        if(isset($param)){
            
            $joueur = $param;
            $pokemon = $_POST['pokemon'];
            //nouvelle instance de pokemonDAO
            $newPoke = new PokemonDAO;
            //recuperation de tout le tableau pokemon 
            $results = $newPoke->getAllPokemon();
            //boucle sur le tableau
            for($i=0; $i<count($results); $i++) {
                //si l'id du joueur existe dans les FK du tableau
                if($results[$i]['Id_Joueur_Fk'] === $joueur) {
                    //la FK est remise à null
                    $results[$i]['Id_Joueur_Fk'] = NULL;
                    $newPoke->clearPokemonSelected($results[$i]['Nom']);
                } 
                if($results[$i]['Nom'] === $pokemon) {
                    //sinon la FK = l'id du joueur
                    $results[$i]['Id_Joueur_Fk'] = $joueur;
                    $newPoke->pokemonSelected($joueur, $pokemon);
                    $idPokemonSelected = $results[$i]['Id_pokemon'];
                    //instanciation d'un objet pokemon avec valeurs récupérées
                    $newpokemon = new Pokemon($results[$i]['Nom'], intval($results[$i]['PV']), intval($results[$i]['Pvmax']), intval($results[$i]['PC']), $results[$i]['Type']);

                }
            }
            if((isset($_SESSION['random'])) && (!isset($_SESSION['joueur2']))){
                $this->select_random();
            }
            //recupération des resultats dans variables de session
            $_SESSION['pokemons'] = $results;
            $_SESSION['Id_Pokemon'] = $idPokemonSelected;
            $_SESSION['pokemon_select'] = $newpokemon;
            $this->render('pokemon_tpl');
        }

    }
    public function select_random() {
        $newPoke = new PokemonDAO;
        $results = $newPoke->randPokemon();
        //si variable de session joueur2 existe delete de la variable
        if((isset($_SESSION['joueur2'])) || (isset($_SESSION['pokemon2']))) {
            unset($_SESSION['joueur2']);
            unset($_SESSION['pokemon2']);
        }
        if(isset($_SESSION['random'])) {
            unset($_SESSION['random']);
        }

        //envoi des resultats dans une variabled de Session
        $_SESSION['random'] = $results;

        echo "<script>window.location.href='/'</script>";
    }
    

}

