modDevExtra.page.Home = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        components: [{
            xtype: 'moddevextra-panel-home',
            renderTo: 'moddevextra-panel-home-div'
        }]
    });
    modDevExtra.page.Home.superclass.constructor.call(this, config);
};
Ext.extend(modDevExtra.page.Home, MODx.Component);
Ext.reg('moddevextra-page-home', modDevExtra.page.Home);