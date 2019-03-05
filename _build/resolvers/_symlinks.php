<?php
/** @var xPDOTransport $transport */
/** @var array $options */
/** @var modX $modx */
if ($transport->xpdo) {
    $modx =& $transport->xpdo;

    $dev = MODX_BASE_PATH . 'Extras/modDevExtra/';
    /** @var xPDOCacheManager $cache */
    $cache = $modx->getCacheManager();
    if (file_exists($dev) && $cache) {
        if (!is_link($dev . 'assets/components/moddevextra')) {
            $cache->deleteTree(
                $dev . 'assets/components/moddevextra/',
                ['deleteTop' => true, 'skipDirs' => false, 'extensions' => []]
            );
            symlink(MODX_ASSETS_PATH . 'components/moddevextra/', $dev . 'assets/components/moddevextra');
        }
        if (!is_link($dev . 'core/components/moddevextra')) {
            $cache->deleteTree(
                $dev . 'core/components/moddevextra/',
                ['deleteTop' => true, 'skipDirs' => false, 'extensions' => []]
            );
            symlink(MODX_CORE_PATH . 'components/moddevextra/', $dev . 'core/components/moddevextra');
        }
    }
}

return true;