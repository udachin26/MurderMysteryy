<?php

namespace murdermystery\toxicgg;

use pocketmine\plugin\PluginBase;
use pocketmine\player\Player;

use pocketmine\entity\Entity;
use pocketmine\entity\EntityFactory;

use pocketmine\block\Block;
use pocketmine\block\BlockFactory;

use CortexPE\Commando\PacketHooker;
use murdermystery\toxicgg\utils\Utils;
use murdermystery\utils\SEntity;
use murdermystery\arena\Arena;
use murdermystery\commands\Commands;

class Murder extends PluginBase{
  
      /** @var MurderMystery */
    private static MurderMystery $instance;

    /** @var Game[] */
    private array $game = [];
  
    /** @return Murder Mystery */
    public static function getInstance(): MurderMystery{
        return self::$instance;
    }

    public function onLoad(): void
    {
        $this->getLogger->info("Loading MurderMystery...");
        $this->getLogger->info("...");
    }
  
    public function onEnable(): void
    {
        if (!PacketHooker::isRegistered()) {
            PacketHooker::register($this);
        }
        @mkdir($this->getDataFolder() . "arenas/");
        $this->getServer()->getPluginManager()->registerEvents(new EventListener(), $this);
        $this->getServer()->getCommandMap()->register("thebridge", new TheBridgeCommand($this, "thebridge", "TheBridge Command", ["tb"]));
    }
  
    public function onDisable(): void{
        $this->getLogger->info("Disabling MurderMystery !!!");
    }
    
    public function createArena(string $arena): bool{
        if($this->getGame($arena) !== null){
            return false;
        }
        $this->game[$arena] = new Game(null,null,null,null,null, $arena);
        return true;
    }
      
    public function getGame(string $name): ?Game{
        return $this->game[$name] ?? null;
    }

    public function getGames(): array{
        return $this->game;
    }

    public function getPlayerGame(Player $player): ?Game{
        foreach ($this->getGames() as $game){
            if($game->isInGame($player)){
                return $game;
            }
        }
        return null;
    }
}
