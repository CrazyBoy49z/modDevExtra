<?php
if (file_exists(dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php')) {
    /** @noinspection PhpIncludeInspection */
    require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
} else {
    require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/config.core.php';
}
/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CONNECTORS_PATH . 'index.php';
/** @var modDevExtra $modDevExtra */
$modDevExtra = $modx->getService('modDevExtra', 'modDevExtra', MODX_CORE_PATH . 'components/moddevextra/model/');
$modx->lexicon->load('moddevextra:default');

// handle request
$corePath = $modx->getOption('moddevextra_core_path', null, $modx->getOption('core_path') . 'components/moddevextra/');
$path = $modx->getOption('processorsPath', $modDevExtra->config, $corePath . 'processors/');
$modx->getRequest();

/** @var modConnectorRequest $request */
$request = $modx->request;
$request->handleRequest([
    'processors_path' => $path,
    'location' => '',
]);