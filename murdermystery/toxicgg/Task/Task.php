<?php

namespace murdermystery\toxicgg\Task;

use pocketmine\scheduler\Task;
use murdermystery\toxicgg\mm;
            
class Task extends Task{

    public function __construct(mm $main, string $playername){
       $this->mm = $main;
    }
}

// more soon!
