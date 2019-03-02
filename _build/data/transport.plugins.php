<?php
return array();
$plugins = array();
$plugin = $modx->newObject('modPlugin');
$tmp = array(
//	'moddevextra' => array(
//		'file' => 'moddevextra',
//		'description' => '',
//		'events' => array(
//			'OnCacheUpdate',
//		)
//	),
	'modDevExtraSaver' => array(
		'file' => 'modDevExtraSaver',
		'description' => 'Automatically set up the name of file and media
            resource of element (template, chunk, snippet, TV or plugin) when wanting
            to make this element be static.',
		'events' => array(
			'OnTempFormRender'=> array(),
			'OnChunkFormRender'=> array(),
			'OnSnipFormRender'=> array(),
			'OnTVFormRender'=> array(),
			'OnPluginFormRender'=> array(),
			'OnTVFormRender'=> array(),
		)
	),
);

foreach ($tmp as $k => $v) {
	/* @avr modplugin $plugin */

	$plugin->fromArray(array(
		'name' => $k,
		'category' => 0,
		'description' => @$v['description'],
		'plugincode' => getSnippetContent($sources['source_core'] . '/elements/plugins/plugin.' . $v['file'] . '.php'),
		'static' => BUILD_PLUGIN_STATIC,
		'source' => 1,
		'static_file' => 'core/components/' . PKG_NAME_LOWER . '/elements/plugins/plugin.' . $v['file'] . '.php'
	), '', true, true);

	$events = array();
	if (!empty($v['events'])) {
		foreach ($v['events'] as $k2 => $v2) {
			/* @var modPluginEvent $event */
			$event = $modx->newObject('modPluginEvent');
			$event->fromArray(array_merge(
				array(
					'event' => $k2,
					'priority' => 0,
					'propertyset' => 0,
				), $v2
			), '', true, true);
			$events[] = $event;
		}
		unset($v['events']);
	}

	if (!empty($events)) {
		$plugin->addMany($events);
	}
//	print_r($plugin);
	$plugins[] = $plugin;
}

unset($tmp, $properties);

return $plugins;