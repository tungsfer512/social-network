<?php

use humhub\modules\user\authclient\Collection;

return [
    'id' => 'auth-linkedin',
    'class' => 'humhubContrib\auth\linkedin\Module',
    'namespace' => 'humhubContrib\auth\linkedin',
    'events' => [
        [Collection::class, Collection::EVENT_AFTER_CLIENTS_SET, ['humhubContrib\auth\linkedin\Events', 'onAuthClientCollectionInit']]
    ],
];
