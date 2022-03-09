<?php

namespace murdermystery\toxicgg;

use pocketmine\plugin\PluginBase;
use pocketmine\player\Player;

use pocketmine\entity\Entity;
use pocketmine\entity\EntityFactory;

use pocketmine\block\Block;
use pocketmine\block\BlockFactory;

use murdermystery\toxicgg\utils\Utils;
use murdermystery\utils\SEntity;
use murdermystery\arena\Arena;
use murdermystery\commands\Commands;

class Murder extends PluginBase{
  
      /** @var MurderMystery */
    private static MurderMystery $instance;

    /** @var Game[] */
    private array $game = [];

    /** @return TheBridge */
    public static function getInstance(): MurderMystery{
        return self::$instance;
    }

    public function onLoad(): void
    {
        self::$instance = $this;
    }
  
  public function onLoad(): void{
    $this->getLogger->info("Loading MurderMystery...");
    $this->getLogger->info("...");
  }
  
  public function onEnable(): void{
    $this->getLogger->info("Enabled MurderMystery");
    $this->getLogger->info("By ItsToxicGG");
    $this->getServer()->getCommandMap()->register("murdermystery", new Commands($this, "murdermystery", "Murder Mystery Command", ["mm"]));
  }
  
  public function onDisable(): void{
    $this->getLogger->info("Disabling MurderMystery !!!");
    
  }
}
