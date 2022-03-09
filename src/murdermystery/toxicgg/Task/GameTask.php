<?php

namespace murdermystery\toxicgg\Task;

use pocketmine\scheduler\Task;
use murdermystery\toxicgg\Murder;
            
class GameTask extends Task{

    public function __construct(Murder $main, string $playername){
       $this->Murder = $main;
    }
}

// more soon!
