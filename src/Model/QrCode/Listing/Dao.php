<?php declare(strict_types = 1);

namespace OpenDxp\Bundle\QrcodeBundle\Model\QrCode\Listing;

use OpenDxp\Bundle\QrcodeBundle\Model\QrCode;
use OpenDxp\Bundle\QrcodeBundle\Model\QrCode\Listing;

/**
 * @property Listing $model
 *
 * @internal
 */
class Dao extends QrCode\Dao
{
    /**
     * @return QrCode[]
     */
    public function loadList(): array
    {
        $qrCodes = [];

        foreach ($this->loadIdList() as $id) {
            if ($qrCode = QrCode::getByName($id)) {
                $qrCodes[] = $qrCode;
            }
        }
        if ($this->model->getFilter()) {
            $qrCodes = array_filter($qrCodes, $this->model->getFilter());
        }
        if ($this->model->getOrder()) {
            usort($qrCodes, $this->model->getOrder());
        }

        $this->model->setCodes($qrCodes);

        return $qrCodes;
    }

    public function getTotalCount(): int
    {
        return count($this->loadList());
    }
}
