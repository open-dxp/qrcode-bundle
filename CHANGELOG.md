# Changelog

## 1.1.0
- [ENHANCEMENT] The bundle has an installer: `bin/console opendxp:bundle:install OpenDxpQrcodeBundle` registers the permission for the QR codes. An existing installation is marked as installed by the migrations.
- [CHORE] Replace Codeception with Pest and `open-dxp/test-foundation`
- [CHORE] Require `open-dxp/opendxp` ^1.5

## 1.0.0

Initial Release

## Migrating from gal-digital-gmbh/pimcore-qrcode-bundle
- Namespace changed from `GalDigitalGmbh\PimcoreQrcodeBundle` to `OpenDxp\Bundle\QrCodeBundle`