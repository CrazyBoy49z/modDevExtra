<?php
/** @var $modx modX */
if (!$modx = $object->xpdo AND !$object->xpdo instanceof modX) {
	return true;
}

/** @var $options */
switch ($options[xPDOTransport::PACKAGE_ACTION]) {
	case xPDOTransport::ACTION_INSTALL:
	case xPDOTransport::ACTION_UPGRADE:
	$chunks=array();
        if(!empty($options['chunks'])){
	        if (!empty($options['install_chunks']))
	        foreach ($options['install_chunks'] as $k => $v) {
		        if ($chunk = $modx->getObject('modChunk', array('name' => $k))) {
			        //backups('test','chunk');
			        $dir = MODX_ASSETS_PATH."backup/".date('Y-m-d').'/'."chunk/";
			        if (!mkdir($dir, 0777, true)) {}
			        if (file_exists($dir)) {
				        $chBak = $dir . date("H:i:s"). ' ' . $chunk->get('name')   . '.tpl';
				        file_put_contents($chBak, $chunk->get('snippet'));
				        $modx->log(modX::LOG_LEVEL_INFO, 'Cделано бекап чанка ' . $chBak);
				        unset($chBak, $dir);
					}
		        }else{
			        $chunk = $modx->newObject('modChunk');
		        }
		        $chunk->fromArray($options['chunks'][$k]);
		        $chunks[] = $chunk;
	        }
	        /* add chunks */
	        if (!is_array($chunks)) {
		        $modx->log(modX::LOG_LEVEL_ERROR,'Could not package in chunks.');
	        } else {
		        if (!$category = $modx->getObject('modCategory', array('category' => 'Сайт'))) {
			        $category = $modx->newObject('modCategory');
			        $category->set('category', 'Сайт');
			        $category->save();
		        }
		        //$modx->log(modX::LOG_LEVEL_ERROR, print_r($chunks, true));

		        $category->addMany($chunks);
		        $category->save();
		        $count = count($chunks);
		        if ($count>0)
		            $modx->log(modX::LOG_LEVEL_INFO,'Packaged in '.$count.' chunks.');
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

