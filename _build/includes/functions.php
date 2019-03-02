<?php

/**
 * @param $filename
 *
 * @return string
 */
function getSnippetContent($filename) {
	$file = trim(file_get_contents($filename));
	preg_match('#\<\?php(.*)#is', $file, $data);

	return rtrim(rtrim(trim($data[1]),'?>'));
}

function rrmdir($dir) {
	if (is_dir($dir)) {
		$objects = scandir($dir);
		foreach ($objects as $object) {
			if ($object != "." && $object != "..") {
				if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object);
			}
		}
		reset($objects);
		rmdir($dir);
	}
}

//function backups($object, $dir, $bakdir='backup'){
//	//global $modx;
//	$dir = MODX_ASSETS_PATH.$bakdir.date("Y-m-d").$dir;
//	if (!file_exists($dir)) {
//		//$modx->log(modX::LOG_LEVEL_INFO, 'Add folder '.$bakdir);
//		if (!mkdir($dir, 0777, true)) {
//		//	$modx->log(modX::LOG_LEVEL_INFO, 'Error create Folder '.$dir);
//		}
//	}
//}

