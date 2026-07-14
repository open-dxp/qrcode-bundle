opendxp.registerNS("opendxp.bundle.qrcode.startup");

opendxp.bundle.qrcode.startup = Class.create({
    initialize: function () {
        document.addEventListener(opendxp.events.preMenuBuild, this.preMenuBuild.bind(this));
    },
    preMenuBuild: function (e) {
        var user = opendxp.globalmanager.get('user');

        if (!user.isAllowed('qr_codes')) {
            return;
        }

        var marketingMenu = e.detail.menu.marketing;

        if (!marketingMenu) {
            return;
        }

        marketingMenu.items.push({
            itemId: 'qr_codes',
            text: t('qr_code.title'),
            iconCls: 'opendxp_nav_icon_qrcode',
            handler: () => {
                var panel = opendxp.globalmanager.get('qr_codes');

                if (!panel) {
                    panel = new opendxp.bundle.qrcode.panel();

                    opendxp.globalmanager.add('qr_codes', panel);
                }

                panel.activate();
            }
        });
    }
});

const qrcode = new opendxp.bundle.qrcode.startup();
