<?php
$path = 'core/elements/plugins/'. $this->config['name_lower'].'/';
return [
    'modDevExtra' => [
        'file' => 'moddevextra',
        'description' => '',
        'events' => [
            'OnManagerPageInit' => [],
        ],
        'static_file'=>$path.'modedubase.php'
    ],

];