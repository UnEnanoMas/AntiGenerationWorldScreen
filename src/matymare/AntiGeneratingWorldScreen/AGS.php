<?php

/**
 * 
 * Copyright 2020 matymare
 * 
 * Do not sell, modify or anything similar to the plugin without any question from the plugin owner!
 * I created the plugin due to a bug on my server.
 * 
 */

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
$player->addTitle("§l§cYOU DIED!", "§r§eTeleported to lobby", 1, 100, 50);
   }
}

    public function onDisable(){
    }
}
