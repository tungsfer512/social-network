<?php

namespace gm\humhub\modules\integration\discord\models;

use Yii;
use yii\base\Model;
use humhub\modules\space\models\Space;
use humhub\modules\content\components\ContentContainerSettingsManager;
use humhub\modules\content\components\ContentContainerActiveRecord;
use humhub\modules\content\models\ContentContainer;

/**
 * ConfigureForm defines the configurable fields.
 *
 * This is the model class for table "discord_space".
 *
 * @property integer $id
 */
class SpaceForm extends Model
{
    const SIDEEBAR_STREAM = 'SpaceStreamSidebar';
    const DARK_MODE = '&theme=dark';
    const LIGHT_MODE = '&theme=light';

    /**
     * @var ContentContainerActiveRecord
     */
    public $contentContainer;

    /**
     * @var string the dark/light mode
     */
    public $sMode;

    /**
     * @return ContentContainerSettingsManager
     */
    private function getSettings()
    {
        return Yii::$app->getModule('discord')->settings->space()->get('sUrl', $sUrl);
    }

    /**
     * @inheritdoc
     */
    public $moduleId = 'discord';

    /**
     * @return string the associated database table name
     */
    public static function tableName()
    {
        return 'discord_space';
    }

    public static function getDefaultTargets()
    {
        return [
            ['id' => self::SIDEEBAR_STREAM, 'name' => 'Stream', 'accessRoute' => '/space/space/home']
        ];
    }

    public $sUrl;

    public function canView()
    {
        if ($this->admin_only && !$this->canSeeAdminOnlyContent()) {
            return false;
        }

        // Todo: Workaround for bug present prior to HumHub v1.3.18
        if (Yii::$app->user->isGuest && !$this->content->container && $this->content->isPublic()) {
            return true;
        }

        // Todo: Workaround for global content visibility bug present prior to HumHub v1.5
        if (empty($this->content->contentcontainer_id) && !Yii::$app->user->isGuest) {
            return true;
        }

        return $this->content->canView();
    }

    public function canSeeAdminOnlyContent()
    {
        $container = $this->content->container;
        if ($container && $container instanceof Space) {
            return $container->isAdmin();
        }

        return Yii::$app->user->isAdmin();
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sUrl', 'sMode'], 'required']
        ];
    }

    public static function getMode($sMode) : array
    {
        return self::getModes()[$sMode];
    }

    /**
     * @return requests for dark/light modes
     */
    public static function getModes($selectable = true) : array
    {
        $sMode = [
            self::DARK_MODE => 'Dark Mode',
            self::LIGHT_MODE => 'Light Mode',
        ];

        if ($selectable) {
            return $sMode;
        }

        return $sMode;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sUrl' => Yii::t('DiscordModule.widget', 'Discord Widget URL:'),
            'sMode' => 'Mode'
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'sUrl' => Yii::t('DiscordModule.widget', 'e.g. https://discord.com/widget?id={server-id}'),
        ];
    }

    /**
     * Static initializer
     * @return \self
     */
    public static function instantiate()
    {
        return new self;
    }

    public function loadSettings()
    {
        $this->sUrl = Yii::$app->getModule('discord')->settings->space()->get('sUrl');
        $this->sMode = Yii::$app->getModule('discord')->settings->space()->get('sMode');

        return true;
    }

    public function saveSettings()
    {
        Yii::$app->getModule('discord')->settings->space()->set('sUrl', $this->sUrl);
        Yii::$app->getModule('discord')->settings->space()->set('sMode', $this->sMode);

        return true;
    }

    /**
     * Deletes all tags by module id
     * @param ContentContainerActiveRecord|int $contentContainer
     */
    public static function deleteByModule($contentContainer = null)
    {
        $instance = new static();

        if ($contentContainer) {
            $container_id = $contentContainer instanceof ContentContainerActiveRecord ? $contentContainer->contentcontainer_id : $contentContainer;
            static::deleteAll(['module_id' => $instance->module_id, 'contentcontainer_id' => $container_id]);
        } else {
            static::deleteAll(['module_id' => $instance->module_id]);
        }
    }

    /**
     * Deletes all tags by type
     * @param ContentContainerActiveRecord|int $contentContainer
     */
    public static function deleteByType($contentContainer = null)
    {
        $instance = new static();

        if ($contentContainer) {
            $container_id = $contentContainer instanceof ContentContainerActiveRecord ? $contentContainer->contentcontainer_id : $contentContainer;
            static::deleteAll(['type' => $instance->type, 'contentcontainer_id' => $container_id]);
        } else {
            static::deleteAll(['type' => $instance->type]);
        }
    }
}
