<?php
//    'some_setting' => [
//        'xtype' => 'combo-boolean',
//        'value' => true,
//        'area' => 'moddevextra_main',
//    ],
return [

    'publish_default' => [
        'key' => 'publish_default',
        'namespace' => 'core',
        'area' => 'site',
        'xtype' => 'combo-boolean',
        'value' => 1,
        'lexicon' => 'core:setting'
    ],
    'upload_maxsize' => [
        'namespace' => 'core',
        'area' => 'file',
        'xtype' => 'textfield',
        'value' => 10485760,
        'lexicon' => 'core:setting',
        'key' => 'upload_maxsize',
    ],
    'cultureKey' => [
        'namespace' => 'core',
        'area' => 'language',
        'xtype' => 'modx-combo-language',
        'value' => 'ru',
        'lexicon' => 'core:setting',
        'key' => 'cultureKey',
    ],
    'fe_editor_lang' => [
        'namespace' => 'core',
        'area' => 'language',
        'xtype' => 'modx-combo-language',
        'value' => 'ru',
        'lexicon' => 'core:setting',
        'key' => 'fe_editor_lang',
    ],
    'manager_lang_attribute' => [
        'namespace' => 'core',
        'area' => 'language',
        'xtype' => 'textfield',
        'value' => 'ru',
        'lexicon' => 'core:setting',
        'key' => 'manager_lang_attribute',
    ],
    'manager_language' => [
        'key' => 'manager_language',
        'namespace' => 'core',
        'area' => 'language',
        'xtype' => 'modx-combo-language',
        'value' => 'ru',
        'lexicon' => 'core:setting',
    ],
    'locale' => [
        'namespace' => 'core',
        'area' => 'language',
        'xtype' => 'textfield',
        'value' => 'ru_RU.UTF-8',
        'lexicon' => 'core:setting',
        'key' => 'locale',
    ],
    'auto_check_pkg_updates' => [
        'namespace' => 'core',
        'area' => 'system',
        'xtype' => 'combo-boolean',
        'value' => 1,
        'lexicon' => 'core:setting',
        'key' => 'auto_check_pkg_updates',
    ],
    'feed_modx_news_enabled' => [
        'namespace' => 'core',
        'area' => 'system',
        'xtype' => 'combo-boolean',
        'value' => 0,
        'lexicon' => 'core:setting',
        'key' => 'feed_modx_news_enabled',
    ],
    'feed_modx_security_enabled' => [
        'namespace' => 'core',
        'area' => 'system',
        'xtype' => 'combo-boolean',
        'value' => 0,
        'lexicon' => 'core:setting',
        'key' => 'feed_modx_security_enabled',
    ],
    'automatic_alias' => [
        'namespace' => 'core',
        'area' => 'furls',
        'xtype' => 'combo-boolean',
        'value' => 1,
        'lexicon' => 'core:setting',
        'key' => 'automatic_alias',
    ],
    'use_alias_path' => [
        'namespace' => 'core',
        'area' => 'furls',
        'xtype' => 'combo-boolean',
        'value' => 1,
        'lexicon' => 'core:setting',
        'key' => 'use_alias_path',
    ],
    'friendly_urls' => [
        'namespace' => 'core',
        'area' => 'furls',
        'xtype' => 'combo-boolean',
        'value' => 1,
        'lexicon' => 'core:setting',
        'key' => 'friendly_urls',
    ],
    'global_duplicate_uri_check' => [
        'namespace' => 'core',
        'area' => 'furls',
        'xtype' => 'combo-boolean',
        'value' => 0,
        'lexicon' => 'core:setting',
        'key' => 'global_duplicate_uri_check'
    ],
    'link_tag_scheme' => [
        'namespace' => 'core',
        'area' => 'site',
        'xtype' => 'textfield',
        'value' => 'full',
        'lexicon' => 'core:setting',
        'key' => 'link_tag_scheme',
    ],
    'friendly_alias_translit' => [
        'namespace' => 'core',
        'area' => 'furls',
        'xtype' => 'textfield',
        'value' => 'russian',
        'lexicon' => 'core:setting',
        'key' => 'friendly_alias_translit',
    ],
    'password_generated_length' => [
        'namespace' => 'core',
        'area' => 'authentication',
        'xtype' => 'textfield',
        'value' => 8,
        'lexicon' => 'core:setting',
        'key' => 'password_generated_length'
    ],
    'password_min_length' => [
        'namespace' => 'core',
        'area' => 'authentication',
        'xtype' => 'textfield',
        'value' => 8,
        'lexicon' => 'core:setting',
        'key' => 'password_min_length'
    ],
    'signupemail_message' => [
        'namespace' => 'core',
        'area' => 'authentication',
        'xtype' => 'textarea',
        'value' => '<p>Здравствуйте [[+uid]],</p><p>Ваши данные для административного входа на [[+sname]]:</p>
            <p><strong>Логин:</strong> [[+uid]]<br /><strong>Пароль:</strong> [[+pwd]]<br /></p>
            <p>После того как вы войдете в административную часть MODX [[+surl]], вы можете изменить свой пароль.</p>
            <p>С уважением, <br />Администрация сайта</p>',
        'lexicon' => 'core:setting',
        'key' => 'signupemail_message',
    ],
    'tiny.base_url' => [
        'namespace' => 'tinymce',
        'area' => 'site',
        'xtype' => 'textfield',
        'value' => '/',
        'lexicon' => 'tinymce:default',
        'key' => 'tiny.base_url'
    ],
    'tiny.path_options' => [
        'namespace' => 'tinymce',
        'area' => 'site',
        'xtype' => 'textfield',
        'value' => 'rootrelative',
        'lexicon' => 'tinymce:default',
        'key' => 'tiny.path_options'
    ],
    'ace.theme' => [
        'namespace' => 'ace',
        'area' => 'general',
        'xtype' => 'textfield',
        'value' => 'tomorrow_night',
        'lexicon' => 'ace:default',
        'key' => 'ace.theme'
    ],
    'ace.font_size' => [
        'namespace' => 'ace',
        'area' => 'general',
        'xtype' => 'textfield',
        'value' => '13px',
        'lexicon' => 'ace:default',
        'key' => 'ace.font_size'
    ],
    'pdotools_fenom_parser' => [
        'namespace' => 'pdotools',
        'area' => 'pdotools_main',
        'xtype' => 'combo-boolean',
        'value' => 0,
        'lexicon' => 'pdotools:default',
        'key' => 'pdotools_fenom_parser'
    ],
    'pdotools_fenom_php' => [
        'namespace' => 'pdotools',
        'area' => 'pdotools_main',
        'xtype' => 'combo-boolean',
        'value' => 0,
        'lexicon' => 'pdotools:default',
        'key' => 'pdotools_fenom_php'
    ],
    'manager_week_start' => [
        'namespace' => 'core',
        'area' => 'manager',
        'xtype' => 'textfield',
        'value' => 1,
        'lexicon' => 'core:setting',
        'key'=>'manager_week_start'
    ],
];