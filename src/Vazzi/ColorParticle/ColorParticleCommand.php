<?php

namespace Vazzi\ColorParticle;


use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginIdentifiableCommand;
use pocketmine\Player;
use pocketmine\plugin\Plugin;

class ColorParticleCommand extends Command implements PluginIdentifiableCommand
{


	public function __construct()
	{
		parent::__construct("colorparticle","Use different colored particles while walking", "colorparticle", ["cp", "pcolor"]);
		$this->setPermission("colorparticle.permission");
	}

	/**
     * @inheritDoc
     */
    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if(!$sender instanceof Player) return true;

        if(!$sender->hasPermission($this->getPermission())) return true;

        $sender->sendForm(new ParticleForm());

        return true;
    }

	public function getPlugin(): Plugin
	{
		return ColorParticle::getInstance();
	}
}