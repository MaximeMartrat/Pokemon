<?php

class Signin extends Controller {

    
    public function index() {
        $this->render('inscription_tpl');
    }

    public function record() {
        
        $newPlayer = new JoueurDAO;
        if ($newPlayer->insert($_POST)) {
            //redirection vers la page accueil
            echo "<script>window.location.href= '/'</script>" ;
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
                        window.location.href = '/';
                    }
                </script>";
            echo "<style>
                body{
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    background-color:#ED1C24;
                    font-family: 'Poppins', sans-serif;
                    height: 100vh;
                }
                .error_container {
                    text-align: center;
                }
                .error_message{
                    color: #FFCB05;
                    text-shadow: 2px 5px 3px #1A2D5F;
                }
                button{
                    width: 150px;
                    font-size: 18px;
                    padding: 10px;
                    background-color: #FFCB05;
                    color:black;
                    border: 2px solid #ED1C24;
                    border-radius: 5px;
                    text-decoration: none;
                    box-shadow: 5px 5px 8px #1A2D5F;
                }
                button:hover{
                    background-color: #ED1C24;
                    border: 2px solid #FFCB05;
                    color: #FFCB05;
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