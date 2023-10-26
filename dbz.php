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
    public function getNom() {
       return $this->nom;
    }
 }


$vilain = new Vilain("Nom", 25, 200, "Feur");
$vilain->getNom();
?>