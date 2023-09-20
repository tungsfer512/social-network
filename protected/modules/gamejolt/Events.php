<?php

namespace humhub\modules\gamejolt;

use Yii;
use yii\helpers\Url;
use humhub\modules\gamejolt\widgets\GamejoltFrame;
use yii\base\BaseObject;
use humhub\models\Setting;

class Events extends BaseObject
{

    public static function onAdminMenuInit($event)
    {
        $event->sender->addItem([
            'label' => Yii::t('GamejoltModule.base', 'Gamejolt Settings'),
            'url' => Url::toRoute('/gamejolt/admin/index'),
            'group' => 'settings',
            'icon' => '<i class="fa fa-gamepad"></i>',
            'isActive' => Yii::$app->controller->module && Yii::$app->controller->module->id == 'gamejolt' && Yii::$app->controller->id == 'admin',
            'sortOrder' => 650
        ]);
    }

public static function addGamejoltFrame($event)
    {
        if (Yii::$app->user->isGuest) {
            return;
        }
        $event->sender->view->registerAssetBundle(Assets::class);
        $event->sender->addWidget(GamejoltFrame::class, [], [
            'sortOrder' => Setting::Get('timeout', 'gamejolt')
        ]);
    }
}
