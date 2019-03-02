<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 17.06.2018
 * Time: 4:07
 */

/** @var $modx modX */
if (!$modx = $object->xpdo AND !$object->xpdo instanceof modX) {
	return true;
}

switch ($options[xPDOTransport::PACKAGE_ACTION]) {
	case xPDOTransport::ACTION_INSTALL:
	case xPDOTransport::ACTION_UPGRADE:
		$folder = array('css', 'js', 'img', 'images');
		foreach ($folder as $val) {
			$fold = MODX_ASSETS_PATH . $val;
			if (!file_exists($fold)) {
				if (!mkdir($fold, 0777, true)) {
					$modx->log(modX::LOG_LEVEL_ERROR, 'Error create Folder ' . $fold);
				}
				else
					$modx->log(modX::LOG_LEVEL_INFO, 'Add folder ' . $fold);
			}

		}

		$fold = MODX_CORE_PATH . 'DevFolder';
		if (!mkdir($fold, 0777, true)) {
			$modx->log(modX::LOG_LEVEL_ERROR, 'Error create Folder ' . $fold);
		}
		else
			$modx->log(modX::LOG_LEVEL_INFO, 'Add folder ' . $fold);

		unset($fold);
	case xPDOTransport::ACTION_UNINSTALL:
		break;
}

return true;

