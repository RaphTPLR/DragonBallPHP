<?php
class Personnages
{
    protected $nom;
    protected $puissance;
    protected $pv;
    protected $default_pv;
    protected $attacks;
    protected $bonus;

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

    public function getAttacks()
    {
        return $this->attacks;
    }

    public function Attack($enemie, $attack)
    {
        $pv = $enemie->getPv();
        $this->PrendreDegats($pv, $attack, $enemie);
    }

    public function PrendreDegats($pv, $attack, $enemie)
    {
        $update = $pv - $attack;
            $enemie->setPv($update);
            echo "\nIl ne reste plus que ", $enemie->getPv(), " PV à ", $enemie->getNom(), "!\n";
    }

    public function Mourir()
    {
        echo $this->getNom(), " est mort !\n";
    }
    public function DisplayStat($nom,$pvn,$Puissance){


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
        $this->deflault_pv = 100;
        $this->attaque_hero = "";
        $this->attacks = [["coup de poing", $this->puissance], ["kamehameha", 50]];
        $this->bonus = [["genkidama",100]];
    }
}
class Vegeta extends Hero
{
    public function __construct()
    {
        $this->nom = "Vegeta";
        $this->puissance = 100;
        $this->pv = 100;
        $this->deflault_pv = 100;
        $this->attaque_hero = "";
        $this->attacks = [["coup de poing marteau", $this->puissance], ["canon garric", 50]];
        $this->bonus = [["final flash",100]];

    }
}
class Freezer extends Vilain
{
    public function __construct()
    {
        $this->nom = "Freezer";
        $this->puissance = 1;
        $this->pv = 100;
        $this->deflault_pv = 100;
        $this->attaque_vilain = "";
        $this->attacks = [["coup de queue", $this->puissance], ["boule de la mort", 50]];
        $this->bonus = ["supernova", 95];

    }
}
class Cell extends Vilain
{
    public function __construct()
    {
        $this->nom = "Cell";
        $this->puissance = 100;
        $this->pv = 100;
        $this->deflault_pv = 100;
        $this->attaque_vilain = "";
        $this->attacks = [["coup de queue", $this->puissance], ["aspiration", 50]];
        $this->bonus = [["super kamehameha",100]];
    }     
}

class Gohan extends Hero
{

    public function __construct() {
        $this->var = "Gohan";
        $this->puissance = ;
        $this->pv = 100;
        $this->deflault_pv = 100;
        $this->attaque_hero = [[" enchainement saiyan hybride"],["mazenko",50]];
        $this->bonus = [[" kamehameha pere-fils",100]];
    }     
    
}
class Satan extends Hero
{

    public function __construct() {
        $this->var = "Satan";
        $this->puissance = ;
        $this->pv = 1;
        $this->deflault_pv = 100;
        $this->attaque_hero = [["lancer de canette",1],["feu d'artifice"2]];
        $this->bonus = [[" lance rocket",5]];
    }     
    
}
class Beerus extends Hero
{

    public function __construct() {
        $this->var = "Beerus";
        $this->puissance = ;
        $this->pv = 100;
        $this->deflault_pv = 100;
        $this->attaque_hero = [["coup divin",100]];
        $this->bonus = [["hakai",999]];
    }     
    
}
class Buu extends Vilain
{

    public function __construct() {
        $this->var = "Buu";
        $this->puissance = ;
        $this->pv = 100;
        $this->deflault_pv = 100;
        $this->attaque_hero = [["coup longue distance",100]];
        $this->bonus = [["raffale boule d'energie",75]];
    }     
    
}
class Trunks extends Hero
{

    public function __construct() {
        $this->var = "trunks";
        $this->puissance = ;
        $this->pv = 100;
        $this->deflault_pv = 100;
        $this->attaque_hero = [["coup d'epée",25]];
        $this->bonus = [["burning attack",50]];
    }     
    
}
class Broly extends Vilain
{

    public function __construct() {
        $this->var = "broly";
        $this->puissance = ;
        $this->pv = 100;
        $this->deflault_pv = 100;
        $this->attaque_hero = [["coup enragée",50]["eraser cannon"]];
        $this->bonus = [["meteor géant",100]];
    }     
}    
class Display
{
    public function Combat($allie, $enemie, $current_combat)
    {
        $compt = 0;
        while ($compt == 0) {
            popen("cls", "w");
            echo "Combat ", $current_combat ,"\n\n", $allie->getNom()," (PV :",$allie->getPv(),  ") VS ",
                $enemie->getNom()," (PV :",$enemie->getPv(), ")";  
            echo "\n\nQue voulez vous faire ?\n\n1 - Attaquer\n2 - Esquiver\n3 - Abandonner\n";
            $choice = readline("> ");
            switch ($choice) {
                case 1 :
                    for ($i = 0; $i < $current_combat; $i++) {
                            popen("cls", "w");
                            echo "Combat ", $current_combat, "\n\n", $allie->getNom(), " VS ", $enemie->getNom(), "\n\n";

                            for ($i = 0; $i < count($allie->getAttacks()); $i++) {
                                echo $i + 1, " - ", $allie->getAttacks()[$i][0], " (", $allie->getAttacks()[$i][1], ")\n";
                            }

                            echo "\nQuelle attaque souhaites-tu faire ?\n";
                            $choice = readline("> ");

                            popen("cls", "w");
                            echo $allie->getNom(), " utilise ", $allie->getAttacks()[$choice - 1][0], " !\n", $allie->getNom(), " à infligé ",
                                $allie->getAttacks()[$choice - 1][1], " à ", $enemie->getNom();
                            $allie->Attack($enemie, $allie->getAttacks()[$choice - 1][1]);

                            if ($enemie->getPv() > 0) {
                                $enemie->Attack($allie, $enemie->getAttacks()[$choice - 1][1]);
                            }

                            sleep(1);                            

                            if ($allie->getPv() <= 0) {
                                popen("cls", "w");
                                $allie->Mourir();
                                sleep(1);
                                $compt = 1;
                            } else if ($enemie->getPv() <= 0) {
                                popen("cls", "w");
                                $enemie->Mourir();
                                sleep(1);
                                $compt = 1;
                            }
                    }
                    break;
                case 2 :
                    echo "Esquive !\n";
                    break;
                case 3 :
                    break;
                default :
                    echo "Ceci n'est pas disponible !\n";
            }
        }
    }
}

$jeu = new Display();
$goku = new Goku();
$vegeta = new Vegeta();
$freezer = new Freezer();
$cell = new Cell();
$satan = new Satan();
$beerus = new Beerus();
$gohan = new Gohan();
$buu = new Buu();
$trunks = new Trunks();
$broly = new Broly();
$a = 0;

while ($a == 0) {
    echo popen("cls", "w");
    echo "Que souhaites-tu faire ?\n\n1 - Jouer\n2 - Voir les personnages\n3 - Quitter\n";
    $choice = readline("> ");
    $current_combat = 0;
    switch ($choice) {
        case 1:
            echo "Jouer";
            while ($current_combat < 4) {
                $current_combat++;
                switch ($current_combat) {
                    case 1:
                        $jeu->Combat($goku, $freezer, $current_combat);
                        break;
                    case 2:
                        $jeu->Combat($vegeta, $cell, $current_combat);
                        break;
                    case 3:
                        echo "combat 3";
                        break;
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