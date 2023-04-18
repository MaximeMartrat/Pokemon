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
        echo $this->nom. " a <span class='greentext'>". $this->pv. " PV</span><br>";

    }

    public function BoitPotion($gain) {
        //si pv + gain ne dépassent pas les pvmax
        if($this->pv + $gain <= $this->pvmax) {
            $pokemon1 = unserialize($_SESSION['pokemon1']);
            if($this->nom == $pokemon1->nom){
                echo "<script>pokemon1_img.setAttribute('class', 'potion')</script>";
            } else {
                echo "<script>pokemon2_img.setAttribute('class', 'potion')</script>";
            }
            echo $this->nom. " boit une potion de <span class='greentext'>".$gain." PV </span><br>";
            // utilise la methode addPV
            $this->addPV($gain); 
            
        } else {
            //sinon pv = pvmax
            $this->pv == $this->pvmax;
            
        } 

    } 
    
    public function subPV($degats) {
        //pv = pv - degats
        $this->pv = $this->pv - $degats;
        $pokemon1 = unserialize($_SESSION['pokemon1']);
        if($this->nom == $pokemon1->nom){
            echo "<script>pokemon1_img.setAttribute('class', 'degat')</script>";
        } else {
            echo "<script>pokemon2_img.setAttribute('class', 'degat')</script>";
        }
        //si methode estvivant est false
        if($this->EstVivant() === FALSE) {
            //pokemon ko
            echo $this->nom. " est <span class='redtext' id='dead'>mort</span> <br> ";
        }

    }

    public function Attaque($pokemon) {

        //switch sur le type de pokemon
        switch($this->type)
        {
            //si feu....
            case 'FEU':
                echo "<span class='feu'>". $this->nom . " </span><span class='redtext'>attaque</span> ". $pokemon->nom . "<br>";
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
                echo "<span class='eau'>". $this->nom . " </span><span class='redtext'>attaque</span> ". $pokemon->nom . "<br>";
                if($pokemon->type === 'FEU') {
                    $degats = $this->pc * 2;
                } elseif ($pokemon->type === 'ELECTRIK') {
                    $degats = $this->pc;
                } else {
                    $degats = $this->pc * 0.5;
                }
                break;
            case 'PLANTE':
                echo "<span class='plante'>". $this->nom . " </span><span class='redtext'>attaque</span> ". $pokemon->nom . "<br>";
                if($pokemon->type === 'EAU') {
                    $degats = $this->pc * 2;
                } elseif ($pokemon->type === 'ELECTRIK') {
                    $degats = $this->pc;
                } else {
                    $degats = $this->pc * 0.5;
                }
                break;
            default:
            echo "<span class='elektric'>". $this->nom . " </span><span class='redtext'>attaque</span> ". $pokemon->nom . "<br>";
                if($pokemon->type === 'EAU') {
                    $degats = $this->pc * 2;
                } elseif ($pokemon->type === 'FEU') {
                    $degats = $this->pc;
                } else {
                    $degats = $this->pc * 0.5;
                }
                break;
        }
        $pokemon1 = unserialize($_SESSION['pokemon1']);
        if($this->nom == $pokemon1->nom){
            echo "<script>pokemon1_img.setAttribute('class', 'attaque1')</script>";
        } else {
            echo "<script>pokemon2_img.setAttribute('class', 'attaque2')</script>";
        }
        //methode subPV sur pokemon attaqué
        flush();
        sleep(0.5);
        $pokemon->subPV($degats);
        //si pokemon attaqué est mort
        if($pokemon->EstVivant() === FALSE) {
            //methode attaque retourne false
            return FALSE;
        }
        //sinon message plus retour true
        echo $this->nom . " afflige <span class='redtext'>".$degats. " PV </span>de degats à ". $pokemon->nom . "<br>";
        return TRUE;
     
    }


}