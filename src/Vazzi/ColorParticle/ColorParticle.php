<?php

declare(strict_types=1);

namespace Vazzi\ColorParticle;

use pocketmine\level\particle\DustParticle;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;

class ColorParticle extends PluginBase
{


	/**
	 * @var ColorParticle
	 */
	private static $instance;

	/**
	 * @return ColorParticle
	 */
	public static function getInstance(): ColorParticle
	{
		return self::$instance;
	}


	const Colors = ["Red", "Green", "Blue", "Orange", "Yellow", "White", "Black", "Aqua", "Pink", "Purple", "Rainbow"];

	public $playerparticle = [];

	public function onLoad()
	{
		self::$instance = $this;
	}

	public function onEnable()
	{
		$this->getServer()->getCommandMap()->register("ColorParticle", new ColorParticleCommand());
		$this->getServer()->getPluginManager()->registerEvents(new ParticleListener(), $this);
		$this->getScheduler()->scheduleRepeatingTask(new SpawnParticleTask(), 1);
	}

	public function translateColor($color, Player $player){
		switch ($color){

			case "Red":
				return new DustParticle($player->asVector3()->add(0,0.2,0), 255,0,0);
			case "Green":
				return new DustParticle($player->asVector3()->add(0,0.2,0), 0,255,0);
			case "Blue":
				return new DustParticle($player->asVector3()->add(0,0.2,0), 0,0,255);
			case "Orange":
				return new DustParticle($player->asVector3()->add(0,0.2,0), 255,165,0);
			case "Yellow":
				return new DustParticle($player->asVector3()->add(0,0.2,0), 250,250,55);
			case "White":
				return new DustParticle($player->asVector3()->add(0,0.2,0), 255,255,255);
			case "Black":
				return new DustParticle($player->asVector3()->add(0,0.2,0), 0,0,0);
			case "Aqua":
				return new DustParticle($player->asVector3()->add(0,0.2,0), 0,255,255);
			case "Pink":
				return new DustParticle($player->asVector3()->add(0,0.2,0), 255,20,147);
			case "Purple":
				return new DustParticle($player->asVector3()->add(0,0.2,0), 159,0,197);
			case "Rainbow":
				return "Rainbow";


				//Thanks to https://rgbcolorcode.com

		}
		return null;
	}

}