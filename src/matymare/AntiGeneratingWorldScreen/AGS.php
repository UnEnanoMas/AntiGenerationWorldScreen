<?php

namespace matymare\AntiGeneratingWorldScreen;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

class AGS extends PluginBase implements Listener{
    
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this,$this);
    }
    
    public function onDamage(EntityDamageEvent $event) {
$player = $event->getEntity();
if($event->getFinalDamage() >= $player->getHealth()) {
$event->setCancelled();
$player->teleport($this->getServer()->getDefaultLevel()->getSafeSpawn());
$player->setHealth($player->getMaxHealth());
   }
}

    public function onDisable(){
    }
}

