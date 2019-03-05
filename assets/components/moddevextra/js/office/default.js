Ext.onReady(function () {
    modDevExtra.config.connector_url = OfficeConfig.actionUrl;

    var grid = new modDevExtra.panel.Home();
    grid.render('office-moddevextra-wrapper');

    var preloader = document.getElementById('office-preloader');
    if (preloader) {
        preloader.parentNode.removeChild(preloader);
    }
});