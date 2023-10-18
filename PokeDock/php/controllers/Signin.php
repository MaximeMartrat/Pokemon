<?php

class Signin extends Controller {

    
    public function index() {
        $this->render('inscription_tpl');
    }

    public function record() {
        
        $pseudo = $_POST['pseudo'];

        $newPlayer = new JoueurDAO;
        if ($newPlayer->checkPseudo($pseudo)) {
            $this->render('erreur_pseudo_tpl', ['pseudo' => $pseudo]);
            return false;
        }
        
        if ($newPlayer->insert($_POST)) {
            //redirection vers la page accueil
            $this->render('enregistrement_tpl', ['pseudo' => $pseudo]);
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
            echo "<script>
                    function allerVersAccueil() {
                        window.history.back();
                    }
                    window.addEventListener('load', function() {
                        const errorContainer = document.querySelector('.error_container');
                        errorContainer.classList.add('show');
                      });                      
                </script>";
            echo "<style>
                body{
                    display: flex;
                    justify-content: center;
                    align-items: flex-start;
                    font-family: 'Poppins', sans-serif;
                    height: 100vh;
                    width: 100vw;
                    z-index: -1;
                    background-image: url('../views/assets/images/Pokemon-Sleep.gif');
                    background-size: cover;
                    overflow: hidden;
                }
                .error_container {
                    text-align: center;
                    position: relative;
                    color: #058a8e;
                    padding: 60px;
                    border-radius: 100%;
                    background-color: #d5e5e3;
                    text-shadow: 2px 3px 3px #1A2D5F;
                    position: relative;
                    top: 1%;
                    opacity: 0;
                    transition: opacity 2s ease-in-out;
                }
                .error_container.show {
                    opacity: 1;
                }
                .error_message{
                    color: #058a8e;
                    text-shadow: 2px 3px 3px #1A2D5F;
                }
                button{
                    font-size: 50px;
                    padding: 10px;
                    background-color: #058a8e;
                    color: #f6e9bc;
                    border: 2px solid #058a8e;
                    border-radius: 5px;
                    text-decoration: none;
                    box-shadow: 5px 5px 8px #1A2D5F;
                    position: relative;
                    top: -10px;
                }
                button:hover{
                    background-color: #f6e9bc;
                    border: 2px solid #058a8e;
                    color: #058a8e;
                }
            </style>";
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