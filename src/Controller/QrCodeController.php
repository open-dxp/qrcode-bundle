<?php declare(strict_types = 1);

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
