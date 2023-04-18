<?php

class Accueil extends Controller {

    public function index() {
        $this->render('accueil_template');
    }

    public function displayAll() {
        $newPoke = new PokemonDAO;
        $results = $newPoke->getAllPokemon();
        $_SESSION['pokemons'] = $results;
        $this->render('pokemon_tpl');
        // var_dump($results);
    }

    public function clearStatPockemon() {

        $newPoke = new PokemonDAO;
        $newPoke->clearStat();
        $results = $newPoke->getAllPokemon();
        $_SESSION['pokemons'] = $results;
        $this->index();
    }
}