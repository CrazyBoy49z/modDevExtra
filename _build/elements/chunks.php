<?php
$path = 'core/elements/chunks/'. $this->config['name_lower'].'/';
return [
    'tpl.modDevExtra.item' => [
        'file' => 'item',
        'description' => '',
        'static_file' => $path.'tpl.modDevExtra.item.tpl',
    ],
    'tpl.modDevExtra.office' => [
        'file' => 'office',
        'description' => '',
        'static_file' => $path.'tpl.modDevExtra.office.tpl',
    ],
];