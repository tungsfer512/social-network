<?php

namespace humhubContrib\auth\twitter;

use humhub\components\Event;
use humhub\modules\user\authclient\Collection;
use humhubContrib\auth\twitter\authclient\TwitterAuth;
use humhubContrib\auth\twitter\models\ConfigureForm;
use yii\helpers\Url;

class Events
{
    /**
     * @param Event $event
     */
    public static function onAuthClientCollectionInit($event)
    {
        /** @var Collection $authClientCollection */
        $authClientCollection = $event->sender;

        if (!empty(ConfigureForm::getInstance()->enabled)) {
            $authClientCollection->setClient('twitter', [
                'class' => TwitterAuth::class,
                'consumerKey' => ConfigureForm::getInstance()->consumerId,
                'consumerSecret' => ConfigureForm::getInstance()->consumerSecret
            ]);
        }
    }

}
