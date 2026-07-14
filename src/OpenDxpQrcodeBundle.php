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

namespace OpenDxp\Bundle\QrcodeBundle;

use OpenDxp\Bundle\QrcodeBundle\DependencyInjection\OpenDxpQrcodeExtension;
use OpenDxp\Extension\Bundle\AbstractOpenDxpBundle;
use OpenDxp\Extension\Bundle\OpenDxpBundleAdminClassicInterface;
use OpenDxp\Extension\Bundle\Traits\BundleAdminClassicTrait;
use OpenDxp\Extension\Bundle\Traits\PackageVersionTrait;
use Override;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use function dirname;

final class OpenDxpQrcodeBundle extends AbstractOpenDxpBundle implements OpenDxpBundleAdminClassicInterface
{
    use BundleAdminClassicTrait;
    use PackageVersionTrait;

    public const string PACKAGE_NAME = 'open-dxp/qrcode-bundle';

    #[Override]
    public function getContainerExtension(): ?ExtensionInterface
    {
        if (null === $this->extension) {
            $this->extension = new OpenDxpQrcodeExtension();
        }

        return $this->extension ?: null;
    }

    #[Override]
    public function getPath(): string
    {
        return dirname(__DIR__);
    }

    public function getNiceName(): string
    {
        return 'QR-Code Bundle';
    }

    public function getDescription(): string
    {
        return 'Adds a backend configuration view for QR-Codes.';
    }

    public function getJsPaths(): array
    {
        return [
            '/bundles/opendxpqrcode/admin/js/startup.js',
            '/bundles/opendxpqrcode/admin/js/panel.js',
            '/bundles/opendxpqrcode/admin/js/item.js',
        ];
    }

    protected function getComposerPackageName(): string
    {
        return self::PACKAGE_NAME;
    }
}
