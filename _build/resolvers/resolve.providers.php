<?php
/**
 * @author CrazyBoy49z.
 * @package modDevExtra
 * @date 17.06.2018
 * @time 3:24
 */

/** @var $modx modX */
if (!$modx = $object->xpdo AND !$object->xpdo instanceof modX) {
	return true;
}


	switch ($options[xPDOTransport::PACKAGE_ACTION]) {
		case xPDOTransport::ACTION_INSTALL:
		case xPDOTransport::ACTION_UPGRADE:
			$provider_name[] = 'modstore.pro';
			foreach ($provider_name as $name){
				if (!$provider = $modx->getObject('transport.modTransportProvider', array('service_url:LIKE' => '%' . $name . '%'))) {
					$provider = $modx->newObject('transport.modTransportProvider', array(
						'name' => $name,
						'service_url' => 'http://' . $name . '/extras/',
						'username' => !empty($options['email']) && preg_match('/.+@.+\..+/i', $options['email']) ? trim($options['email']) : '',
						'api_key' => !empty($options['key']) ? trim($options['key']) : '',
						'description' => 'Repository of ' . $name,
						'created' => time(),
					));
					$provider->save();
				}
			}
			break;
		case xPDOTransport::ACTION_UNINSTALL:
			break;
	}

return true;
