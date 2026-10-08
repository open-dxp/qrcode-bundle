<?php

declare(strict_types=1);

namespace OpenDxp\Bundle\QrcodeBundle\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;
use OpenDxp\Bundle\QrcodeBundle\OpenDxpQrcodeBundle;
use Override;

final class Version20261004170000 extends AbstractMigration
{
    #[Override]
    public function getDescription(): string
    {
        return 'Marks an installation that came through the migrations as installed, since the bundle has an installer.';
    }

    #[Override]
    public function up(Schema $schema): void
    {
        $this->addSql(
            'INSERT INTO settings_store (id, scope, type, data) VALUES (?, ?, ?, ?) ON DUPLICATE KEY UPDATE data = VALUES(data);',
            ['BUNDLE_INSTALLED__' . OpenDxpQrcodeBundle::class, 'opendxp', 'bool', '1'],
        );
    }

    #[Override]
    public function down(Schema $schema): void
    {
    }
}
