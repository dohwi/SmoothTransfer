<?php

declare(strict_types=1);

namespace SmoothTransfer;

use pocketmine\event\EventPriority;
use pocketmine\event\player\PlayerLoginEvent;
use pocketmine\event\player\PlayerTransferEvent;
use pocketmine\network\mcpe\protocol\CameraInstructionPacket;
use pocketmine\network\mcpe\protocol\types\camera\CameraFadeInstruction;
use pocketmine\network\mcpe\protocol\types\camera\CameraFadeInstructionTime;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\scheduler\ClosureTask;

final class SmoothTransfer extends PluginBase
{
    protected function onEnable(): void
    {
        // 로그인 시 페이드아웃 애니메이션
        $this->getServer()->getPluginManager()->registerEvent(PlayerLoginEvent::class, function(PlayerLoginEvent $event): void {
            self::sendCameraInstructionPacket($event->getPlayer(), 0, 1, 1);
        }, EventPriority::NORMAL, $this);

        // 서버 이동 시 페이드인 애니메이션
        $this->getServer()->getPluginManager()->registerEvent(PlayerTransferEvent::class, function(PlayerTransferEvent $event): void {
            $event->cancel();
            $player = $event->getPlayer();
            $address = $event->getAddress();
            $port = $event->getPort();
            self::sendCameraInstructionPacket($player, 1, 3);
            self::getScheduler()->scheduleDelayedTask(new ClosureTask(function () use ($player, $address, $port) {
                $player->getNetworkSession()->transfer($address, $port);
            }), 60);
        }, EventPriority::NORMAL, $this);
    }

    private static function sendCameraInstructionPacket(Player $player, int $fadeInTime = 0, int $stayTime = 1, int $fadeOutTime = 0): void
    {
        $player->getNetworkSession()->sendDataPacket(CameraInstructionPacket::create(null, null, new CameraFadeInstruction(new CameraFadeInstructionTime($fadeInTime, $stayTime, $fadeOutTime), null), null, null, null));
    }
}