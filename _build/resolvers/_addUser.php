<?php
/**
 * Created by CrazyBoy49z
 * Date: 11.03.2019
 * Time: 4:16
 */
if ($transport->xpdo) {
    $users = [
        [
            'modUser' => [
                'username' => 'Новый2',
                'password' => '1234567890'
            ],
            'modUserProfile' => [
                'fullname' => 'Фамилия Имя2',
                'email' => 'user@site.ru2',
            ]
        ],
    ];

    $modx =& $transport->xpdo;

    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
            foreach ($users as $user) {
                if (!$modx->getObject('modUser', array(
                    'username' => $user['modUser']['username'],
                ))) {
                    $modUser = $modx->newObject('modUser');
                    $modUser->fromArray($user['modUser']);
                    $modUserProfile = $modx->newObject('modUserProfile');
                    $modUserProfile->fromArray($user['modUserProfile']);
                    $modUser->addOne($modUserProfile);
                    $modUser->save();
                }
            }
        case xPDOTransport::ACTION_UNINSTALL:
            break;
    }
}

return true;