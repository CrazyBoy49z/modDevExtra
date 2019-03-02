<?php
$chunk = array(
	'tpl.header' =>array(
			'filename' => 'header',
			'checked'   => 1,
			'desc'      => 'Чанк верхней части сайта.',
	),
);

foreach ($chunk as $k => $v) {
	$chunks[$k] = array(
		'name' => $k,
		'description' => $v['desc'],
		'checked'=> $v['checked'],
		'desc'=>$v['desc'],
		'snippet' => file_get_contents(SOURCE_CORE.'/elements/chunks/chunk.'.$v['filename'].'.tpl'),
		'static' => BUILD_CHUNK_STATIC,
		'source' => 1,
		'static_file' => 'core/components/'.PKG_NAME_LOWER.'/elements/chunks/chunk.'.$v['filename'].'.tpl',
	);
}
return $chunks;
