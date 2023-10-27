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

    public function setAttacks($newAttacks) {
        array_push($this->attacks, $newAttacks);
    }

    public function getBonus() {
        return $this->bonus;
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
        $this->default_pv = 100;
        $this->attaque_hero = "";
        $this->attacks = [["Coup de poing", $this->puissance], ["Kamehameha", 50]];
        $this->bonus = ["Genkidama", 90];
    }
}
class Vegeta extends Hero
{
    public function __construct()
    {
        $this->nom = "Vegeta";
        $this->puissance = 100;
        $this->pv = 100;
        $this->default_pv = 100;
        $this->attaque_hero = "";
        $this->attacks = [["Coup de poing marteau" , $this->puissance], ["Canon Garric", 50]];
        $this->bonus = ["Final Flash", 85];

    }
}
class Freezer extends Vilain
{
    public function __construct()
    {
        $this->nom = "Freezer";
        $this->puissance = 1;
        $this->pv = 100;
        $this->default_pv = 100;
        $this->attaque_vilain = "";
        $this->attacks = [["Coup De Queue", $this->puissance], ["Boule De La Mort", 50]];
        $this->bonus = ["Supernova", 95];
    }
}
class Cell extends Vilain
{
    public function __construct()
    {
        $this->nom = "Cell";
        $this->puissance = 100;
        $this->pv = 100;
        $this->default_pv = 100;
        $this->attaque_vilain = "";
        $this->attacks = [["Coup De Queue", $this->puissance], ["Aspiration", 50]];
        $this->bonus = ["super kamehameha", 100];
    }   
}

class Gohan extends Hero
{

    public function __construct() {
        $this->nom = "Gohan";
        $this->puissance = 15;
        $this->pv = 100;
        $this->default_pv = 100;
        $this->attacks = [[" Enchainement Saiyan Hybride", $this->puissance],["Mazenko", 50]];
        $this->bonus = ["Kamehameha Pere-Fils", 100];
    }     
    
}
class Satan extends Hero
{

    public function __construct() {
        $this->nom = "Satan";
        $this->puissance = 18;
        $this->pv = 1;
        $this->default_pv = 100;
        $this->attacks = [["Lancer de canette",1],["Feu D'artifice", 2]];
        $this->bonus = ["Lance-Rocket", 5];
    }     
    
}
class Beerus extends Vilain
{

    public function __construct() {
        $this->nom = "Beerus";
        $this->puissance = 30;
        $this->pv = 100;
        $this->default_pv = 100;
        $this->attacks = [["Coup Divin", 999]];
        $this->bonus = ["Hakai", 999];
    }     
    
}
class Buu extends Vilain
{

    public function __construct() {
        $this->nom = "Buu";
        $this->puissance = 24;
        $this->pv = 100;
        $this->default_pv = 100;
        $this->attacks = [["Coup Longue Distance", 100]];
        $this->bonus = ["Raffale Boule d'Energie", 75];
    }     
    
}
class Trunks extends Hero
{

    public function __construct() {
        $this->nom = "Trunks";
        $this->puissance = 21;
        $this->pv = 100;
        $this->default_pv = 100;
        $this->attacks = [["Coup d'Epée", 25]];
        $this->bonus = ["Burning Attack", 50];
    }     
     
}
class Broly extends Vilain
{

    public function __construct() {
        $this->nom = "Broly";
        $this->puissance = 22;
        $this->pv = 100;
        $this->default_pv = 100;
        $this->attacks = [["Coup enragée", 50],["Eraser Cannon", 60]];
        $this->bonus = ["Meteor Géant", 100];
    }     
}    
class Display
{
    private $victoire;
    private $defaite;
    private $combat;
    public function __construct() {
        $this->victoire = 0;
        $this->defaite = 0;
        $this->combat = 0;
    }

    public function Combat($allie, $enemie, $current_combat)
    {
        global $abandon;
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
                            echo $allie->getNom(), " utilise ", $allie->getAttacks()[$choice - 1][0], " !\n\n", $allie->getNom(), " à infligé ",
                                $allie->getAttacks()[$choice - 1][1], " à ", $enemie->getNom();

                            $allie->Attack($enemie, $allie->getAttacks()[$choice - 1][1]);
                            sleep(2);                            

                            if ($enemie->getPv() > 0) {
                                popen("cls", "w");
                                $rand = random_int(1, count($enemie->getAttacks()) + 1);
                                echo $rand, "\n";

                                if ($rand <= count($enemie->getAttacks())) {
                                    echo $enemie->getNom(), " utilise ", $enemie->getAttacks()[$rand - 1][0], " !\n\n", $enemie->getNom(), " à infligé ",
                                    $enemie->getAttacks()[$rand - 1][1], " à ", $allie->getNom();
    
                                    $enemie->Attack($allie, $enemie->getAttacks()[$rand - 1][1]);
                                } else if ($rand == count($enemie->getAttacks()) + 1) { 
                                    echo $enemie->getNom(), " à esquivé l'attaque de ", $allie->getNom(), "!\n";
                                    $enemie->setPv($enemie->getPv() + $allie->getAttacks()[$choice - 1][1]);
                                }

                                sleep(2);
                            }

                            if ($allie->getPv() <= 0) {
                                popen("cls", "w");
                                $allie->Mourir();
                                $this->setDefaite($this->getDefaite() + 1);
                                sleep(1);
                                $compt = 1;
                            } else if ($enemie->getPv() <= 0) {
                                popen("cls", "w");
                                $enemie->Mourir();
                                $this->setDefaite($this->getDefaite() + 1);
                                sleep(1);
                                $compt = 1;
                            }
                    }
                    break;
                case 2 :
                    popen("cls", "w");
                    $rand = random_int(1, count($enemie->getAttacks()));
                    if ($enemie->getnom() != "Beerus"){
                        echo $allie->getNom() ," esquive !\n";
                        sleep(2);

                        popen("cls", "w");
                        if ($rand <= count($enemie->getAttacks())) {
                            echo $enemie->getNom(), " utilise ", $enemie->getAttacks()[$rand - 1][0], " !\n\nMais ", $allie->getNom(), " à esquivé !\n\n" ,
                                $enemie->getNom(), " à infligé 0 de dégats à ", $allie->getNom();

                        } else if ($rand == count($enemie->getAttacks()) + 1) {
                            echo $enemie->getNom()," à esquivé aussi !\n";
                        }
                        sleep(2);
                    }
                    else if ($enemie->getNom()== "Beerus"){
                        echo "L'esquive de ", $allie->getNom(), " a été annulée !\n";
                        sleep(2);
                        popen("cls", "w");

                        if ($rand <= count($enemie->getAttacks())) {
                            echo $enemie->getNom(), " utilise ", $enemie->getAttacks()[$rand - 1][0], " !\n\n", $enemie->getNom(), " à infligé ",
                            $enemie->getAttacks()[$rand - 1][1], " à ", $allie->getNom();
    
                            $enemie->Attack($allie, $enemie->getAttacks()[$rand - 1][1]);
                        } else if ($rand == count($enemie->getAttacks()) + 1) { 
                            echo $enemie->getNom(), " à esquivé l'attaque de ", $allie->getNom(), "!\n";
                            $enemie->setPv($enemie->getPv() + $allie->getAttacks()[$choice - 1][1]);
                        }
                        sleep(2);
                    }

                        if ($allie->getPv() <= 0) {
                            popen("cls", "w");
                            $allie->Mourir();
                            $this->setDefaite($this->getDefaite() + 1);
                            sleep(1);
                            $compt = 1;
                        }
                    break;
                case 3 :
                    return $abandon = true;
                    default :
                    echo "Ceci n'est pas disponible !\n";
            }
        }
                    
        $this->setCombat($this->getCombat() + 1);
        if ($compt == 0) {
            return;
        }

        $this->setVictoire($this->getVictoire() + 1);
    }

    public function getVictoire() {
        return $this->victoire;
    }

    public function setVictoire($newVictoire) {
        $this->victoire = $newVictoire;
    }

    public function getDefaite() {
        return $this->defaite;
    }

    public function setDefaite($newDefaite) {
        $this->defaite = $newDefaite;
    }

    public function getCombat() {
        return $this->combat;
    }

    public function setCombat($newCombat) {
        $this->combat = $newCombat;
    }

    public function verifVictoire() {
        if ($this->getVictoire() > 10) {
            popen("cls","w");
            echo "Tu as finis le jeu !\n\nPress 1 pour fermer la partie\n";
            $choice = readline("> ");
            switch ($choice) {
                case 1 :
                    die(0);
                default :
                    echo "Cela n'est pas disponible !";
                    break;
            }
        };
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
    echo "Que souhaites-tu faire ?\n\n1 - Jouer\n2 - Voir les personnages\n3 - Règle\n4 - Statistiques\n5 - Quitter\n";
    $choice = readline("> ");
    $current_combat = 0;
    global $abandon;
    $abandon = false;
    switch ($choice) {
        case 1:
            while ($current_combat < 4) {
                if ($abandon) {
                    $current_combat = 4;
                }
                $current_combat++;
                switch ($current_combat) {
                    case 1:
                        $jeu->Combat($goku, $beerus, $current_combat);
                        if ($jeu->getCombat() == 1) {
                            $goku->setAttacks($goku->getBonus());
                        }
                        break;
                    case 2:
                        $jeu->Combat($vegeta, $cell, $current_combat);

                        if ($jeu->getCombat() == 2) {
                            $vegeta->setAttacks($vegeta->getBonus());
                        }
                        break;
                    case 3:
                        echo "combat 3";
                        break;
                }
            }

            $jeu->verifVictoire();
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
            echo "Bienvenue sur le jeu Dragon Ball\n\nRemporte 10 victoires afin de terminer le jeu !\n\nBonne chance,\n\nPress une touche\n";
            readline("> ");
            break;
        case 4:
            popen("cls", "w");
            if ($jeu->getVictoire() == 0 && $jeu->getDefaite() == 0) {
                echo "Statistiques\n\nCombat : 0\nVictoire : 0\nDefaite : 0\nRatio (V/D) : NA";
            } else if ($jeu->getVictoire() == 0 && $jeu->getDefaite() > 0) {
                echo "Statistiques\n\nCombat : ", $jeu->getCombat() ,"\nVictoire : 0\nDefaite : ", $jeu->getDefaite(),
                    "\nRatio (V/D) : 0";
            } else if ($jeu->getVictoire() > 0 && $jeu->getDefaite() == 0) {
                echo "Statistiques\n\nCombat : ", $jeu->getCombat() ,"\nVictoire : ", $jeu->getVictoire(),
                    "\nDefaite : 0\nRatio (V/D) : ", $jeu->getVictoire(), "\n";
            } else {
                echo "Statistiques\n\nCombat : ", $jeu->getCombat() ,"\nVictoire : ", $jeu->getVictoire(),
                    "\nDefaite : ", $jeu->getDefaite(), "\nRatio (V/D) : ", $jeu->getVictoire()/$jeu->getDefaite(), "\n";
            }
            echo "\n\nAppuie sur une touche pour quitter\n";
            readline("> ");
            break;
        case 5:
            popen("cls", "w");
            $a = 1;
            break;
        default:
            echo "Ce n'est pas disponible !";
            break;
    }
}
?>