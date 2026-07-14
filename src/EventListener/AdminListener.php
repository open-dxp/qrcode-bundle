<?php declare(strict_types = 1);

/**
 * OpenDXP
 *
 * This source file is licensed under the GNU General Public License version 3 (GPLv3).
 *
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @copyright  Copyright (c) GAL Digital GmbH (https://www.gal-digital.de)
 * @copyright  Modification Copyright (c) OpenDXP (https://www.opendxp.io)
 * @license    https://www.gnu.org/licenses/gpl-3.0.html  GNU General Public License version 3 (GPLv3)
 */

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
