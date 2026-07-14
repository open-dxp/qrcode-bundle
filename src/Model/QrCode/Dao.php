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

use Exception;
use OpenDxp;
use OpenDxp\Bundle\QrcodeBundle\Model\QrCode;
use OpenDxp\Model\Dao\OpenDxpLocationAwareConfigDao;
use OpenDxp\Model\Exception\NotFoundException;

/**
 * @property QrCode $model
 *
 * @internal
 */
class Dao extends OpenDxpLocationAwareConfigDao
{
    /**
     * @var string[]
     */
    private static array $allowedProperties = [
        'name',
        'description',
        'url',
        'creationDate',
        'modificationDate',
    ];

    public function configure(): void
    {
        /** @var array<mixed>|null $config */
        $config = OpenDxp::getContainer()?->getParameter('opendxp_qrcode');

        parent::configure([
            'containerConfig' => $config['codes'] ?? [],
            'settingsStoreScope' => 'opendxp_qrcode',
            'storageConfig' => $config['config_location']['qrcode'] ?? [],
        ]);
    }

    public function getByName(string $name): void
    {
        $data = $this->getDataByName($name);

        if ($data) {
            $this->assignVariablesToModel($data);
        } else {
            throw new NotFoundException('QR-Code with name: ' . $name . ' does not exist');
        }
    }

    /**
     * @throws Exception
     */
    public function save(): void
    {
        $time = time();

        if (!$this->model->getCreationDate()) {
            $this->model->setCreationDate($time);
        }

        $this->model->setModificationDate($time);

        $rawData = $this->model->getObjectVars();

        $data = array_filter($rawData, function ($property) {
            return in_array($property, self::$allowedProperties);
        }, ARRAY_FILTER_USE_KEY);

        $this->saveData($this->model->getName(), $data);
    }

    public function delete(): void
    {
        $this->deleteData($this->model->getName());
    }

    protected function prepareDataStructureForYaml(string $id, mixed $data): mixed
    {
        return [
            'opendxp_qrcode' => [
                'codes' => [
                    $id => $data,
                ],
            ],
        ];
    }
}
