<?php
require_once('database.php');

class CombatDAO {

    private $db_connect;

    public function insert($data) {

        $db_connect = connectToDB();
        //recupération des datas et transformation en integer
        $joueur1 = intval($data['Joueur1']);
        $pokemon1 = intval($data['Pokemon_J1']);
        $score1 = intval($data['Score_J1']);
        $joueur2 = intval($data['Joueur2']);
        $pokemon2 = intval($data['Pokemon_J2']);
        $score2 = intval($data['Score_J2']);
        //requete préparée pour envoi des resultats du match dans tableau des stats
        $statement = $db_connect->prepare("INSERT INTO Combats (Joueur1, Pokemon_J1, Score_J1, Joueur2,  Pokemon_J2, Score_J2) VALUES (?, ?, ?, ?, ?, ?)");
        
        try {
            $statement->execute(array($joueur1, $pokemon1, $score1, $joueur2,  $pokemon2, $score2));
            return TRUE;
        }
        catch (PDOException $e){
            echo "Erreur : ".$e->getMessage();
        }

    }

    public function getCombat() {

        $db_connect = connectToDB();
        //requete pour recupération des datas du tableau stats et infos joueurs et pokemons depuis les tables combats, pokemons et joueurs
        $statement = $db_connect->prepare("SELECT Id_combat, j1.Pseudo AS joueur1, j2.Pseudo AS joueur2, p1.Nom AS pokemon1, p2.Nom AS pokemon2, c.Score_J1, c.Score_J2
        FROM Combats c
        JOIN Joueurs j1 ON c.Joueur1 = j1.Id_Joueur
        JOIN Joueurs j2 ON c.Joueur2 = j2.Id_Joueur
        JOIN Pokemons p1 ON c.Pokemon_J1 = p1.Id_pokemon
        JOIN Pokemons p2 ON c.Pokemon_J2 = p2.Id_pokemon");
        try {
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            // var_dump($results);
            return $results;
        } catch (PDOException $e){
            echo "Erreur : ".$e->getMessage();
        }
    }

    public function getCombatById($id) {
        
        $db_connect = connectToDB();
        //requete pour recupération stats par id
        $statement  = $db_connect->prepare("SELECT Id_combat, Joueur1, Joueur2, Pokemon_J1, Pokemon_J2, j1.Pseudo AS joueur1, j2.Pseudo AS joueur2, p1.Nom AS pokemon1, p2.Nom AS pokemon2, c.Score_J1, c.Score_J2
        FROM Combats c
        JOIN Joueurs j1 ON c.Joueur1 = j1.Id_Joueur
        JOIN Joueurs j2 ON c.Joueur2 = j2.Id_Joueur
        JOIN Pokemons p1 ON c.Pokemon_J1 = p1.Id_pokemon
        JOIN Pokemons p2 ON c.Pokemon_J2 = p2.Id_pokemon WHERE Joueur1 = $id OR Joueur2 = $id");

        try {
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e){
            echo "Erreur : ".$e->getMessage();
        }
    }

    public function getTopScore() {

        $db_connect = connectToDB();

        $statement  = $db_connect->prepare("SELECT Nom, SUM(Score_J1 + Score_J2) AS Score FROM Combats INNER JOIN Joueurs ON Joueurs.Id_Joueur = Combats.Joueur1 OR Joueurs.Id_Joueur = Combats.Joueur2 WHERE Joueur1 = Id_Joueur OR Joueur2 = Id_Joueur GROUP BY Id_Joueur ORDER BY Score DESC LIMIT 3");

        try {
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e){
            echo "Erreur : ".$e->getMessage();
        }
    }
}