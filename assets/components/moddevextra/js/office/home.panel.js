modDevExtra.panel.Home = function (config) {
    config = config || {};
    Ext.apply(config, {
        baseCls: 'modx-formpanel',
        layout: 'anchor',
        /*
         stateful: true,
         stateId: 'moddevextra-panel-home',
         stateEvents: ['tabchange'],
         getState:function() {return {activeTab:this.items.indexOf(this.getActiveTab())};},
         */
        hideMode: 'offsets',
        items: [{
            xtype: 'modx-tabs',
            defaults: {border: false, autoHeight: true},
            border: false,
            hideMode: 'offsets',
            items: [{
                title: _('moddevextra_items'),
                layout: 'anchor',
                items: [{
                    html: _('moddevextra_intro_msg'),
                    cls: 'panel-desc',
                }, {
                    xtype: 'moddevextra-grid-items',
                    cls: 'main-wrapper',
                }]
            }]
        }]
    });
    modDevExtra.panel.Home.superclass.constructor.call(this, config);
};
Ext.extend(modDevExtra.panel.Home, MODx.Panel);
Ext.reg('moddevextra-panel-home', modDevExtra.panel.Home);
