<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2018 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

namespace humhub\widgets;

use humhub\components\Widget;
use humhub\libs\Html;
use Yii;

/**
 * PoweredBy widget
 *
 * @since 1.3.7
 * @author Luke
 */
class PoweredBy extends Widget
{

    /**
     * @var bool return text link only
     */
    public $textOnly = false;

    /**
     * @var array link tag HTML options
     */
    public $linkOptions = [];

    /**
     * @inheritdoc
     */
    public function run()
    {

        if (static::isHidden()) {
            return '';
        }

        if ($this->textOnly) {
            return Yii::t('base', 'Được phát triển bởi {name}', ['name' => 'Công ty Cổ phần Công nghệ A.I-Soft (https://aisoft.com.vn)']);
        }

        if (!isset($this->linkOptions['target'])) {
            $this->linkOptions['target'] = '_blank';
        }

        return Yii::t('base', 'Được phát triển bởi {name}', [
            'name' => Html::a('Công ty Cổ phần Công nghệ A.I-Soft', 'https://aisoft.com.vn', $this->linkOptions)
        ]);
    }

    public static function isHidden()
    {
        return isset(Yii::$app->params['hidePoweredBy']);
    }

}
