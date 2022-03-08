<?php

namespace murdermystery\toxicgg\commands;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class Commands extends CommandSender{
  
  public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool{
    switch($command->getName()){
        case "help":
            $sender->sendMessage("§c-======= MurderMystery Commands =======-");
            $sender->sendMessage("§c/murdermystery help");
            $sender->sendMessage("§c/murdermystery info");

            return true;
        case "info":
           $sender->sendMessage("§eMurderMystery Plugin by ItsToxicGG");
           $sender->sendMessage("§cFound an problem? Report a issue on github or contact me on discord (ItsToxicGG#7420)");
        
           return true;
        default:
            throw new \AssertionError("This line will never be executed");
    }
}
