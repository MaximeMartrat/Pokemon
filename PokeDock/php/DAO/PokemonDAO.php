<?php
require_once('utils/database.php');

class PokemonDAO {

    private $db_connect;
    
    public function getAllPokemon() {

        $db_connect = connectToDB();

        $statement = $db_connect->prepare("SELECT * FROM Pokemons");
        try {
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e){
            echo "Erreur : ".$e->getMessage();
        }

    }

    public function pokemonSelected($joueur, $pokemon) {  

        $db_connect = connectToDB();
    
        $statement = $db_connect->prepare("UPDATE `Pokemons` SET `Id_Joueur_Fk` = ? WHERE `Nom` = ?");
    
        try {
            $result = $statement->execute(array($joueur, $pokemon));
            // echo $result;
            return TRUE;
        }
        catch (PDOException $e){
            echo "Erreur : ".$e->getMessage();
        }
    }

    public function clearPokemonSelected($pokemon) {

        $db_connect = connectToDB();
    
        $statement = $db_connect->prepare("UPDATE `Pokemons` SET `Id_Joueur_Fk` = NULL WHERE `Nom` = ?");
    
        try {
            $result = $statement->execute(array($pokemon));
            // echo $result;
            return TRUE;
        }
        catch (PDOException $e){
            echo "Erreur : ".$e->getMessage();
        }

    }

    public function clearStat() {

        $db_connect = connectToDB();
        //requete pour remettre a zero les parametres des pokemons
        $statement = $db_connect->prepare("UPDATE `Pokemons` SET `PV` = `Pvmax`, `Id_Joueur_Fk` = NULL");

        try {
            $result = $statement->execute();
            // echo $result;
            return TRUE;
        }
        catch (PDOException $e){
            echo "Erreur : ".$e->getMessage();
        }

    }

    public function randPokemon() { 
        $db_connect = connectToDB();
        //requete pour choisir aleatoirement un pokemon parmis ceux disponibles
        $sql = "SELECT * FROM Pokemons WHERE `Id_Joueur_Fk` IS NULL ORDER BY RAND() LIMIT 1";
        $stmt = $db_connect->query($sql); 
        $randPokemon = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        return $randPokemon;
    }

}