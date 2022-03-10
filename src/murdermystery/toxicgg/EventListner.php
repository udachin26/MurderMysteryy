Hi
<?php

namespace murdermystery\toxicgg;

use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\player\PlayerExhaustEvent;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\math\Vector3;
use pocketmine\player\Player;
use pocketmine\utils\TextFormat;

use murdermystery\toxicgg\Murder;
use murdermystery\toxicgg\Arena\Arena;

class EventListener implements Listener{
   
    public function onQuit(PlayerQuitEvent $event){
        $player = $event->getPlayer();
        if(($game = Murder::getInstance()->getPlayerGame($player)) instanceof Arena){
            $game->removePlayer($player);
        }
    }

    public function onPlace(BlockPlaceEvent $event){
        $player = $event->getPlayer();
        if(($game = Murder::getInstance()->getPlayerGame($player)) instanceof Game){
            $game->placedblock[Utils::vectorToString($event->getBlock()->getPosition()->asVector3())] = $event->getBlock()->getPosition()->asVector3();
        }
    }

    /**
     * @param BlockBreakEvent $event
     */
    public function onBreak(BlockBreakEvent $event){
        $player = $event->getPlayer();
        if(($game = Murder::getInstance()->getPlayerGame($player)) instanceof Game){
            if(isset($game->placedblock[Utils::vectorToString($event->getBlock()->getPosition()->asVector3())])){
                unset($game->placedblock[Utils::vectorToString($event->getBlock()->getPosition()->asVector3())]);
            } else {
                $event->cancel();
            }
        }
    }
   
    public function onExhaust(PlayerExhaustEvent $event){
        $player = $event->getPlayer();
        if(($game = Murder::getInstance()->getPlayerGame($player)) instanceof Game){
            $event->cancel();
            $event->getPlayer()->getHungerManager()->setFood(20);
        }
    }

    public function onDamage(EntityDamageEvent $event){
        $player = $event->getEntity();
        if($player instanceof Player) {
            if (($game = Murder::getInstance()->getPlayerGame($player)) instanceof Game) {
                if($game->phase == "LOBBY" || $game->phase == "COUNTDOWN"){
                    $event->cancel();
                }
            }
        }
    }

    public function onChat(PlayerChatEvent $event){
        $player = $event->getPlayer();
        if(($game = TheBridge::getInstance()->getPlayerGame($player)) instanceof Game) {
            $game->broadcastMessage($player, $event->getMessage());
            $event->cancel();
        }
    }
}
