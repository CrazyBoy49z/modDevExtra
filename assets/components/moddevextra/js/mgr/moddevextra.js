var modDevExtra = function (config) {
    config = config || {};
    modDevExtra.superclass.constructor.call(this, config);
};
Ext.extend(modDevExtra, Ext.Component, {
    page: {}, window: {}, grid: {}, tree: {}, panel: {}, combo: {}, config: {}, view: {}, utils: {}
});
Ext.reg('moddevextra', modDevExtra);

modDevExtra = new modDevExtra();