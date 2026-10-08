<?php

declare(strict_types=1);

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

namespace OpenDxp\Bundle\QrcodeBundle;

use Doctrine\DBAL\Connection;
use OpenDxp\Extension\Bundle\Installer\SettingsStoreAwareInstaller;
use Override;
use Symfony\Component\HttpKernel\Bundle\BundleInterface;

final class Installer extends SettingsStoreAwareInstaller
{
    public const string PERMISSION = 'qr_codes';

    private const string PERMISSION_CATEGORY = 'QR-Code Bundle';

    public function __construct(
        BundleInterface $bundle,
        private readonly Connection $connection
    ) {
        parent::__construct($bundle);
    }

    #[Override]
    public function install(): void
    {
        $this->connection->executeStatement(
            'INSERT INTO users_permission_definitions (`key`, `category`) VALUES (?, ?) ON DUPLICATE KEY UPDATE `category` = VALUES(`category`)',
            [self::PERMISSION, self::PERMISSION_CATEGORY],
        );

        $this->markMigrationsAsExecuted();

        parent::install();
    }
}
