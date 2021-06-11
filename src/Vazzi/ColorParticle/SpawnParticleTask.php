<?php


namespace Vazzi\ColorParticle;

use pocketmine\scheduler\Task;

class SpawnParticleTask extends Task
{

	/**
	 * @param int $currentTick
	 */
	public function onRun(int $currentTick)
	{
		foreach (ColorParticle::getInstance()->getServer()->getOnlinePlayers() as $player) {
			if ($player !== null) {
				if (isset(ColorParticle::getInstance()->playerparticle[$player->getName()])) {
					if (in_array(ColorParticle::getInstance()->playerparticle[$player->getName()], ColorParticle::Colors)) {
						if (($color = ColorParticle::getInstance()->translateColor(ColorParticle::getInstance()->playerparticle[$player->getName()], $player)) !== null) {
							if ($color !== "Rainbow") {
								$player->getLevel()->addParticle($color);
							} else {
								foreach (ColorParticle::Colors as $onecolor) {
									if ($onecolor !== "Rainbow") {
										$player->getLevel()->addParticle(ColorParticle::getInstance()->translateColor($onecolor, $player));
									}
								}
							}
						}
					}
				}
			}
		}

	}
}