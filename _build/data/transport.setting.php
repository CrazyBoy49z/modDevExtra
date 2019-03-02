<?php
error_reporting(E_ALL);
$tpm = array(
    'publish_default' =>array(
		'value'     => '1',
	),
	'upload_maxsize' => array(
		'value'     => '10485760',
	),
	'cultureKey' => array(
		'value' =>  'ru'
	),
	'fe_editor_lang' => array(
		'value' => 'ru'
	),
	'manager_lang_attribute' => array(
		'value' => 'ru'
	),
	'manager_language' => array(
		'value' => 'ru'
	),
	'locale' => array(
		'value'     => 'ru_RU.UTF-8',
	),
	'auto_check_pkg_updates' => array(
		'value'     => 1,
	),
	'feed_modx_news_enabled' => array(
		'value'     => 0,
	),
	'feed_modx_security_enabled' => array(
		'value'     => 0,
	),

	//url
	'automatic_alias' => array(
		'value'     => 1,
	),
	'use_alias_path' => array(
		'value'     => 1,
	),
	'friendly_urls' => array(
		'value'     => 1,
	),
	'global_duplicate_uri_check' => array(
		'value'     => 0,
	),
	'link_tag_scheme' => array(
		'value'     => 'full',
	),
	'friendly_alias_translit' => array(
		'value'     => 'fix_russian',
	),
	'password_generated_length' => array(
		'value'     => 8,
	),
	'password_min_length' => array(
		'value'     => 8,
	),
	'signupemail_message' => array(
		'value'     => '<p>Здравствуйте [[+uid]],</p><p>Ваши данные для административного входа на [[+sname]]:</p>
                <p><strong>Логин:</strong> [[+uid]]<br /><strong>Пароль:</strong> [[+pwd]]<br /></p>
                <p>После того как вы войдете в административную часть MODX [[+surl]], вы можете изменить свой пароль.</p>
                <p>С уважением, <br />Администрация сайта</p>',
	),
	'tiny.base_url' => array(
		'area'      => 'site',
		'namespace' => 'tinymce',
		'value'     => '/',
	),
	'tiny.path_options' => array(
		'area'      => 'site',
		'namespace' => 'tinymce',
		'value'     => 'rootrelative',
	),
	'ace.theme' => array(
		'namespace' => 'ace',
		'value'     => 'tomorrow_night',
	),
	'ace.font_size' => array(
		'namespace' => 'ace',
		'value'     => '13px',
	),
	PKG_NAME_LOWER.'.chunks.update' => array(
		'namespace' => PKG_NAME_LOWER,
		'area'      => 'site',
		'xtype'     => 'combo-boolean',
		'value'     => 1,
	),
	PKG_NAME_LOWER.'.template.update' => array(
		'namespace' => PKG_NAME_LOWER,
		'area'      => 'site',
		'xtype'     => 'combo-boolean',
		'value'     => 1,
	),
	PKG_NAME_LOWER.'.resource.update' => array(
		'namespace' => PKG_NAME_LOWER,
		'area'      => 'site',
		'xtype'     => 'combo-boolean',
		'value'     => 1,
	),
	PKG_NAME_LOWER.'.enable_rewrite' => array(
		'namespace' => PKG_NAME_LOWER,
		'value' => '1',
		'xtype' => 'combo-boolean',
		'area' => 'file',
	),
	PKG_NAME_LOWER.'.static_file_extension' => array(
		'namespace' => PKG_NAME_LOWER,
		'value' => '',
		'xtype' => 'textfield',
		'area' => 'file',
	),
	PKG_NAME_LOWER.'.static_chunk_file_extension' => array(
		'namespace' => PKG_NAME_LOWER,
		'value' => 'tpl',
		'xtype' => 'textfield',
		'area' => 'file',
	),

	PKG_NAME_LOWER.'.static_snippet_file_extension' => array(
		'namespace' => PKG_NAME_LOWER,
		'value' => 'php',
		'xtype' => 'textfield',
		'area' => 'file',
	),

	PKG_NAME_LOWER.'.static_plugin_file_extension' => array(
		'namespace' => PKG_NAME_LOWER,
		'value' => 'php',
		'xtype' => 'textfield',
		'area' => 'file',
	),
	PKG_NAME_LOWER.'.static_template_file_extension' => array(
		'namespace' => PKG_NAME_LOWER,
		'value' => 'tpl',
		'xtype' => 'textfield',
		'area' => 'file',
	),
	PKG_NAME_LOWER.'.static_tv_file_extension' => array(
		'namespace' => PKG_NAME_LOWER,
		'value' => 'php',
		'xtype' => 'textfield',
		'area' => 'file',
	),

	PKG_NAME_LOWER.'.static_media_source' => array(
		'namespace' => PKG_NAME_LOWER,
		'value' => '1',
		'xtype' => 'modx-combo-source',
		'area' => 'file',
	),

	PKG_NAME_LOWER.'.static_default' => array(
		'namespace' => PKG_NAME_LOWER,
		'value' => '1',
		'xtype' => 'combo-boolean',
		'area' => 'file',
	),
	PKG_NAME_LOWER.'.include_category' => array(
		'namespace' => PKG_NAME_LOWER,
		'value' => '0',
		'xtype' => 'combo-boolean',
		'area' => 'file',
	),

	'pdotools_fenom_parser' => array(
		'namespace' => 'pdotools',
		'value'     => 0,
	),
	'pdotools_fenom_php' => array(
		'namespace' => 'pdotools',
		'value'     => 0,
	),
	'manager_week_start' => array(
		'value'    => 1,
	),
);
foreach ($tpm as $k=>$v){
	$Setting = $modx->getObject('modSystemSetting', $k);
	$settings[$k]['namespace'] = isset($v['namespace'])?$v['namespace']: $Setting->get('namespace');
	$settings[$k]['area'] = isset($v['area'])?$v['area']: $Setting->get('area');
	$settings[$k]['xtype'] = isset($v['xtype'])?$v['xtype']:$Setting->get('xtype');
	$settings[$k]['value'] = isset($v['value'])?$v['value']:'';
	if ($settings[$k]['namespace']=='core'){
		$lexicon = $settings[$k]['namespace'] . ':setting';
		$modx->lexicon->load($lexicon);
		$lexicon_def = $modx->lexicon('area_' . $settings[$k]['namespace']);
	}else{
		$lexicon = $settings[$k]['namespace'] . ':default';
		$modx->lexicon->load($lexicon);
		$lexicon_def = $modx->lexicon($settings[$k]['namespace']);
	}
	$settings[$k]['lexicon'] = $lexicon;
	$settings[$k]['lexicon_def'] = $lexicon_def;
}

return $settings;
