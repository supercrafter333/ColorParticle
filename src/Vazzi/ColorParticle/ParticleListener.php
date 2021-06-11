<?php


namespace Vazzi\ColorParticle;


use pocketmine\event\Listener;
use pocketmine\event\player\PlayerQuitEvent;

class ParticleListener implements Listener
{

	public function PlayerLeave(PlayerQuitEvent $event)
	{
		unset(ColorParticle::getInstance()->playerparticle[$event->getPlayer()->getName()]);
	}


}