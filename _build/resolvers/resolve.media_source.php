<?php
/**
 * @author CrazyBoy49z.
 * @package modDevExtra
 * @date 09.10.2018
 * @time 13:25
 */
/** @var $modx modX */
if (!$modx = $object->xpdo AND !$object->xpdo instanceof modX) {
	return true;
}


switch ($options[xPDOTransport::PACKAGE_ACTION]) {
	case xPDOTransport::ACTION_INSTALL:
	case xPDOTransport::ACTION_UPGRADE:
		if($media = $modx->getObject('sources.modMediaSource', array(
				'name' => 'Dev Folder',
			)) AND !$modx->getObject('sources.modMediaSourceElement', array(
				'source' => $media->id,
				'object' => $file->id,
				'object_class' => 'modTemplateVar',
			))
			AND $sl = $modx->newObject('sources.modMediaSourceElement')){
				$sl->set('source', $media->id);
				$sl->set('object', $file->id);
				$sl->set('object_class', 'modTemplateVar');
				$sl->save();
		}
	break;
	case xPDOTransport::ACTION_UNINSTALL:
		break;
}

return true;
