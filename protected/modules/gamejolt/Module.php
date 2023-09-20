<?php

namespace humhub\modules\gamejolt;

use Yii;
use yii\helpers\Url;

class Module extends \humhub\components\Module
{

    public $resourcesPath = 'resources';

    /**
     * @inheritdoc
     */
    public function getConfigUrl()
    {
        return Url::to(['/gamejolt/admin']);
    }

    public function getServerUrl()
    {
        $url = $this->settings->get('serverUrl');
        if (empty($url)) {
            return 'https://widgets.gamejolt.com';
        }
        return $url;
    }

    public function getMode()
    {
        $mode = $this->settings->get('mode');
        if (empty($mode)) {
            return '';
        }
        return $mode;
    }
}
