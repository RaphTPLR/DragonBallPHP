<?php
 class Personnages {
    protected $nom;
    protected $puissance;
    protected $pv;

    public function __construct($nom,$puissance,$pv){
        $this->nom=$nom;
        $this->puissance=$puissance;
        $this->pv=$pv;
    }

 }

 class Hero extends Personnages{
    protected $attaque_hero;

    public function __construct($nom,$puissance,$pv,$attaque_hero){
        parent::__construct($nom,$puissance,$pv);
        $this->attaque_hero = $attaque_hero;
    }
}

 class Vilain extends Personnages{
    protected $attaque_vilain;
    public function __construct($nom,$puissance,$pv,$attaque_vilain) {
        parent:: __construct($nom,$puissance,$pv);
        $this->attaque_vilain = $attaque_vilain;
    }
    public function getVilain() {
       return $this->nom;
    }
 }


$vilain = new Vilain();
$vilain->getVilain();
?>