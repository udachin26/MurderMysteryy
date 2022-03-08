<?php

namespace murdermystery\toxicgg;

use pocketmine\plugin\PluginBase;
use pocketmine\player\Player;

use pocketmine\entity\Entity;
use pocketmine\entity\EntityFactory;

use pocketmine\block\Block;
use pocketmine\block\BlockFactory;

class mm extends PluginBase{
  
  public function onLoad(): void{
    $this->getLogger->info("Loading MurderMystery...");
    $this->getLogger->info("...");
  }
  
  public function onEnable(): void{
    $this->getLogger->info("Enabled MurderMystery");
    $this->getLogger->info("By ItsToxicGG");
  }
  
  public function onDisable(): void{
    $this->getLogger->info("Disabling MurderMystery !!!");
  }
