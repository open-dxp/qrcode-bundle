<?php declare(strict_types = 1);

namespace OpenDxp\Bundle\QrcodeBundle\EventListener;

use OpenDxp\Bundle\AdminBundle\Event\IndexActionSettingsEvent;
use OpenDxp\Bundle\QrcodeBundle\Model\QrCode;

final class AdminListener
{
    /**
     * Handles INDEX_ACTION_SETTINGS event and adds custom admin UI settings
     */
    public function addIndexSettings(IndexActionSettingsEvent $event): void
    {
        $event->addSetting('qrcode-writeable', (new QrCode())->isWriteable());
    }
}
