<?php
/** @var $modx modX */
if (!$modx = $object->xpdo AND !$object->xpdo instanceof modX) {
	return true;
}

/** @var $options */
switch ($options[xPDOTransport::PACKAGE_ACTION]) {
	case xPDOTransport::ACTION_INSTALL:
	case xPDOTransport::ACTION_UPGRADE:
		$templates=array();
		if(!empty($options['templates'])){
			if (!empty($options['install_templates']))
				foreach ($options['install_templates'] as $k => $v) {
					$v = $options['templates'][$k];
					if ($template = $modx->getObject('modTemplate', array('templatename' => $v['templatename']))) {
						//backups('test','chunk');
						$dir = MODX_ASSETS_PATH."backup/".date('Y-m-d').'/'."template/";
						if (!mkdir($dir, 0777, true)) {}
						if (file_exists($dir)) {
							$chBak = $dir . date("H:i:s"). ' ' . $template->get('templatename')   . '.tpl';
							file_put_contents($chBak, $template->get('content'));
							$modx->log(modX::LOG_LEVEL_INFO, 'Cделано бекап шаблона ' . $chBak);

							unset($chBak, $dir);
						}
					}else{
						$template = $modx->newObject('modTemplate');
					}
					$template->fromArray($options['templates'][$k]);
					$templates[] = $template;
				}
			/* add chunks */
			if (!is_array($templates)) {
				$modx->log(modX::LOG_LEVEL_ERROR,'Could not package in templates.');
			} else {
				if (!$category = $modx->getObject('modCategory', array('category' => 'Сайт'))) {
					$category = $modx->newObject('modCategory');
					$category->set('category', 'Сайт');
					$category->save();
				}
				//$modx->log(modX::LOG_LEVEL_ERROR, print_r($chunks, true));

				$category->addMany($templates);
				$category->save();
				$count = count($templates);
				if ($count>0)
					$modx->log(modX::LOG_LEVEL_INFO,'Packaged in '.$count.' templates.');
				unset($count);
			}
		} else {
			$modx->log(modX::LOG_LEVEL_INFO, 'Could not be completed because a <b>build.php</b> file not found.');
		}
		break;
	case
	xPDOTransport::ACTION_UNINSTALL:
		break;
}

return true;

