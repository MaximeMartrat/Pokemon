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
        try {
            $statement->bindParam(':pseudo', $pseudo);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            // var_dump($result);
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
                //echo $_SESSION['joueur1']. '<br>';  
                //echo $_SESSION['joueur2'].'<br>';
                    return TRUE;
                } else {
                    echo 'mot de passe inconnu'; 
                    return FALSE;
                }
            } else {
                echo 'utilisateur inconnu';
                return FALSE;
            }
        } catch (PDOException $e){
            echo "Erreur : ".$e->getMessage();
            return FALSE;
        }
    }

}