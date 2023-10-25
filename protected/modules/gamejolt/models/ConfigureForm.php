<?php

namespace humhub\modules\gamejolt\models;

use Yii;
use yii\base\Model;

/**
 * ConfigureForm defines the configurable fields.
 */
class ConfigureForm extends Model
{

    public $serverUrl;
    public $mode;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['serverUrl', 'required'],
            ['mode', 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'serverUrl' => Yii::t('GamejoltModule.base', 'Gamejolt Widget URL:'),
            'mode' => Yii::t('GamejoltModule.base', 'Day/Night Mode:'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'serverUrl' => Yii::t('GamejoltModule.base', 'e.g. https://widgets.gamejolt.com//package/v1?key={package-id}'),
            'mode' => Yii::t('GamejoltModule.base', 'e.g. <code>&theme=light</code>'),
        ];
    }

    public function loadSettings()
    {
        $this->serverUrl = Yii::$app->getModule('gamejolt')->settings->get('serverUrl');

        $this->mode = Yii::$app->getModule('gamejolt')->settings->get('mode');

        return true;
    }

    public function save()
    {
        Yii::$app->getModule('gamejolt')->settings->set('serverUrl', $this->serverUrl);

        Yii::$app->getModule('gamejolt')->settings->set('mode', $this->mode);

        return true;
    }

}
