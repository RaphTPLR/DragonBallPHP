<?php
class Personnages
{
    protected $nom;
    protected $Puissance;
    protected $pv;
    protected $attacks;

    public function __construct($Nom, $Puissance, $Pv)
    {
        $this->nom = $Nom;
        $this->puissance = $Puissance;
        $this->pv = $Pv;
        $this->attacks = array();
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
        $this->puissance = 25;
        $this->pv = 100;
        $this->attaque_hero = "";
        $this->attacks = [["coup de poing ",$this->puissance],["boule de feu", 50]];

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
        $this->attacks = [["coup de poing marteau ",$this->puissance],[" canon garric", 50]];
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
        $this->attacks = [[" coup de queue ",$this->puissance],["boule de la mort"50]];
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
        $this->attacks = [["coup de queue ",$this->puissance],["aspiration ", 50]];
    }
}

class Display {
    public function Combat($allie, $enemie, $current_combat) {
        popen("cls", "w");
        echo "Combat ", $current_combat ,"\n\n", $allie->getNom(), " VS ", $enemie->getNom();
        echo "\n\nQue voulez vous faire ?\n\n1 - Attaquer\n2 - Esquiver\n3 - Abandonner\n";
        $choice = readline("> ");
        switch ($choice) {
            case 1:
                popen("cls","w");
                echo "Combat ", $current_combat ,"\n\n", $allie->getNom(), " VS ", $enemie->getNom(), "\n\n";
                sleep(1);
        }
    }
}

$jeu = new Display();
$goku = new Goku();
$vegeta = new Vegeta();
$freezer = new Freezer();
$cell = new Cell();

$a = 0;
$current_combat = 0;

while ($a == 0) {
    echo popen("cls", "w");
    echo "Que souhaites-tu faire ?\n\n1 - Jouer\n2 - Voir les personnages\n3 - Quitter\n";
    $choice = readline("> ");
    switch ($choice) {
        case 1:
            echo "Jouer";
            while ($current_combat < 4) {
                $current_combat++;
                switch ($current_combat) {
                    case 1: 
                        $jeu->Combat($goku, $freezer, $current_combat);
                }
            }
            break;
        case 2:
            popen("cls", "w");
            echo "Qui souhaites-tu voir ?\n1 - Goku\n2 - Vegeta\n3 - Freezer\n4 - Cell\n5 - Quitter\n\n";
            $choice = readline("> ");
            switch ($choice) {
                case 1:
                    popen("cls", "w");
                    echo $goku->getNom(), "\n\nPV : ", $goku->getPv(), "\nPUISSANCE :", $goku->getPuissance(), "\n\n1 - Quitter\n";
                    readline("> ");
                    break;
                case 2:
                    popen("cls", "w");
                    echo $vegeta->getNom(), "\n\nPV : ", $vegeta->getPv(), "\nPUISSANCE :", $vegeta->getPuissance(), "\n\n1 - Quitter\n";
                    readline("> ");
                    break;
                case 3:
                    popen("cls", "w");
                    echo $freezer->getNom(), "\n\nPV : ", $freezer->getPv(), "\nPUISSANCE :", $freezer->getPuissance(), "\n\n1 - Quitter\n";
                    readline("> ");
                    break;
                case 4:
                    popen("cls", "w");
                    echo $cell->getNom(), "\n\nPV : ", $cell->getPv(), "\nPUISSANCE :", $cell->getPuissance(), "\n\n1 - Quitter\n";
                    readline("> ");
                    break;
                case 5:
                    popen("cls", "w");
                    $a = 1;
                    break;
                default:
                    echo "Ce n'est pas disponible !\n";
            }
            break;
        case 3:
            popen("cls", "w");
            $a = 1;
            break;
        default:
            echo "Ce n'est pas disponible !";
            break;
    }
}
?>