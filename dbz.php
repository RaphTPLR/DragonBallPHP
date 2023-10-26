<?php
 class Personnages {
    protected $nom;
    protected $puissance;
    protected $pv;

    public function __construct($Nom,$Puissance,$Pv){
        $this->nom=$Nom;
        $this->puissance=$Puissance;
        $this->pv=$Pv;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPuissance(){
        return $this->puissance;
    }

    public function getPv(){
        return $this->pv;
    }

    public function setPv($newPv) {
        $this->pv = $newPv;
    }

    public function Attack($hero, $enemie) {
        $attack = $hero->getPuissance();
        $pv = $enemie->getPv();
        $update = $pv - $attack;
        if ($update > 0) {
            $this->setPv($update);
            echo "Il ne te reste plus que ", $enemie->getPv(), "à ", $enemie->getNom(), "!\n";
        } else {
            echo $enemie->getNom() ,"est mort !\n";
        }
    }
 }

 class Hero extends Personnages{
    protected $attaque_hero;

    public function __construct($Nom,$Puissance,$Pv,$Attaque_hero){
        parent::__construct($Nom,$Puissance,$Pv);
        $this->attaque_hero = $Attaque_hero;
    }
}

 class Vilain extends Personnages{
    protected $attaque_vilain;
    public function __construct($Nom,$Puissance,$Pv,$Attaque_vilain) {
        parent:: __construct($Nom,$Puissance,$Pv);
        $this->attaque_vilain = $Attaque_vilain;
    }
 }


$vilain = new Vilain("Nom", 25, 200, "Feur");
$vilain->getNom();
?>