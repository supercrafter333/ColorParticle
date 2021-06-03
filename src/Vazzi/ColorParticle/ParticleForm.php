<?php


namespace Vazzi\ColorParticle;


use pocketmine\form\Form;
use pocketmine\Player;

class ParticleForm implements Form
{
	private $data;

	public function __construct()
	{
		$this->data["type"] = "form";
		$this->data["title"] = "§bColorParticle";
		$this->data["content"] = "§fUse different colored particles while walking";
		$this->data["buttons"] = [];

		foreach (ColorParticle::Colors as $color) {
			$this->data["buttons"][] = ["text" => $color . " Particle"];
		}
		$this->data["buttons"][] = ["text" => "§cClear Particle"];
	}

	/**
	 * @param Player $player
	 * @param mixed $data
	 */
	public function handleResponse(Player $player, $data): void
	{
		if($data !== null){

			if(isset(ColorParticle::Colors[$data])) {

				$player->sendMessage("§aYou are using " . ColorParticle::Colors[$data] . " Particle");
				ColorParticle::getInstance()->playerparticle[$player->getName()] = ColorParticle::Colors[$data];

			}else{

				$player->sendMessage("§aYou cleared your Particle.");
				unset(ColorParticle::getInstance()->playerparticle[$player->getName()]);

			}

		}
	}

	/**
	 * @return mixed
	 */
	public function jsonSerialize()
	{
		return $this->data;
	}
}