<?php
$path = 'core/elements/templates/'. $this->config['name_lower'].'/';
return [
    'BaseTemplate' => [
        'file' => 'base',
        'description' => 'Base template',
        'static_file'=>$path.'base.tpl'
    ],

];