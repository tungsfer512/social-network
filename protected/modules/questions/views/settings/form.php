<?php
/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

use humhub\modules\questions\models\forms\ContainerSettings;
use humhub\modules\space\models\Space;
use humhub\widgets\Button;
use yii\bootstrap\ActiveForm;

/* @var ContainerSettings $settings */
?>
<div class="panel panel-default">
    <div class="panel-heading"><?= Yii::t('QuestionsModule.base', '<strong>Questions</strong> settings') ?></div>
    <div class="panel-body">
        <div class="help-block">
            <?= $settings->contentContainer instanceof Space
                ? Yii::t('QuestionsModule.base', 'Settings of the "Questions" module for this single Space.')
                : Yii::t('QuestionsModule.base', 'Settings of the "Questions" module for your Profile.')?>
        </div>
        <br>
        <?php $form = ActiveForm::begin() ?>

        <?= $form->field($settings, 'showAnswersInStream')->checkbox() ?>

        <?= Button::save()->submit() ?>

        <?php ActiveForm::end() ?>
    </div>
</div>
