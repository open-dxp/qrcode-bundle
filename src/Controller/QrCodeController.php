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

namespace OpenDxp\Bundle\QrcodeBundle\Controller;

use OpenDxp\Bundle\QrcodeBundle\Exception\QrCodeNotFoundException;
use OpenDxp\Bundle\QrcodeBundle\Model\QrCode;
use OpenDxp\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class QrCodeController extends FrontendController
{
    public function code(Request $request): Response
    {
        $name = $request->get('name');
        $code = QrCode::getByName($name);

        if (!$code) {
            throw new QrCodeNotFoundException(sprintf('QR code with name "%s" not found', $name));
        }

        return $this->redirect($code->getUrl());
    }
}
