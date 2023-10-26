<?php
class Personnages
{
    protected $nom;
    protected $puissance;
    protected $pv;

    public function __construct($Nom, $Puissance, $Pv)
    {
        $this->nom = $Nom;
        $this->puissance = $Puissance;
        $this->pv = $Pv;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getPuissance()
    {
        return $this->puissance;
    }

    public function getPv()
    {
        return $this->pv;
    }

    public function setPv($newPv)
    {
        $this->pv = $newPv;
    }

    public function Attack($enemie)
    {
        $attack = $this->getPuissance();
        $pv = $enemie->getPv();
        $this->PrendreDegats($pv, $attack, $enemie);
    }

    public function PrendreDegats($pv, $attack, $enemie)
    {
        $update = $pv - $attack;
        if ($update > 0) {
            $enemie->setPv($update);
            echo "Il ne te reste plus que ", $enemie->getPv(), " PV à ", $enemie->getNom(), "!\n";
        } else {
            $this->Mourir($enemie);
        }

    }

    public function Mourir($personnage)
    {
        echo $personnage->getNom(), " est mort !\n";
    }
}

class Hero extends Personnages
{
    protected $attaque_hero;

    public function __construct($Nom, $Puissance, $Pv, $Attaque_hero)
    {
        parent::__construct($Nom, $Puissance, $Pv);
        $this->attaque_hero = $Attaque_hero;
    }
}

class Vilain extends Personnages
{
    protected $attaque_vilain;
    public function __construct($Nom, $Puissance, $Pv, $Attaque_vilain)
    {
        parent::__construct($Nom, $Puissance, $Pv);
        $this->attaque_vilain = $Attaque_vilain;
    }
}
class Goku extends Hero
{
    public function __construct()
    {
        $this->nom = "Goku";
        $this->puissance = 50;
        $this->pv = 100;
        $this->attaque_hero = "";

    }
}
class Vegeta extends Hero
{
    public function __construct()
    {
        $this->nom = "Vegeta";
        $this->puissance = 100;
        $this->pv = 100;
        $this->attaque_hero = "";

    }
}
class Freezer extends Vilain
{
    public function __construct()
    {
        $this->nom = "Freezer";
        $this->puissance = 100;
        $this->pv = 100;
        $this->attaque_vilain = "";
    }
}
class Cell extends Vilain
{
    public function __construct()
    {
        $this->nom = "Cell";
        $this->puissance = 100;
        $this->pv = 100;
        $this->attaque_vilain = "";
    }
}

$goku = new Goku();
$vegeta = new Vegeta();
$freezer = new Freezer();
$cell = new Cell();

$a = 0;

while ($a == 0) {
    popen("cls", "w");
    echo "Qui souhaites-tu voir ?\n1 - Goku\n2 - Vegeta\n3 - Freezer\n4 - Cell\n5 - Quitter\n\n";
    $choice = readline("> ");
    switch ($choice) {
        case 1:
            popen("cls", "w");
            echo $goku->getNom(), " attaque !\n\n", $freezer->getPv(), "\n", $goku->Attack($freezer), "\n";
            echo $goku->getNom(), " attaque !\n\n", $freezer->getPv(), "\n", $goku->Attack($freezer), "\n";
            readline("> ");
            break;
        case 2:
            popen("cls", "w");
            echo $vegeta->getNom();
            sleep(1);
            break;
        case 3:
            popen("cls", "w");
            echo $freezer->getNom();
            sleep(1);
            break;
        case 4:
            popen("cls", "w");
            echo $cell->getNom();
            sleep(1);
            break;
        case 5:
            popen("cls", "w");
            $a = 1;
            break;
        default:
            echo "Ce n'est pas disponible !\n";
    }
}
?>