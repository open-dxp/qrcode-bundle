# OpenDXP QR-Code bundle

Adds a backend configuration view for QR-Codes.

This project is a fork of the [GAL Digital - QR-Code bundle (883684f / v2.0.0)](https://github.com/gal-digital-gmbh/pimcore-qrcode-bundle/commits/main), which is licensed under GPLv3.

## Requirements
OpenDxp >= 1.0

## Installation

Require the bundle

```bash
composer require open-dxp/qrcode-bundle
```

Add the bundle to the `config/bundles.php` file to enable it. The following lines should be added:

```php
return [
    OpenDxp\Bundle\QrcodeBundle\OpenDxpQrcodeBundle::class => ['all' => true],
];
```

Execute: `$ bin/console doctrine:migrations:migrate --prefix 'OpenDxp\Bundle\QrcodeBundle\Migrations'`

## Upgrading
- Execute: `$ bin/console doctrine:migrations:migrate --prefix 'OpenDxp\Bundle\QrcodeBundle\Migrations'`

***

## Configuration
Per default, qr codes will be stored in `config/qrcode/*.yaml`.

If you want to change the write target, adjust it like this:

```yaml
opendxp_qrcode:
    config_location:
        qrcode:
            write_target:
                type: 'settings-store'
```

***

## License
Licensed under the GNU General Public License v3.0 (GPLv3). For details, please see [LICENSE.md](LICENSE.md).

## Copyright
© GAL Digital GmbH  
© 2026 OpenDXP Contributors — GPLv3

***

## Contact
For inquiries, suggestions, or contributions, feel free to reach us at contact@opendxp.io.

## About
OpenDXP is a community-driven project initiated by [DACHCOM.DIGITAL](https://www.dachcom.com/de-ch) (Rheineck, Switzerland) and maintained by its community and contributors.

The project’s purpose is to preserve and maintain a GPLv3‑licensed codebase for community use.
