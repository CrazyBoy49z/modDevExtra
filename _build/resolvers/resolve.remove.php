<?php
/**
 * @author CrazyBoy49z.
 * @package modDevExtra
 * @date 17.06.2018
 * @time 2:25
 */

if (!$modx = $object->xpdo AND !$object->xpdo instanceof modX) {
	return true;
}

switch ($options[xPDOTransport::PACKAGE_ACTION]) {
	case xPDOTransport::ACTION_INSTALL:
	case xPDOTransport::ACTION_UPGRADE:
		$file = $modx->getOption('core_path') . 'docs/changelog.txt';
		if (file_exists($file)) {
			$modx->log(modX::LOG_LEVEL_INFO, 'Removing <b>changelog.txt</b>');
			unlink($file);
		}
		break;

	case xPDOTransport::ACTION_UNINSTALL:
		break;
}

return true;
