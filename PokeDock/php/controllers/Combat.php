<?php

class Combat extends Controller {

    public function index() {
        $this->render('combat_tpl');
    }

    public function recordCombat() {
        $newCombat = new CombatDAO;
        if ($newCombat->insert($_POST)) {
            $newPoke = new PokemonDAO;
            $newPoke->clearStat();
            unset($_SESSION['pokemon1']);
            unset($_SESSION['pokemon2']);
            if(isset($_SESSION['random'])) {
                unset($_SESSION['random']);
                $newPoke = new PokemonDAO;
                $results = $newPoke->randPokemon();
                $_SESSION['random'] = $results;
            }
            $this->displayCombats();
        }
        else {
            echo "Ca n'a pas marché";
        }
    }

    public function displayCombats() {
        $newCombat = new CombatDAO;
        $results = $newCombat->getCombat();
        $_SESSION['combats'] = $results;
        $this->render('combat_display_tpl');
    }

    public function displayCombatsById($id) {

        $newCombat = new CombatDAO;
        $results = $newCombat->getCombatById($id);
        $_SESSION['combatsbyid'] = $results;
        $this->render('stat_joueur_tpl');
    }

    public function displayTop() {

        $newCombat = new CombatDAO;
        $results = $newCombat->getTopAverageScore();
        $_SESSION['topScore'] = $results;
        $this->render('top3_tpl');

    }

}