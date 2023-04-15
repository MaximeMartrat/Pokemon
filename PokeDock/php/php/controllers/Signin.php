<?php

class Signin extends Controller {

    
    public function index() {
        $this->render('inscription_tpl');
    }

    public function record() {
        
        $newPlayer = new JoueurDAO;
        if ($newPlayer->insert($_POST)) {
    
            $this->render('accueil_template');
        }
        else {
            echo "Ca n'a pas marché";
        }

    }

    public function checkJoueur() {

        $checkJoueur = new JoueurDAO;

        if($checkJoueur->verify($_POST)) {
            //redirection vers la page accueil
            echo "<script>window.location.href= '/'</script>" ;
                
        } else {

            //! rediriger vers l'acceuil avec un message
            echo "<h1>UTILISATEUR OU MOT DE PASSE INCONNU</h1><br><br><br>";
            echo "<h2><a href='/'>ACCUEIL</a></h2>";

        }

    }

    public function deconnect() {
        //delete des variables de session et redirection vers accueil
        $newPoke = new PokemonDAO;
        $newPoke->clearStat();
        session_unset();
        echo '<script>window.location.href = "/";</script>';
    }

    

}