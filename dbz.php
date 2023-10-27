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

    public function setAttacks($newAttacks)
    {
        array_push($this->attacks, $newAttacks);
    }

    public function getBonus()
    {
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
        echo "\e[0;31m", $this->getNom(), " est mort !\e[0m\n";
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
        $this->attacks = [["Coup de poing marteau", $this->puissance], ["Canon Garric", 50]];
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

    public function __construct()
    {
        $this->nom = "Gohan";
        $this->puissance = 15;
        $this->pv = 100;
        $this->default_pv = 100;
        $this->attacks = [[" Enchainement Saiyan Hybride", $this->puissance], ["Mazenko", 50]];
        $this->bonus = ["Kamehameha Pere-Fils", 100];
    }

}
class Satan extends Hero
{

    public function __construct()
    {
        $this->nom = "Satan";
        $this->puissance = 18;
        $this->pv = 1;
        $this->default_pv = 100;
        $this->attacks = [["Lancer de canette", 1], ["Feu D'artifice", 2]];
        $this->bonus = ["Lance-Rocket", 5];
    }

}
class Beerus extends Vilain
{

    public function __construct()
    {
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

    public function __construct()
    {
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

    public function __construct()
    {
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

    public function __construct()
    {
        $this->nom = "Broly";
        $this->puissance = 22;
        $this->pv = 100;
        $this->default_pv = 100;
        $this->attacks = [["Coup enragée", 50], ["Eraser Cannon", 60]];
        $this->bonus = ["Meteor Géant", 100];
    }
}
class Display
{
    private $victoire;
    private $defaite;
    private $combat;
    public function __construct()
    {
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
                    for ($i = 0; $i < $current_combat; $i++) {
                        popen("cls", "w");
                        echo "\e[0;34mCombat ", $current_combat, "\n\n", $allie->getNom(), " (PV :", $allie->getPv(), ") VS ",
                            $enemie->getNom(), " (PV :", $enemie->getPv(), ")\e[0m\n\n";

                        for ($i = 0; $i < count($allie->getAttacks()); $i++) {
                            echo $i + 1, " - ", $allie->getAttacks()[$i][0], " (", $allie->getAttacks()[$i][1], ")\n";
                        }

                        echo "\nQuelle attaque souhaites-tu faire ?\n";
                        $choice = readline("> ");

                        popen("cls", "w");
                        echo $allie->getNom(), " utilise \e[0;31m", $allie->getAttacks()[$choice - 1][0], " !\e[0m\n\n", $allie->getNom(), " à infligé \e[0;31m",
                            $allie->getAttacks()[$choice - 1][1], "\e[0m à ", $enemie->getNom();

                        $allie->Attack($enemie, $allie->getAttacks()[$choice - 1][1]);
                        sleep(2);

                        if ($enemie->getPv() > 0) {
                            popen("cls", "w");
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

while ($jeu->getCombat() <= 10) {
    popen("cls", "w");
    echo "Que souhaites-tu faire ?\n\n1 - Jouer\n2 - Voir les personnages\n3 - Règle\n4 - Statistiques\n5 - Sauvegarde\n6 - Quitter\n";
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
                        $jeu->Combat($goku, $freezer, $current_combat);
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
                        $jeu->Combat($trunks, $buu, $current_combat);

                        if ($jeu->getCombat() == 2) {
                            $trunks->setAttacks($trunks->getBonus());
                        }
                        break;
                }

                $save_content = $jeu->getCombat() . "\n" . $jeu->getVictoire() . "\n" . $jeu->getDefaite();
                $file = fopen("save.txt", "wb");
                fwrite($file, $save_content);
                fclose($file);
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
                    $jeu->setCombat(11);
                    break;
                default:
                    echo "\e[0;31mCe n'est pas disponible !\e[0m\n";
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
            popen("cls", "w");
            $save = "save.txt";
            $lines = file($save);
            echo "Sauvegarde\n\nCombat : ", $lines[0], "Victoire : ", $lines[1], "Defaites : ", $lines[2], "\n\n1 - Utiliser la sauvegarde\n2 - Quitter\n";
            $choice = readline("> ");

            switch ($choice) {
                case 1:
                    popen("cls","w");
                    $jeu->setCombat($lines[0]);
                    $jeu->setVictoire($lines[1]);
                    $jeu->setDefaite($lines[2]);
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