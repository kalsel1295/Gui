<?php

namespace Gui\TheBlast;

use pocketmine\Server;
use pocketmine\Player;

use pocketmine\plugin\PluginBase;
use pocketmine\plugin\Plugin

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use pocketmine\item\Item;

use pocketmine\event\Listener;

use muqsit\invmenu\InvMenu;
use muqsit\invmenu\InvMenuHandler;

class Main extends PluginBase {

  public function onEnable() {
    $this->getLogger()->info("Gui Transfer Enable");
    if(InvMenuHandler::isRegistered()) {
      InvMenuHandler::register($this);
    }
  }
  
  public function onDisable() {
    $this->getLogger()->info("Gui Transfer Disable");
  }

  public function onCommand(CommandSender $player, Command $cmd, string $label, array $args):bool {
    switch($cmd->getName()) {
      case "tgui":
      if(!$player instanceof Player) {
        $player->sendMessage("Youve been transfered");
        return true;
      }
      this->tgui($player);
      break;
    }
    return true;
    
    public function tgui(Player $player) {
      $menu = InvMenu::create(InvMenu::TYPE_DOUBLE_CHEST);
      $menu->readOnly();
      $menu->setListener([$this, "GUiListener"]);
      $menu->setName("Transfer");
      $menu->send(player);
      $inv = menu->getInventory();
      $feather= Item::get(Item::FEATHER)->setCustomName("Skywars");
      $inv->setItem(1, $feather);
    }
    
    public function GUIListener(Player $player, Item $itemClicked) {
      if($itemClicked->getId() == 288) {
        $player->sendMessage("transfer");
        $player->transfer("", 
      }
    }
  }
