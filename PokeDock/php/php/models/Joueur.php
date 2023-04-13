<?php

class Joueur {
    protected $nom;
    protected $pseudo;
    protected $email;
    protected $password;

    public function __construct($nom, $pseudo, $email, $password){
        $this->nom = $nom;
        $this->pseudo = $pseudo;
        $this->email = $email;
        $this->password = $password;
    }
    
    public function get($attribut){
        return $this->$attribut;
    }

    public function set($attribut, $value){
         $this->$attribut = $value;
    }

}