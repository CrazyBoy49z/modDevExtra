<?php
$output = null;
switch ($options[xPDOTransport::PACKAGE_ACTION]) {
	case xPDOTransport::ACTION_INSTALL:
	case xPDOTransport::ACTION_UPGRADE:
		if (!empty($options['attributes']['resources'])) {
			$resources = $options['attributes']['resources'];
			$container = array(
				'system' => array(
					'name' => 'Служебные страницы',
					'page' => 'system,service,sitemap,robots,error404,error403,error503,search'
				),
				'additional' => array(
					'name' => 'Дополнительные страницы',
					'page' => 'about,contacts'
				),
				'cabinet' => array(
					'name' => 'Личный кабинет',
					'page' => 'auth,cabinet,profile,orders'
				),
				'minishop' => array(
					'name' => 'Интернет-магазин',
					'page' => 'catalog,cart'
				),
			);
			$resource = '<ul id="formCheckboxes" class="formCheckedInpit"  style="height:250px;overflow:auto;">';
			foreach ($container as $key => $cont) {
				$children = '';
				$resource .= '<li><h3>' . $cont['name'] . '</h3></li>';
				$resource_chill = explode(',', $cont['page']);
				foreach ($resource_chill as $k) {
					$v = $resources[$k];

					$checked = !empty($v['checked']) ? 'checked' : '';
					$blocked = !empty($v['blocked']) ? 'onclick=\'window.event.returnValue=false\'' : '';
					$desc = !empty($v['desc']) ? ' - <small style="font-weight: normal">' . $v['desc'] . '</small>' : '';

					$text = !empty($blocked) ? '(обязателен)' : '';
					$children .= '
                        <li>
                            <label>
                                <input ' . $blocked . ' type="checkbox" name="install_resources[' . $k . ']" value="' . $k . '"' . $checked . '> ' . $v['pagetitle'] . $text . $desc . '
                            </label>
                        </li>';
				}

				$resource .= $children;
				unset($children, $container);
			}
			$resource .= '</ul>';

		}

		if (!empty($options['attributes']['templates'])) {
			switch ($modx->getOption('manager_language')) {
				case 'ru':
					$templates_install .= 'Выберите шаблони, которые необходимо <b>установить</b>:<br/>
							<small>
								<a href="#" onclick="Ext.get(\'formCheckboxesTemplates\').select(\'input\').each(function(v) {v.dom.checked = true;});">отметить все</a> |
								<a href="#" onclick="Ext.get(\'formCheckboxesTemplates\').select(\'input\').each(function(v) {v.dom.checked = false;});">cнять отметки</a>
							</small>
						';
					break;
				default:
					$templates_install .= 'Select chunks, which need to <b>build</b>:<br/>
							<small>
								<a href="#" onclick="Ext.get(\'formCheckboxesTemplates\').select(\'input\').each(function(v) {v.dom.checked = true;});">select all</a> |
								<a href="#" onclick="Ext.get(\'formCheckboxesTemplates\').select(\'input\').each(function(v) {v.dom.checked = false;});">deselect all</a>
							</small>
						';
			}

			$templates_install .= '<ul id="formCheckboxesTemplates" style="height:250px;overflow:auto;">';
			$templates_install .= '<li><h3>Шаблоны</h3></li>';
			foreach ($options['attributes']['templates'] as $k => $v) {
				$checked = !empty($v['checked']) ? 'checked' : '';
				$desc = !empty($v['desc']) ? '- <small class="smallms">' . $v['desc'] . '</small>' : '';
				$analog = !empty($v['analog']) ? 'onchange="Ext.get(\'formCheckboxesTemplates\').select(\'input#templates' . $v['analog'] . '\').each(function(v) {v.dom.checked = false;});"' : '';
				$templates_install .= '
							<li>
	                            <label for="template_' . $k . '">
	                                <input ' . $analog . ' type="checkbox" id="template_' . $k . '" name="install_templates[' . $k . ']" value="' . $v['filename'] . '"' . $checked . '> ' . $v['templatename']  . $desc . '
								</label>
	                        </li>';
			}
			$templates_install .= '</ul>';

		}

		if (!empty($options['attributes']['chunks'])) {
			switch ($modx->getOption('manager_language')) {
				case 'ru':
					$chunks_install .= 'Выберите чанки, которые необходимо <b>установить</b>:<br/>
						<small>
							<a href="#" onclick="Ext.get(\'formCheckboxesChunks\').select(\'input\').each(function(v) {v.dom.checked = true;});">отметить все</a> |
							<a href="#" onclick="Ext.get(\'formCheckboxesChunks\').select(\'input\').each(function(v) {v.dom.checked = false;});">cнять отметки</a>
						</small>
					';
					break;
				default:
					$chunks_install .= 'Select chunks, which need to <b>build</b>:<br/>
						<small>
							<a href="#" onclick="Ext.get(\'formCheckboxesChunks\').select(\'input\').each(function(v) {v.dom.checked = true;});">select all</a> |
							<a href="#" onclick="Ext.get(\'formCheckboxesChunks\').select(\'input\').each(function(v) {v.dom.checked = false;});">deselect all</a>
						</small>
					';
			}

			$chunks_install .= '<ul id="formCheckboxesChunks" style="height:250px;overflow:auto;">';
			$chunks_install .= '<li><h3>Чанки</h3></li>';
			foreach ($options['attributes']['chunks'] as $k => $v) {
				$checked = !empty($v['checked']) ? 'checked' : '';
				$desc = !empty($v['desc']) ? ' - <small class="smallms">' . $v['desc'] . '</small>' : '';
				$analog = !empty($v['analog']) ? 'onchange="Ext.get(\'formCheckboxesChunks\').select(\'input#chunks' . $v['analog'] . '\').each(function(v) {v.dom.checked = false;});"' : '';
				$chunks_install .= '
						<li>
                            <label for="chunk_' . $k . '">
                                <input ' . $analog . ' type="checkbox" id="chunk_' . $k . '" name="install_chunks[' . $k . ']" value="' . $v['filename'] . '"' . $checked . '> ' . $k  . $desc . '
							</label>
                        </li>';
			}
			$chunks_install .= '</ul>';
		}

		/* packages */
		if (!empty($options['attributes']['packages'])) {
			$packages = $options['attributes']['packages'];

			$package_container = array(
				'system' => array(
					'name' => 'Утилиты',
					'page' => 'pdoTools,translit,yTranslit,Babel,SmushIt,Collections,VersionX,PageLocker,Tickets,siteStatistics,ajaxsnippet'
				),
				'admin' => array(
					'name' => 'Администрирование',
					'page' => 'ClientConfig,controlErrorLog,debugParser,modDevTools,CloudFlare API Integration,EmptyAlias,LogPageNotFound,phpconsole,AdminTools,simpleUpdater'
				),
				'edit' => array(
					'name' => 'Редакторы',
					'page' => 'Ace,CodeMirror,CKEditor,TinyMCE'
				),
				'ie' => array(
					'name' => 'Коммерция',
					'page' => 'miniShop2,looked,msTelegram,ms2form,msDemoData'
				),
				'FormIt' => array(
					'name' => 'FormIt',
					'page' => 'FormIt,AjaxForm,ReCaptchaV2,FormItBuilder'
				),
				'Media' => array(
					'name' => 'Медиа',
					'page' => 'GoogleCloudStorage,DropboxUploader'
				),
				'seo' => array(
					'name' => 'SEO',
					'page' => 'SEO Pro,SEO Tab,GoogleTagManagerMODX'
				),
				'html' => array(
					'name' => 'HTML, CSS, JS',
					'page' => 'MinifyX,HTML2Minify'
				),
				'tv' => array(
					'name' => 'TV',
					'page' => 'timerangetv,YMap,tvSuperSelect,mixedImage,TVTable,FastUploadTV,Image+'
				),
				'backup' => array(
					'name' => 'Бекап',
					'page' => 'Vapor,BackupMODX'
				),
				'dev' => array(
					'name' => 'Разработка',
					'page' => 'UiCMPGenerator,dbAdmin,modFire,Console,CronManager'
				),
				'more' => array(
					'name' => 'Дополнительно',
					'page' => 'LikeDislike,NumberAbbreviation,BannerY'
				),
			);
			$package_install = '<ul id="formCheckboxesPackage" class="formCheckedInpit" style="height:250px;overflow:auto;">';
			foreach ($package_container as $key => $cont) {
				$children = '';
				$package_install .= '<li><h3>' . $cont['name'] . '</h3></li>';

				$package_chill = explode(',', $cont['page']);
				foreach ($package_chill as $k) {
					$v = $packages[$k];

					$checked = !empty($v['checked']) ? 'checked' : '';
					$desc = !empty($v['desc']) ? '<br> <em style="font-weight: normal">' . $v['desc'] . '</em>' : '';
					$analog = !empty($v['analog']) ? 'onchange="Ext.get(\'formCheckboxesPackage\').select(\'input#package_' . $v['analog'] . '\').each(function(v) {v.dom.checked = false;});"' : '';

					$link = !empty($v['link']) ? ' <a target="_blank" href="' . $v['link'] . '"><span class="icon-link icon"></span></a>' : '';

					$children .= '
                        <li>
                            <label for="package_' . $k . '">
                                <input ' . $analog . ' type="checkbox" id="package_' . $k . '" name="install_packages[' . $k . ']" value="' . $k . '"' . $checked . '> ' . $v['pagetitle'] . $link . $desc . '
                            </label>
                        </li>';
				}

				$package_install .= $children;
				unset($children, $package_container);
			}
			$package_install .= '</ul>';
		}

		if (!empty($options['attributes']['settings'])) {
			$tpm = array(
				'emailsender'=>'',
				'site_name'=>'',
				);
			global $modx;
			foreach ($tpm as $k=>$v){
//				$this->modx->log(1,print_r($k,1));
				$Set = $modx->getObject('modSystemSetting', $k);
				if (isset($Set)) {
					$options['attributes']['settings'][$k]['namespace'] = $Set->get('namespace');
					$options['attributes']['settings'][$k]['area'] = $Set->get('area');
					$options['attributes']['settings'][$k]['xtype'] = $Set->get('xtype');
					$options['attributes']['settings'][$k]['value'] = $Set->get('value');
					$lexicon = $Set->get('namespace');
					$modx->lexicon->load($lexicon);
					$options['attributes']['settings'][$k]['lexicon'] = $lexicon;
				}
			}



			$settings_in = $options['attributes']['settings'];

			/* Получаем настройки и названиями */
			$rows = $objectsData = array();
			$objectsData = $settings_in;

			foreach ($settings_in as $k=> $data) {
				$modx->lexicon->load($data['lexicon']);

				if ($data['namespace']=='core'){
					$lexicon = $modx->lexicon('area_' . $data['namespace']);
				}else{
					$lexicon = $modx->lexicon($data['namespace']);
				}
				if (sha1($lexicon) == sha1($data['lexicon'])){
					$lexicon = $data['lexicon_def'];
				}
				$rows[$data['namespace']]['name'] = $lexicon;
				$rows[$data['namespace']]['settings'][$k] = array(
					'xtype' => $data['xtype'],
					'name' => $modx->lexicon('setting_' . $k),
					'desc' => $modx->lexicon('setting_' . $k . '_desc')
				);
				unset($lexicon);
			}

			/* settings install*/
			$setting_install = '<ul id="formCheckboxesSettings" class="formCheckedInpit" style="height:250px;overflow:auto;">';
			foreach ($rows as $key => $cont) {
				$children = '';
				$setting_install .= '<li><h3>' . $cont['name'] . '</h3></li>';

				foreach ($cont['settings'] as $k => $v) {
					$value = $settings_in[$k]['value'];
					$name = $v['name'];
					$desc = !empty($v['desc']) ? '<small class="smallms">' . $v['desc'] . '</small>' : '';
					$xtype = $v['xtype'];
					if ($xtype == 'combo-boolean') {
						$checked = !empty($value) ? 'checked' : '';
						$format = '
                            <label for="package_' . $k . '">
                                <input type="checkbox" id="setting_' . $k . '" name="install_settings[' . $k . ']" value="1"' . $checked . '>
                            </label>
                        ';
					}
					else {
						$format = '<input type="text" id="setting_' . $k . '" name="install_settings[' . $k . ']" value="' . $value . '"> ';
					}

					$children .= '
                    <li>
                        <table id="settings_sgs_' . $k . '" class="x-grid3-row-collapsed">
                            <tr>
                                <td class="x-grid3-col x-grid3-cell x-grid3-td-expander x-selectable x-grid3-cell-first " style="width: 18px;" tabindex="0" rowspan="2">
                                    <div class="x-grid3-col-expander">
                                        <div id="sgs_' . $k . '" class="x-grid3-row-expander" onclick="thisPlus(this)">&nbsp;</div>
                                    </div>
                                </td>
                                <td class="td_first">
                                ' . $name . '<br>
                                <span class="msettings-hidden" id="desc_sgs_' . $k . '">' . $desc . '</span>
                                <em>' . $k . '</em>
                                </td>
                                <td class="td_last">' . $format . '</td>
                            </tr>
                        </table>

                    </li>';
				}

				$setting_install .= $children;
				unset($children, $format, $xtype);
			}

			$setting_install .= '</ul>';
		}
//		$type = file_put_contents('chunks.txt',print_r($options['attributes']['chunk'], true));
		break;

	case xPDOTransport::ACTION_UNINSTALL:
		break;
}

$output = '';
$exists = $modx->getObject('transport.modTransportPackage', array('package_name' => 'pdoTools'));
// check pdoTools
if (!$exists) {
	switch ($modx->getOption('manager_language')) {
		case 'ru':
			$output = 'Этот компонент требует <b>pdoTools</b>. Он будет автоматически скачан и установлен.';
			break;
		default:
			$output = 'This component requires <b>pdoTools</b>. It will be automaticly downloaded and installed?';
	}
	$output .= '<br/>';
}

if ($resource) {

	switch ($modx->getOption('manager_language')) {
		case 'ru':
			$output .= 'Выберите страницы, которые необходимо <b>добавить</b>:<br/>
                    <small>
                        <a href="#" onclick="Ext.get(\'formCheckboxes\').select(\'input\').each(function(v) {v.dom.checked = true;});">отметить все</a> |
                        <a href="#" onclick="Ext.get(\'formCheckboxes\').select(\'input\').each(function(v) {v.dom.checked = false;});">cнять отметки</a>
                    </small>
                ';
			break;
		default:
			$output .= 'Select modules, which need to <b>build</b>:<br/>
                    <small>
                        <a href="#" onclick="Ext.get(\'formCheckboxes\').select(\'input\').each(function(v) {v.dom.checked = true;});">select all</a> |
                        <a href="#" onclick="Ext.get(\'formCheckboxes\').select(\'input\').each(function(v) {v.dom.checked = false;});">deselect all</a>
                    </small>
                ';
	}
	$output .= '<br/>' . $resource;
	unset($resource);
}

if ($package_install) {
	$output_install = '';
//<a href="#" onclick="Ext.get('formCheckboxesPackage').select('input').each(function(v) {v.dom.checked = true;});">отметить все</a> |
//	<a href="#" onclick="Ext.get('formCheckboxesPackage').select('input').each(function(v) {v.dom.checked = true;});">select all</a> |
	switch ($modx->getOption('manager_language')) {
		case 'ru':
			$output_install .= 'Выберите приложение, которые необходимо <b>установить</b>:<br/>
				<small>
					<a href="#" onclick="Ext.get(\'formCheckboxesPackage\').select(\'input\').each(function(v) {v.dom.checked = false;});">cнять отметки</a>
				</small>
			';
			break;
		default:
			$output_install .= 'Select package, which need to <b>build</b>:<br/>
				<small>
					<a href="#" onclick="Ext.get(\'formCheckboxesPackage\').select(\'input\').each(function(v) {v.dom.checked = false;});">deselect all</a>
				</small>
			';
	}

	$output_install .= $package_install;
	$package_install = $output_install;
	unset($output_install);

}
/* $output .= '<table cellspacing="5" id="setup_form">
		 <tr>
			 <td><label for="email">Email:</label></td>
			 <td><input type="email" name="emailsender" value="" placeholder="user@gmail.com" id="email" /></td>
		 </tr>
		 <tr><td colspan="2"><small>'.$email_intro.'</small></td></tr>
	 </table>
	 ';*/

$menu = array(
	'ms-page-tab'=>array(
		'name'=>'Страницы',
		'content'=>$output,
		'active'=>1,
	),
	'ms-tpl-tab'=>array(
		'name'=>'Чанки',
		'content'=>$chunks_install,
	),
	'ms-templates-tab'=>array(
		'name'=>'Шаблоны',
		'content'=>$templates_install,
	),
	'ms-pack-tab'=>array(
		'name'=>'Приложения',
		'content'=>$package_install,
	),
	'ms-settings-tab'=>array(
		'name'=>'Настройки',
		'content'=>$setting_install,
	),
);

unset($output,$chunks_install,$templates_install,$package_install,$setting_install);
$menuli = '<ul class="x-tab-strip x-tab-strip-top" id="tab-expansions">';
$menuContent = '';

foreach ($menu as $key => $val){
	$active = (isset($val['active']))?' class="x-tab-strip-active"':'';

	$menuli .= '<li'.$active.'><span onclick="thisTab(this)"  id="'.$key.'" class="x-tab-strip-text">'.$val['name'].'</span></a></li>';
	$active = (isset($val['active']))?'taber-panel-action':'x-hide-display';
	$menuContent .= '<div id="con-'.$key.'" class="taber-panel x-panel x-panel-noborder '.$active.'" style="width: auto;">
		                <div class="x-panel-bwrap">
		                    <div class="taberney x-panel-body x-panel-body-noheader x-panel-body-noborder" id="ext-gen246" style="visibility: visible; position: relative; overflow: auto; left: auto; top: auto; z-index: auto; width: auto; height: auto;">
		                            ';
	$menuContent .= $val['content'];
	$menuContent .= '</div></div></div>';
}
$menuli .= '</ul>';

unset($menu);


$out = '
    <script>
	    ' . $options['attributes']['js'] . '
    </script>
    <style>
		#setup_form_wrapper {font: normal 12px Arial;line-height:18px;}
		#setup_form_wrapper a {color: #08C;}
		#setup_form_wrapper input#email {height: 25px; width: 200px;}
		#setup_form_wrapper input#key {height: 25px; width: 300px;}
		#setup_form_wrapper label {margin-bottom:5px;}
		#setup_form_wrapper table {margin-top:10px;}
		#setup_form_wrapper .x-grid3-cell-first {vertical-align: top;}
		#setup_form_wrapper .x-grid3-row-expander {margin-top: 0px;}
		#setup_form_wrapper .td_first {width:350px; min-width:350px; padding-rigth: 25px;}
		#setup_form_wrapper .td_center {width: 200px; padding: 0 15px; vertical-align: top;}
		#setup_form_wrapper .td_last {width: 150px; padding-right: 15px; vertical-align: top;}
		#setup_form_wrapper .msettings-hidden {display: none;}
		#setup_form_wrapper form {padding:0px;}
		#setup_form_wrapper small {font-size: 10px; color:#555; font-style:italic;}
		#setup_form_wrapper .more_info {width: 100%;}
		#setup_form_wrapper .more_info a {line-height: 21px; display:inline-block;}
		#setup_form_wrapper .more_info img {border: none; display:inline-block;padding-top:10px;}
		#setup_form_wrapper .taberney{padding: 5px 0px 0px 15px;}
		#setup_form_wrapper .formCheckedInpit{padding-left: 5px;}
		#setup_form_wrapper .smallms{ line-height: 10px;}
		#package-show-setupoptions-btn,#package-show-setupoptions-btn {width: auto !important;}
	</style>
	<div id="setup_form_wrapper">
		<div id="modx-mysettings-beforeinstall" class="x-tab-panel vertical-tabs-panel wrapped x-tab-panel-noborder" style="width: auto;">
		    <div class="x-tab-panel-header vertical-tabs-header x-tab-panel-header-noborder x-unselectable x-tab-panel-header-plain">
		        <div class="x-tab-strip-wrap" style="width: 268px;">'.$menuli.'</div>
		        <div class="x-tab-strip-spacer" id="ext-gen174"></div>
		    </div>
		    <div class="x-tab-panel-bwrap vertical-tabs-bwrap" id="tab-caontent">
		        <div class="x-tab-panel-body x-tab-panel-body-noborder x-tab-panel-body-top" id="ext-gen172" style="overflow: auto; width: auto; height: auto;">
					'.$menuContent.'
			    </div>
		    </div>
		</div>
	</div>';

return $out;
