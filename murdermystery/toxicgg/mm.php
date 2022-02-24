<?php

namespace murdermystery\toxicgg;

use pocketmine\plugin\PluginBase;
use pocketmine\player\Player;

use pocketmine\entity\Entity;
use pocketmine\entity\EntityFactory;

class mm extends PluginBase{
  
  public function onLoad{
    $this->getLogger->info("Loading MurderMystery...");
    $this->getLogger->info("...");
  }
  
  public function onEnable{
    $this->getLogger->info("Enabled MurderMystery");
    $this->getLogger->info("By ItsToxicGG");
  }
  
  public function onDisable{
    $this->getLogger->info("Disabling MurderMystery !!!");
  }
