<?php

namespace gm\humhub\modules\integration\discord\widgets;

use Yii;
use yii\base\Widget;
use gm\humhub\modules\integration\discord\models\SpaceForm;

/**
 *
 * @author Felli
 */
class SpaceFrame extends Widget
{

    public $contentContainer;

    /**
     * How many snippets should be shown?
     *
     * @var int
     */
    public $limit = 1;

    /**
     * @inheritdoc
     */
    public function run()
    {
        $module = Yii::$app->getModule('discord');

        $sUrl = Yii::$app->getModule('discord')->getSUrl() . $module->settings->space()->get('sMode');

        if (!$sUrl) {
            return '';
        }

        return $this->render('spaceframe', ['sUrl' => $sUrl]);
    }
}
