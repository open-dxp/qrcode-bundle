<?php declare(strict_types = 1);

namespace OpenDxp\Bundle\QrcodeBundle\Exception;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final class QrCodeNotFoundException extends NotFoundHttpException
{
}
