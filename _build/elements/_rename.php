<?php
/**
 * @author CrazyBoy49z <yura.finiv@gmail.com> https://yura.finiv.in.ua
 * @version 1.0
 * @package rename
 * Create 07.03.2019 1:47
 */
$modxversion = $this->modx->getVersionData();

return [
    $this->modx->getOption('core_path') . 'docs/changelog.txt'=>$this->modx->getOption('core_path') . 'docs/changelog-'.$modxversion['full_version'].'.txt',
    $this->modx->getOption('base_path') . 'ht.access' =>  $this->modx->getOption('base_path') . '.htaccess',
    $this->modx->getOption('core_path') . 'ht.access' =>  $this->modx->getOption('core_path') . '.htaccess',
];