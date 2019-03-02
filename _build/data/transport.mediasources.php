<?php

/*
 * @package modDevExtra
 * @subpackage build
 * @author CrazyBoy49z
 * https://yura.finiv.in.ua
 */
$mediaSources = array();

$params = array(
    "basePath" => array(
        "name" => "basePath",
        "desc" => "prop_file.basePath_desc",
        "type" => "textfield",
        "options" => Array(),
        "value" => "core/DevFolder/",
        "lexicon" => "core:source",
    ),
    "baseUrl" => Array
    (
        "name" => "baseUrl",
        "desc" => "prop_file.baseUrl_desc",
        "type" => "textfield",
        "options" => Array(),
        "value" => "core/DevFolder/",
        "lexicon" => "core:source",
    )
);

$mediaSource = $modx->newObject('sources.modMediaSource', array(
    'name' => 'Dev Folder',
    'class_key' => 'sources.modFileMediaSource',
    'description'   => 'Dev Folder Source',
    'properties' => $params,
));

$mediaSources[] = $mediaSource;

return $mediaSources;