<?php

/**
 * The home manager controller for modDevExtra.
 *
 */
class modDevExtraHomeManagerController extends modExtraManagerController
{
    /** @var modDevExtra $modDevExtra */
    public $modDevExtra;


    /**
     *
     */
    public function initialize()
    {
        $this->modDevExtra = $this->modx->getService('modDevExtra', 'modDevExtra', MODX_CORE_PATH . 'components/moddevextra/model/');
        parent::initialize();
    }


    /**
     * @return array
     */
    public function getLanguageTopics()
    {
        return ['moddevextra:default'];
    }


    /**
     * @return bool
     */
    public function checkPermissions()
    {
        return true;
    }


    /**
     * @return null|string
     */
    public function getPageTitle()
    {
        return $this->modx->lexicon('moddevextra');
    }


    /**
     * @return void
     */
    public function loadCustomCssJs()
    {
        $this->addCss($this->modDevExtra->config['cssUrl'] . 'mgr/main.css');
        $this->addJavascript($this->modDevExtra->config['jsUrl'] . 'mgr/moddevextra.js');
        $this->addJavascript($this->modDevExtra->config['jsUrl'] . 'mgr/misc/utils.js');
        $this->addJavascript($this->modDevExtra->config['jsUrl'] . 'mgr/misc/combo.js');
        $this->addJavascript($this->modDevExtra->config['jsUrl'] . 'mgr/widgets/items.grid.js');
        $this->addJavascript($this->modDevExtra->config['jsUrl'] . 'mgr/widgets/items.windows.js');
        $this->addJavascript($this->modDevExtra->config['jsUrl'] . 'mgr/widgets/home.panel.js');
        $this->addJavascript($this->modDevExtra->config['jsUrl'] . 'mgr/sections/home.js');

        $this->addHtml('<script type="text/javascript">
        modDevExtra.config = ' . json_encode($this->modDevExtra->config) . ';
        modDevExtra.config.connector_url = "' . $this->modDevExtra->config['connectorUrl'] . '";
        Ext.onReady(function() {MODx.load({ xtype: "moddevextra-page-home"});});
        </script>');
    }


    /**
     * @return string
     */
    public function getTemplateFile()
    {
        $this->content .= '<div id="moddevextra-panel-home-div"></div>';

        return '';
    }
}