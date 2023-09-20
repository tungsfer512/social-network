<?php

namespace humhubContrib\auth\twitter\models;

use Yii;
use yii\base\Model;
use yii\helpers\Url;
use humhubContrib\auth\twitter\Module;

/**
 * The module configuration model
 */
class ConfigureForm extends Model
{
    /**
     * @var boolean Enable this authclient
     */
    public $enabled;

    /**
     * @var string the consumer id (API Key) provided by Twitter
     */
    public $consumerId;

    /**
     * @var string the consumer secret (API Secret) provided by Twitter
     */
    public $consumerSecret;

    /**
     * @var string readonly
     */
    public $redirectUri;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['consumerId', 'consumerSecret'], 'required'],
            [['enabled'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'enabled' => Yii::t('AuthTwitterModule.base', 'Enabled'),
            'consumerId' => Yii::t('AuthTwitterModule.base', 'Consumer ID (API Key)'),
            'consumerSecret' => Yii::t('AuthTwitterModule.base', 'Consumer secret (API Secret)'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
        ];
    }

    /**
     * Loads the current module settings
     */
    public function loadSettings()
    {
        /** @var Module $module */
        $module = Yii::$app->getModule('auth-twitter');

        $settings = $module->settings;

        $this->enabled = (boolean)$settings->get('enabled');
        $this->consumerId = $settings->get('consumerId');
        $this->consumerSecret = $settings->get('consumerSecret');

        $this->redirectUri = Url::to(['/user/auth/external', 'authclient' => 'twitter'], true);
//        $this->redirectUri = Url::to(['user/auth/twitter'], true);
    }

    /**
     * Saves module settings
     */
    public function saveSettings()
    {
        /** @var Module $module */
        $module = Yii::$app->getModule('auth-twitter');

        $module->settings->set('enabled', (boolean)$this->enabled);
        $module->settings->set('consumerId', $this->consumerId);
        $module->settings->set('consumerSecret', $this->consumerSecret);

        return true;
    }

    /**
     * Returns a loaded instance of this configuration model
     */
    public static function getInstance()
    {
        $config = new static;
        $config->loadSettings();

        return $config;
    }

}
