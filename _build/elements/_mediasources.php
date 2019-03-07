<?php

/*
 * @package ModxDev
 * @subpackage build
 * @author CrazyBoy49z
 * https://yura.finiv.in.ua
 */
$mediaSources = [
    'Dev'=>[
        'name' => 'Dev Folder',
        'description' => 'Dev Folder Source',
        'properties' => [
            "basePath" => [
                "name" => "basePath",
                "desc" => "prop_file.basePath_desc",
                "type" => "textfield",
                "options" => [],
                "value" => "core/elements/",
                "lexicon" => "core:source",
            ],
            "baseUrl" => [
                "name" => "baseUrl",
                "desc" => "prop_file.baseUrl_desc",
                "type" => "textfield",
                "options" => [],
                "value" => "core/elements/",
                "lexicon" => "core:source",
            ]
        ]
    ]
];



return $mediaSources;