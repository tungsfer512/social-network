<?php

namespace humhub\modules\gamejolt;

return [
    'id' => 'gamejolt',
    'class' => 'humhub\modules\gamejolt\Module',
    'namespace' => 'humhub\modules\gamejolt',
    'events' => [
        [
            'class' => \humhub\modules\dashboard\widgets\Sidebar::class,
            'event' => \humhub\modules\dashboard\widgets\Sidebar::EVENT_INIT,
            'callback' => [
                'humhub\modules\gamejolt\Events',
                'addGamejoltFrame'
            ]
        ],
        [
            'class' => \humhub\modules\space\widgets\Sidebar::class,
            'event' => \humhub\modules\space\widgets\Sidebar::EVENT_INIT,
            'callback' => [
                'humhub\modules\gamejolt\Events',
                'addGamejoltFrame'
            ]
        ],
        [
            'class' => \humhub\modules\admin\widgets\AdminMenu::class,
            'event' => \humhub\modules\admin\widgets\AdminMenu::EVENT_INIT,
            'callback' => [
                'humhub\modules\gamejolt\Events',
                'onAdminMenuInit'
            ]
        ]
    ]
];
?>
