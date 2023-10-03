<?php
require_once('utils/database.php');

class JoueurDAO {

    private $db_connect;

    public function insert($data) {

        $db_connect = connectToDB();

        $nom = $data['nom'];
        $pseudo = $data['pseudo'];
        $password = $data['password'];
        $password = hash('sha256', $password);
        $email = $data['email'];
        //requete préparée avec hash du password pour envoi inscription dans DBB
        $statement = $db_connect->prepare(" INSERT INTO Joueurs (nom,pseudo,password, email) VALUES(?,?,?,?)");
        try {
            $statement->execute(array($nom,$pseudo,$password,$email));
            return TRUE;
        }
        catch (PDOException $e){
            echo "Erreur : ".$e->getMessage();
        }

    }


    public function verify($params) {
        // var_dump($params);
        $db_connect = connectToDB();
        $pseudo = $params['Pseudo'];
        $password = $params['password'];
        $password = hash('sha256', $password);
        $statement = $db_connect->prepare("SELECT * FROM Joueurs WHERE `pseudo` = :pseudo");
        
        $errorMessage = ''; // Variable pour stocker le message d'erreur
        $errorDisplayed = false; // Variable de drapeau pour suivre si le message d'erreur a déjà été affiché

        try {
            $statement->bindParam(':pseudo', $pseudo);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            
            //si pseudos correspondent et si password correspondent
            if($result['Pseudo'] == $pseudo) {
                if($result['Password'] == $password) {
                    //si post du form1
                    if(isset($_POST['submit1'])) {
                        // Stockage des variables de session pour le joueur 1
                        $_SESSION['joueur1'] = $pseudo;
                        $_SESSION['password1'] = $password;
                        $_SESSION['id1'] = $result['Id_Joueur'];
                    }
                    //si post du form2
                    if(isset($_POST['submit2'])) {
                        // Stockage des variables de session pour le joueur 2
                        $_SESSION['joueur2'] = $pseudo;
                        $_SESSION['password2'] = $password;
                        $_SESSION['id2'] = $result['Id_Joueur'];
                    } 
                    return TRUE;
                } else {
                    if (!$errorDisplayed) {
                        $errorMessage = 'MOT DE PASSE INCONNU';
                        $errorDisplayed = true;
                    }
                }
            } else {
                if (!$errorDisplayed) {
                    $errorMessage = 'UTILISATEUR INCONNU';
                }
            }
        } catch (PDOException $e){
            echo "Erreur : ".$e->getMessage();
            return FALSE;
        }
    
        // Affichez le message d'erreur une seule fois ici
        if (!empty($errorMessage)) {
            echo '<div class="error_container">';
            echo '<h1 class="error_message">' . $errorMessage . '</h1><br><br><br>';
            echo '<h2><button onclick="allerVersAccueil()">ACCUEIL</button></h2>';
            echo '</div>';
        }
    
        return FALSE; // Retourne FALSE après avoir affiché le message d'erreur
    }
    

}