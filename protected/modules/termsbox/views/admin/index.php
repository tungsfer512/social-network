<?php

use humhub\modules\content\widgets\richtext\RichTextField;
use humhub\modules\termsbox\models\forms\EditForm;
use humhub\modules\ui\form\widgets\ActiveForm;
use humhub\widgets\Button;

/* @var EditForm $model */
?>
<div class="panel panel-default">
    <div class="panel-heading"><?php echo Yii::t('TermsboxModule.views_admin_index', 'Terms Box Configuration'); ?></div>
    <div class="panel-body">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'active')->checkbox(); ?>
        <?= $form->field($model, 'title'); ?>
        <?= $form->field($model, 'statement'); ?>
        <?= $form->field($model, 'content')->widget(RichTextField::class) ?>
        <?= $form->field($model, 'reset')->checkbox(); ?>
        <!--
        <?= $form->field($model, 'showAsModal')->checkbox(); ?>
        -->
        <?= $form->field($model, 'hideUnaccepted')->checkbox(); ?>

        <hr>

        <?= Button::save()->submit() ?>
        <?= Button::defaultType(Yii::t('TermsboxModule.views_admin_index', 'Back to modules'))
            ->link(['/admin/module']) ?>

        <?php ActiveForm::end(); ?>
    </div>
</div>