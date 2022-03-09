<?php 

namespace murdermystery\toxicgg\Arena;

use jackmd\scorefactory\ScoreFactory;
use pocketmine\player\Player;

class arena extends Arena{
  
    /** @var bool */
    private bool $start = false;

    /** @var int */
    private int $countdown = 15; 
  
    /** @var int */
    private int $timer = 300; //5 minutes
  
    public function tick(): void
    {
         switch ($this->phase) {
             case "LOBBY":
                 foreach ($this->players as $player) {
                     if ($player->isOnline()) {
                         ScoreFactory::setObjective($player, TextFormat::YELLOW . TextFormat::BOLD . "MURDER MYSTER");
                         ScoreFactory::setScoreLine($player, 1, TextFormat::YELLOW . "Players: ". TextFormat::GREEN . count($this->players) . "/16");
                         ScoreFactory::setScoreLine($player, 2, TextFormat::YELLOW . "play.yourservername.com");
                         ScoreFactory::sendObjective($player);
                         ScoreFactory::sendLines($player);
                     }
                 }
         }
    }
                       
