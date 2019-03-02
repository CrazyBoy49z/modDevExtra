<?php
error_reporting(E_ALL);
$templates = array();

$tmp = array(
    'service'  => array(
	    'filename'=>'service',
	    'name'    => 'Ceрвисний',
	    'desc'    => '',
	    'checked' => 1,
    ),
);


foreach ($tmp as $k => $v) {
	$templates[$k] = array(
		'templatename' => $v['name'],
		'description' => $v['desc'],
		'checked'=> $v['checked'],
		'desc'=>$v['desc'],
		'content' => file_get_contents(SOURCE_CORE.'/elements/templates/template.'.$v['filename'].'.tpl'),
		'static' => BUILD_CHUNK_STATIC,
		'source' => 1,
		'static_file' => 'core/components/'.PKG_NAME_LOWER.'/elements/templates/template.'.$v['filename'].'.tpl',
	);
}

unset($tmp);

return $templates;