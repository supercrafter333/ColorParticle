<?php


namespace Vazzi\ColorParticle;


use pocketmine\event\Listener;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\event\player\PlayerQuitEvent;

class ParticleListener implements Listener
{

	public function PlayerMove(PlayerMoveEvent $event)
	{
		$player = $event->getPlayer();
		if(isset(ColorParticle::getInstance()->playerparticle[$player->getName()])) {
			if (in_array(ColorParticle::getInstance()->playerparticle[$player->getName()], ColorParticle::Colors)) {
				if (($color = ColorParticle::getInstance()->translateColor(ColorParticle::getInstance()->playerparticle[$player->getName()], $player)) !== null) {
					$player->getLevel()->addParticle($color);
				}

			}
		}
	}

	public function PlayerLeave(PlayerQuitEvent $event)
	{
		unset(ColorParticle::getInstance()->playerparticle[$event->getPlayer()->getName()]);
	}


}