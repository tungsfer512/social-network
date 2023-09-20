<?php

namespace gm\humhub\modules\integration\discord\widgets;

use Yii;
use yii\base\Widget;

/**
 *
 * @author Felli
 */
class DiscordFrame extends Widget
{
    public $contentContainer;

    /**
     * @inheritdoc
     */
    public function run()
    {
        $module = Yii::$app->getModule('discord');

        $url = Yii::$app->getModule('discord')->getServerUrl() . $module->settings->get('mode');

        if (!$url) {
            return '';
        }

        return $this->render('discordframe', ['discordUrl' => $url]);
    }

}
