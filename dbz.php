<?php
// CHARACTERS PARENT CLASS
class Personnages
{
    // PROTECTED BECAUSE WE USE THESE VARIABLES IN THE INHERITED CLASSES
    protected $nom;
    protected $puissance;
    protected $pv;
    protected $default_pv;
    protected $attacks;
    protected $bonus;

    // MAIN CONSTRUCT
    public function __construct($Nom, $Puissance, $Pv)
    {
        $this->nom = $Nom;
        $this->puissance = $Puissance;
        $this->pv = $Pv;
        $this->attacks = array();
    }

    // GET AND SET FOR ALMOST ALL VARIABLES
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

    public function setAttacks($newAttacks)
    {
        array_push($this->attacks, $newAttacks);
    }

    public function getBonus()
    {
        return $this->bonus;
    }

    // ATTACK FUNCTION IN WHICH YOU RECOVER THE ENEMY'S PV AND CALL UP PRENDREDEGATS FUNCTION AND TAKES THE ENEMY AND HIS ATTACK AS AN ARGUMENT
    public function Attack($enemie, $attack)
    {
        $pv = $enemie->getPv();
        $this->PrendreDegats($pv, $attack, $enemie);
    }

    // FUNCTION THAT SUBTRACTS ATTACK FROM PV AND SETS NEW PV
    // 
    public function PrendreDegats($pv, $attack, $enemie)
    {
        $update = $pv - $attack;
        $enemie->setPv($update);
        echo "\nIl ne reste plus que ", $enemie->getPv(), " PV à ", $enemie->getNom(), "!\n";
    }

    // FUNCTION THAT DISPLAYS THE DEATH SENTENCE
    public function Mourir()
    {
        echo "\e[0;31m", $this->getNom(), " est mort !\e[0m\n";
    }
}

// HERITAGE CLASS FOR HEROES
class Hero extends Personnages
{
    protected $attaque_hero;

    public function __construct($Nom, $Puissance, $Pv, $Attaque_hero)
    {
        parent::__construct($Nom, $Puissance, $Pv);
        $this->attaque_hero = $Attaque_hero;
    }
}

// HERITAGE CLASS FOR VILAIN
class Vilain extends Personnages
{
    protected $attaque_vilain;
    public function __construct($Nom, $Puissance, $Pv, $Attaque_vilain)
    {
        parent::__construct($Nom, $Puissance, $Pv);
        $this->attaque_vilain = $Attaque_vilain;
    }
}

// CLASS FOR EACH CHARACTER. WE'VE DECIDED TO MAKE CLASSES FOR EACH CHARACTER FOR GREATER READABILITY.
class Goku extends Hero
{
    public function __construct()
    {
        $this->nom = "Goku";
        $this->puissance = 20;
        $this->pv = 225;
        $this->default_pv = 225;
        $this->attaque_hero = "";
        $this->attacks = [["Coup de poing", $this->puissance],["boule d'energie",50], ["Kamehameha", 100]];
        $this->bonus = ["Genkidama", 200];
    }
}
class Vegeta extends Hero
{
    public function __construct()
    {
        $this->nom = "Vegeta";
        $this->puissance = 20;
        $this->pv = 225;
        $this->default_pv = 225;
        $this->attaque_hero = "";
        $this->attacks = [["Coup de poing marteau" , $this->puissance],["boule d'energie", 50], ["Canon Garric", 100]];
        $this->bonus = ["Final Flash", 150];

    }
}
class Freezer extends Vilain
{
    public function __construct()
    {
        $this->nom = "Freezer";
        $this->puissance = 20;
        $this->pv = 300;
        $this->default_pv = 300;
        $this->attaque_vilain = "";
        $this->attacks = [["Coup De Queue", $this->puissance],["boule d'energie", 50], ["Boule De La Mort", 120]];
        $this->bonus = ["Supernova", 140];
    }
}
class Cell extends Vilain
{
    public function __construct()
    {
        $this->nom = "Cell";
        $this->puissance = 20;
        $this->pv = 500;
        $this->default_pv = 500;
        $this->attaque_vilain = "";
        $this->attacks = [["Coup De Queue", $this->puissance],["boule d'energie", 50], ["Aspiration", 120]];
        $this->bonus = ["super kamehameha", 170];
    }   
}

class Gohan extends Hero
{

    public function __construct()
    {
        $this->nom = "Gohan";
        $this->puissance = 20;
        $this->pv = 210;
        $this->default_pv = 200;
        $this->attacks = [["Enchainement Saiyan Hybride",["boule d'energie", 50] ,$this->puissance],["Mazenko", 75]];
        $this->bonus = ["Kamehameha Pere-Fils", 190];
    }     
    
}
class Satan extends Hero
{

    public function __construct()
    {
        $this->nom = "Satan";
        $this->puissance = 1;
        $this->pv = 1;
        $this->default_pv = 1;
        $this->attacks = [["coup en traitre",$this->puissance],["lancer de cannette",50],["Feu D'artifice", 2]];
        $this->bonus = ["Lance-Rocket", 5];
    }

}
class Beerus extends Vilain
{

    public function __construct()
    {
        $this->nom = "Beerus";
        $this->puissance = 999;
        $this->pv = 999;
        $this->default_pv = 999;
        $this->attacks = [["Coup Divin", 999]];
        $this->bonus = ["Hakai", 999];
    }

}
class Buu extends Vilain
{

    public function __construct()
    {
        $this->nom = "Buu";
        $this->puissance = 20;
        $this->pv = 600;
        $this->default_pv = 600;
        $this->attacks = [["Coup Longue Distance", $this->puissance],["boule d'energie",50],[" boule d'antivie", 130]];
        $this->bonus = ["Raffale Boule d'Energie", 150];
    }     
    
}
class Trunks extends Hero
{

    public function __construct()
    {
        $this->nom = "Trunks";
        $this->puissance = 20;
        $this->pv = 200;
        $this->default_pv = 190;
        $this->attacks = [["Coup d'Epée", $this->puissance],["boule d'energie", 50],["buster cannon",75]];
        $this->bonus = ["Burning Attack", 150];
    }     
     
}
class Broly extends Vilain
{

    public function __construct()
    {
        $this->nom = "Broly";
        $this->puissance = 20;
        $this->pv = 400;
        $this->default_pv = 400;
        $this->attacks = [["Coup enragée",$this->puissance ],["boule d'energie",50],["Eraser Cannon", 120]];
        $this->bonus = ["Meteor Géant", 180];
    }     
}    
class Display
{
    // PRIVATE AS WE ONLY USE THESE VARIABLES IN THE DISPLAY CLASS
    private $victoire;
    private $defaite;
    private $combat;
    public function __construct()
    {
        $this->victoire = 0;
        $this->defaite = 0;
        $this->combat = 0;
    }

    // COMBAT CLASS, INCLUDING ACTION CHOICE AND ATTACK CHOICE
    public function Combat($allie, $enemie, $current_combat)
    {
        // GLOBAL VARIABLE SO IT CAN BE USED ANYWHERE
        global $abandon;
        $compt = 0;
        while ($compt == 0) {
            // TEXT COMBAT BLINKING (EFFECT)
            popen("cls", "w");
            echo "\e[0;34mCombat ", $current_combat, "\n\n", $allie->getNom(), " (PV :", $allie->getPv(), ") \e[0mVS \e[0;31m",
                $enemie->getNom(), " (PV :", $enemie->getPv(), ")\e[0m\n";
            sleep(1);
            popen("cls", "w");
            echo "Combat ", $current_combat, "\n\n\e[0;34m", $allie->getNom(), " (PV :", $allie->getPv(), ") \e[0mVS \e[0;31m",
                $enemie->getNom(), " (PV :", $enemie->getPv(), ")\e[0m\n";
            sleep(1);
            echo "\n\nQue voulez vous faire ?\n\n1 - Attaquer\n2 - Esquiver\n3 - Abandonner\n";
            $choice = readline("> ");
            switch ($choice) {
                case 1:
                    // UNTIL THE SERIES OF 3 FIGHTS IS OVER, THE FIGHT GOES ON
                    for ($i = 0; $i < $current_combat; $i++) {
                        popen("cls", "w");

                        // DISPLAY NAME AND PV FOR EACH FIGHTER
                        echo "\e[0;34mCombat ", $current_combat, "\n\n", $allie->getNom(), " (PV :", $allie->getPv(), ") VS ",
                            $enemie->getNom(), " (PV :", $enemie->getPv(), ")\e[0m\n\n";

                        // BROWSES THROUGH ALL THE CHARACTER'S ATTACKS AND DISPLAYS THEM
                        for ($i = 0; $i < count($allie->getAttacks()); $i++) {
                            echo $i + 1, " - ", $allie->getAttacks()[$i][0], " (", $allie->getAttacks()[$i][1], ")\n";
                        }

                        echo "\nQuelle attaque souhaites-tu faire ?\n";
                        $choice = readline("> ");

                        // CHOICE OF ATTACK, DAMAGE AND DISPLAY OF ADDAPTED TEXT FOR CHOICE
                        popen("cls", "w");
                        echo $allie->getNom(), " utilise \e[0;31m", $allie->getAttacks()[$choice - 1][0], " !\e[0m\n\n", $allie->getNom(), " à infligé \e[0;31m",
                            $allie->getAttacks()[$choice - 1][1], "\e[0m à ", $enemie->getNom();

                        $allie->Attack($enemie, $allie->getAttacks()[$choice - 1][1]);
                        sleep(2);

                        // MAKE SURE THE ENEMY ISN'T DEAD BEFORE ATTACKING
                        if ($enemie->getPv() > 0) {
                            popen("cls", "w");

                            // THE ENEMY MAKES A RANDOM ATTACK 
                            $rand = random_int(1, count($enemie->getAttacks()) + 1);

                            if ($rand <= count($enemie->getAttacks())) {
                                echo $enemie->getNom(), " utilise \e[0;31m", $enemie->getAttacks()[$rand - 1][0], " !\e[0m\n\n", $enemie->getNom(), " à infligé \e[0;31m",
                                    $enemie->getAttacks()[$rand - 1][1], "\e[0m à ", $allie->getNom();

                                $enemie->Attack($allie, $enemie->getAttacks()[$rand - 1][1]);
                            } else if ($rand == count($enemie->getAttacks()) + 1) {
                                echo "\e[0;33m", $enemie->getNom(), " à esquivé l'attaque de ", $allie->getNom(), "!\e[0m\n";
                                $enemie->setPv($enemie->getPv() + $allie->getAttacks()[$choice - 1][1]);
                            }

                            sleep(2);
                        }

                        // CHECKS IF ENEMY OR ALLY IS DEAD, IF SO, CALLS THE DIE FUNCTION AND EXITS COMBAT
                        if ($allie->getPv() <= 0) {
                            popen("cls", "w");
                            $allie->Mourir();
                            $this->setDefaite($this->getDefaite() + 1);
                            sleep(1);
                            $compt = 1;
                        } else if ($enemie->getPv() <= 0) {
                            popen("cls", "w");
                            $enemie->Mourir();
                            $this->setVictoire($this->getVictoire() + 1);
                            sleep(1);
                            $compt = 1;
                        }
                    }
                    break;
                case 2:
                    popen("cls", "w");
                    $rand = random_int(1, count($enemie->getAttacks()));

                    // IF YOU CHOOSE TO DODGE, THE ENEMY ATTACKS. IF THE ENEMY IS BEERUS, THEN THE DODGE IS CANCELLED.
                    if ($enemie->getnom() != "Beerus") {
                        echo "\e[0;33m", $allie->getNom(), " esquive !\e[0m\n";
                        sleep(2);

                        popen("cls", "w");
                        if ($rand <= count($enemie->getAttacks())) {
                            echo $enemie->getNom(), " utilise \e[0;31m", $enemie->getAttacks()[$rand - 1][0], " !\e[0m\n\nMais ", $allie->getNom(), " à esquivé !\n\n",
                                $enemie->getNom(), " à infligé\e[0;31m 0\e[0m de dégats à ", $allie->getNom();

                        } else if ($rand == count($enemie->getAttacks()) + 1) {
                            echo "\e[0;33m", $enemie->getNom(), " à esquivé aussi !\e[0m\n";
                        }
                        sleep(2);
                    } else if ($enemie->getNom() == "Beerus") {
                        echo "\e[0;33mL'esquive de ", $allie->getNom(), " a été annulée !\e[0m\n";
                        sleep(2);
                        popen("cls", "w");

                        if ($rand <= count($enemie->getAttacks())) {
                            echo $enemie->getNom(), " utilise \e[0;31m", $enemie->getAttacks()[$rand - 1][0], " !\e[0m\n\n", $enemie->getNom(), " à infligé \e[0;31m",
                                $enemie->getAttacks()[$rand - 1][1], "\e[0m à ", $allie->getNom();

                            $enemie->Attack($allie, $enemie->getAttacks()[$rand - 1][1]);
                        } else if ($rand == count($enemie->getAttacks()) + 1) {
                            echo "\e[0;33m", $enemie->getNom(), " à esquivé l'attaque de ", $allie->getNom(), "!\e[0m\n";
                            $enemie->setPv($enemie->getPv() + $allie->getAttacks()[$choice - 1][1]);
                        }
                        sleep(2);
                    }

                    // CHECKS IF ENEMY OR ALLY IS DEAD, IF SO, CALLS THE DIE FUNCTION AND EXITS COMBAT
                    if ($allie->getPv() <= 0) {
                        popen("cls", "w");
                        $allie->Mourir();
                        $this->setDefaite($this->getDefaite() + 1);
                        sleep(1);
                        $compt = 1;
                    } else if ($enemie->getPv() <= 0) {
                        $this->setVictoire($this->getVictoire() + 1);
                    }
                    break;
                case 3:
                    // IF WE WANT TO GIVE UP THEN IT TAKES US OUT OF THE FIGHTING SERIES
                    return $abandon = true;
                default:
                    echo "\e[0;31mCeci n'est pas disponible !\e[0m\n";
            }
        }

        $this->setCombat($this->getCombat() + 1);
        if ($compt == 0) {
            return;
        }

    }

    // GET AND SET FOR ALMOST ALL VARIABLES
    public function getVictoire()
    {
        return $this->victoire;
    }

    public function setVictoire($newVictoire)
    {
        $this->victoire = $newVictoire;
    }

    public function getDefaite()
    {
        return $this->defaite;
    }

    public function setDefaite($newDefaite)
    {
        $this->defaite = $newDefaite;
    }

    public function getCombat()
    {
        return $this->combat;
    }

    public function setCombat($newCombat)
    {
        $this->combat = $newCombat;
    }

    // CHECK IF THE PLAYER HAS 10 WINS OR MORE, IF SO THEN THE GAME STOPS
    public function verifVictoire()
    {
        if ($this->getVictoire() > 10) {
            popen("cls", "w");
            echo "\e[0;32mTu as finis le jeu !\e[0m\n\Appuie sur 1 pour fermer le jeu !\n";
            $choice = readline("> ");
            switch ($choice) {
                case 1:
                    die(0);
                default:
                    echo "\e[0;31mCela n'est pas disponible !\e[0m\n";
                    break;
            }
        }
        ;
    }
}

// INITIALIZE THE GAME AND ALL CHARACTERS
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

// LOOPS OF THE GAME
while ($jeu->getCombat() <= 10) {
    popen("cls", "w");
    echo "Que souhaites-tu faire ?\n\n1 - Jouer\n2 - Voir les personnages\n3 - Règle\n4 - Statistiques\n5 - Sauvegarde\n6 - Quitter\n";
    $choice = readline("> ");
    // CURRENT_COMBAT TO FIND OUT WHICH FIGHT IN THE SERIES THE PLAYER IS AT
    $current_combat = 0;
    global $abandon;
    $abandon = false;
    switch ($choice) {
        case 1:
            // WHEN CURRENT_COMBAT = 4 THEN THE FIGHT SERIE IS FINISHED
            while ($current_combat < 4) {
                // GIVE UP GESTION
                if ($abandon) {
                    $current_combat = 4;
                }
                $current_combat++;
                switch ($current_combat) {
                    case 1:
                        // CALL OF COMBAT FONCTION
                        $jeu->Combat($goku, $freezer, $current_combat);

                        // IF IT'S THE FIRST FIGHT, ALLIE EARN NEW ATTACK FOR THE NEXT FIGHT SERIE
                        if ($jeu->getCombat() == 1) {
                            $goku->setAttacks($goku->getBonus());
                        }
                        break;
                    case 2:
                        // SAME AS CASE 1
                        $jeu->Combat($vegeta, $cell, $current_combat);

                        if ($jeu->getCombat() == 2) {
                            $vegeta->setAttacks($vegeta->getBonus());
                        }
                        break;
                    case 3:
                        // SAME AS CASE 1 & 2
                        $jeu->Combat($trunks, $buu, $current_combat);

                        if ($jeu->getCombat() == 3) {
                            $trunks->setAttacks($trunks->getBonus());
                        }
                        break;
                }

                // AT THE END OF EACH FIGHT, THE GAME IS SAVED IN A TXT FILE WITH THE NUMBER OF FIGHTS, THE NUMBER OF VICTORIES AND DEFEATS.
                $save_content = $jeu->getCombat() . "\n" . $jeu->getVictoire() . "\n" . $jeu->getDefaite();
                $file = fopen("save.txt", "wb");
                fwrite($file, $save_content);
                fclose($file);
            }

            // AT THE END OF EACH SERIES WE CHECK WHETHER THE PLAYER HAS FINISHED THE GAME
            $jeu->verifVictoire();
            break;
        case 2:
            popen("cls", "w");
            echo "Qui souhaites-tu voir ?\n1 - Goku\n2 - Vegeta\n3 - Freezer\n4 - Cell\n5 - Broly\n6 - Satan\n7 - Beerus\n8 - Gohan\n9 - Buu\10 - trunks\n11  - Quitter\n\n";
            $choice = readline("> ");

            // DISPLAY OF ALL AVAILABLE CHARACTERS AND THEIR STATS
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
                    $jeu->setCombat(11);
                    break;
                    echo $broly->getNom(), "\n\nPV : ", $broly->getPv(), "\nPUISSANCE :", $broly->getPuissance(), "\n\n1 - Quitter\n";
                    readline("> ");
                    break; 
                case 6:
                    popen("cls", "w");
                    echo $satan->getNom(), "\n\nPV :SECRET ", "\nPUISSANCE : SECRET ","\n\n1 - Quitter\n";
                    readline("> ");
                    break;
                case 7:
                    popen("cls", "w");
                    echo $beerus->getNom(), "\n\nPV :  SECRET", "\nPUISSANCE : SECRET\n\n1 - Quitter\n";
                    readline("> ");
                    break;
                case 8:
                    popen("cls", "w");
                    echo $gohan->getNom(), "\n\nPV : ", $gohan->getPv(), "\nPUISSANCE :", $gohan->getPuissance(), "\n\n1 - Quitter\n";
                    readline("> ");
                    break;
                case 9:
                    popen("cls", "w");
                    echo $buu->getNom(), "\n\nPV : ", $buu->getPv(), "\nPUISSANCE :", $buu->getPuissance(), "\n\n1 - Quitter\n";
                    readline("> ");
                    break;
                case 10:
                    popen("cls", "w");
                    echo $trunks->getNom(), "\n\nPV : ", $trunks->getPv(), "\nPUISSANCE :", $trunks->getPuissance(), "\n\n1 - Quitter\n";
                    readline("> ");
                case 11:   
                    break;             
                default:
                    echo "\e[0;31mCe n'est pas disponible !\e[0m\n";
            }
            break;
        case 3:
            popen("cls", "w");
            
            // DISPLAY RULES
            echo "Bienvenue sur le jeu Dragon Ball\n\nRemporte 10 victoires afin de terminer le jeu !\n\nBonne chance,\n\nPress une touche\n";
            readline("> ");
            break;
        case 4:
            popen("cls", "w");

            // DISPLAY STATS OF THE CURRENT SAVE SAVE
            if ($jeu->getVictoire() == 0 && $jeu->getDefaite() == 0) {
                echo "Statistiques\n\nCombat : 0\nVictoire : 0\nDefaite : 0\nRatio (V/D) : NA";
            } else if ($jeu->getVictoire() == 0 && $jeu->getDefaite() > 0) {
                echo "Statistiques\n\nCombat : ", $jeu->getCombat(), "\nVictoire : 0\nDefaite : ", $jeu->getDefaite(),
                    "\nRatio (V/D) : 0";
            } else if ($jeu->getVictoire() > 0 && $jeu->getDefaite() == 0) {
                echo "Statistiques\n\nCombat : ", $jeu->getCombat(), "\nVictoire : ", $jeu->getVictoire(),
                    "\nDefaite : 0\nRatio (V/D) : ", $jeu->getVictoire(), "\n";
            } else {
                echo "Statistiques\n\nCombat : ", $jeu->getCombat(), "Victoire : ", $jeu->getVictoire(),
                    "Defaite : ", $jeu->getDefaite(), "\nRatio (V/D) : ", $jeu->getVictoire() / $jeu->getDefaite(), "\n";
            }
            echo "\n\nAppuie sur une touche pour quitter\n";
            readline("> ");
            break;
        case 5:
            // DISPLAY STATS OF THE LAST SAVE AND ASK IF WE WANT USE THE SAVE
            popen("cls", "w");
            $save = "save.txt";
            $lines = file($save);
            echo "Sauvegarde\n\nCombat : ", $lines[0], "Victoire : ", $lines[1], "Defaites : ", $lines[2], "\n\n1 - Utiliser la sauvegarde\n2 - Quitter\n";
            $choice = readline("> ");

            switch ($choice) {
                case 1:
                    // IF YOU WANT TO RECOVER THE SAVE, SET THE BATTLES, VICTORIES AND DEFEATS
                    popen("cls","w");
                    $jeu->setCombat($lines[0]);
                    $jeu->setVictoire($lines[1]);
                    $jeu->setDefaite($lines[2]);

                    // SAVE ANIMATION
                    echo "\e[0;32mRécuperation de la sauvegarde en cours...\e[0m\n";
                    sleep(1);
                    popen("cls","w");
                    echo "\e[0;32mSauvegarde récupérée !\e[0m\n";
                    sleep(1);
                    break;
                case 2:
                    break;
                default:
                    echo "\e[0;31mCeci n'est pas disponible !\e[0m\n";
            }
            break;
        case 6:
            // CLOSE THE GAME
            popen("cls", "w");
            $jeu->setCombat(11);
            break;
        default:
            popen("cls", "w");
            echo "\e[0;31mCe n'est pas disponible !\e[0m\n";
            sleep(1);
            break;
    }
}
?>