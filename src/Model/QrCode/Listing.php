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

namespace OpenDxp\Bundle\QrcodeBundle\Model\QrCode;

use OpenDxp\Bundle\QrcodeBundle\Model\QrCode;
use OpenDxp\Bundle\QrcodeBundle\Model\QrCode\Listing\Dao;
use OpenDxp\Model\AbstractModel;
use OpenDxp\Model\Listing\Traits\FilterListingTrait;
use OpenDxp\Model\Listing\Traits\OrderListingTrait;

/**
 * @method Dao getDao()
 */
final class Listing extends AbstractModel
{
    use FilterListingTrait;
    use OrderListingTrait;

    /**
     * @var QrCode[]|null
     */
    protected ?array $codes = null;

    /**
     * @return QrCode[]
     */
    public function getCodes(): array
    {
        if ($this->codes === null) {
            return $this->getDao()->loadList();
        }

        return $this->codes;
    }

    /**
     * @param QrCode[]|null $codes
     */
    public function setCodes(?array $codes): self
    {
        $this->codes = $codes;

        return $this;
    }

    /**
     * @return QrCode[]
     */
    public function load(): array
    {
        return $this->getCodes();
    }
}
