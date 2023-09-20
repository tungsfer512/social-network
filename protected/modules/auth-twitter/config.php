<?php

use humhub\modules\user\authclient\Collection;

return [
    'id' => 'auth-twitter',
    'class' => 'humhubContrib\auth\twitter\Module',
    'namespace' => 'humhubContrib\auth\twitter',
    'events' => [
        [Collection::class, Collection::EVENT_AFTER_CLIENTS_SET, ['humhubContrib\auth\twitter\Events', 'onAuthClientCollectionInit']]
    ],
];
