<?php

declare(strict_types=1);

namespace OpenDxp\Bundle\QrcodeBundle\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260714083520 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('INSERT IGNORE INTO users_permission_definitions (`key`) VALUES("qr_codes");');
        $this->addSql('UPDATE users_permission_definitions SET category = "QR-Code Bundle" WHERE `key` = "qr_codes";');
    }

    public function down(Schema $schema): void
    {
    }
}
