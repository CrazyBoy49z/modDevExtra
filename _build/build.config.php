<?php

error_reporting(E_ALL);

/* define package */
define('PKG_NAME', 'modDevExtra');
//define('PKG_EXTENDED_LOWER', strtolower(PKG_EXTENDED));
define('PKG_NAME_LOWER', strtolower(PKG_NAME));

define('PKG_VERSION', '1.0.0');
define('PKG_RELEASE', 'beta');
define('PKG_AUTO_INSTALL', true);

/* define paths */
if (isset($_SERVER['MODX_BASE_PATH'])) {
    define('MODX_BASE_PATH', $_SERVER['MODX_BASE_PATH']);
} elseif (file_exists(dirname(dirname(dirname(__FILE__))) . '/core')) {
    define('MODX_BASE_PATH', dirname(dirname(dirname(__FILE__))) . '/');
} else {
    define('MODX_BASE_PATH', dirname(dirname(dirname(dirname(__FILE__)))) . '/');
}
define('MODX_CORE_PATH', MODX_BASE_PATH . 'core/');
define('MODX_MANAGER_PATH', MODX_BASE_PATH . 'manager/');
define('MODX_CONNECTORS_PATH', MODX_BASE_PATH . 'connectors/');
define('MODX_ASSETS_PATH', MODX_BASE_PATH . 'assets/');

/* define urls */
define('MODX_BASE_URL', '/');
define('MODX_CORE_URL', MODX_BASE_URL . 'core/');
define('MODX_MANAGER_URL', MODX_BASE_URL . 'manager/');
define('MODX_CONNECTORS_URL', MODX_BASE_URL . 'connectors/');
define('MODX_ASSETS_URL', MODX_BASE_URL . 'assets/');

/* define build options */
define('BUILD_SETTING_UPDATE', true);
define('BUILD_RESOURCE_UPDATE', true);
define('BUILD_CHUNK_UPDATE', true);
define('BUILD_TEMPLATE_UPDATE', true);
define('BUILD_PLUGIN_UPDATE', false);
define('BUILD_EVENT_UPDATE', false);

define('BUILD_CHUNK_STATIC', false);
define('BUILD_PLUGIN_STATIC', true);

//define('BUILD_POLICY_TEMPLATE_UPDATE', true);
//define('BUILD_PERMISSION_UPDATE', true);
$BUILD_RESOLVERS = array(
	'providers',
	'remove',
	'rename',
	'create_folder',
	
	'resource',
	'chunks',
	'templates',
    'setting',
	'setup',
	'fix_translit',
);

/* define sources */
$root = dirname(dirname(__FILE__)).'/';

define('SOURCE_CORE', $root.'core/components/'.PKG_NAME_LOWER);
define('SOURCE_ASSETS', $root.'assets/components/'.PKG_NAME_LOWER);

$sources = array(
	'root' => $root,
	'build' => $root . '_build/',
	'data' => $root . '_build/data/',
	'resolvers' => $root . '_build/resolvers/',
	'docs' => $root.'core/components/'.PKG_NAME_LOWER.'/docs/',
	'lexicon' => $root . 'core/components/' . PKG_NAME_LOWER . '/lexicon/',
	'source_core' => $root.'core/components/'.PKG_NAME_LOWER,
	'source_assets' => $root.'assets/components/'.PKG_NAME_LOWER,
);
unset($root);
