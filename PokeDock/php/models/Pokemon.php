<?php

class Pokemon {
    public $nom;
    protected $pv;
    protected $pvmax;
    protected $pc;
    protected $type;

    public function __construct($nom, $pv, $pvmax,$pc, $type) {

        $this->nom = $nom;
        $this->pv= $pv;
        $this->pvmax= $pvmax;
        $this->pc = $pc;
        $this->type = $type;

    }

    public function get($attribut){
        return $this->$attribut;
    }

    public function set($attribut, $value){

         $this->$attribut = $value;
         
    }

    public function EstVivant() {
        
        if($this->pv <= 0) {
            return FALSE;
        } else {
            return TRUE;       
        }

    }

    private function addPV($gain) {
        //pv = pv + gain
        $this->pv = $this->pv + $gain;
        echo $this->nom. ' a '. $this->pv. ' PV<br>';

    }

    public function BoitPotion($gain) {
        //si pv + gain ne dépassent pas les pvmax
        if($this->pv + $gain <= $this->pvmax) {
            
            echo $this->nom. ' boit une potion de '.$gain.' PV <br>';
            //utilise la methode addPV
            $this->addPV($gain); 
            
        } else {
            //sinon pv = pvmax
            $this->pv == $this->pvmax;
            
        } 

    } 
    
    public function subPV($degats) {
        //pv = pv - degats
        $this->pv = $this->pv - $degats;
        //si methode estvivant est false
        if($this->EstVivant() === FALSE) {
            //pokemon ko
            echo $this->nom. ' est mort <br> ';
            
        }

    }

    public function Attaque($pokemon) {

        echo $this->nom . ' attaque '. $pokemon->nom . '<br>';
        //switch sur le type de pokemon
        switch($this->type)
        {
            //si feu....
            case 'FEU':
                //si pokemon attaqué est de type plante
                if($pokemon->type === 'PLANTE') {
                    //degat = pc*2
                    $degats = $this->pc * 2;
                //si electrik
                } elseif ($pokemon->type === 'ELECTRIK') {
                    //degat = pc
                    $degats = $this->pc;
                } else {
                    //sinon degat = pc * 0.5
                    $degats = $this->pc * 0.5;
                }
                break;
                //etc...
            case 'EAU':
                if($pokemon->type === 'FEU') {
                    $degats = $this->pc * 2;
                } elseif ($pokemon->type === 'ELECTRIK') {
                    $degats = $this->pc;
                } else {
                    $degats = $this->pc * 0.5;
                }
                break;
            case 'PLANTE':
                if($pokemon->type === 'EAU') {
                    $degats = $this->pc * 2;
                } elseif ($pokemon->type === 'ELECTRIK') {
                    $degats = $this->pc;
                } else {
                    $degats = $this->pc * 0.5;
                }
                break;
            default:
                if($pokemon->type === 'EAU') {
                    $degats = $this->pc * 2;
                } elseif ($pokemon->type === 'FEU') {
                    $degats = $this->pc;
                } else {
                    $degats = $this->pc * 0.5;
                }
                break;
        }
        //methode subPV sur pokemon attaqué
        $pokemon->subPV($degats);
        //si pokemon attaqué est mort
        if($pokemon->EstVivant() === FALSE) {
            //methode attaque retourne false
            return FALSE;
        }
        //sinon message plus retour true
        echo $this->nom . ' afflige '.$degats. ' PV de degats à '. $pokemon->nom . '<br>';
        return TRUE;
     
    }


}