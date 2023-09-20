<?php

use humhub\modules\ui\form\widgets\ContentVisibilitySelect;
use humhub\modules\ui\form\widgets\ActiveForm;
use humhub\modules\ui\form\widgets\ColorPicker;
use humhub\widgets\Button;

/* @var $this yii\web\View */
/* @var $model \humhub\modules\external_calendar\models\ExternalCalendar */
/* @var $contentContainer \humhub\modules\content\models\ContentContainer */
/* @var $form yii\widgets\ActiveForm */

if (!isset($model->color) && isset($contentContainer->color)) {
    $model->color = $contentContainer->color;
} elseif (!isset($model->color)) {
    $model->color = '#d1d1d1';
}

\humhub\modules\external_calendar\assets\Assets::register($this);
?>
<div class="calendar-extension-calendar-form">
    <?php $form = ActiveForm::begin(['id'=>'add-new-calendar', 'method'=>'post', 'enableClientValidation' => true]); ?>

    <?= $form->errorSummary($model) ?>

    <div id="event-color-field" class="form-group space-color-chooser-edit" style="margin-top: 5px;">
        <?= $form->field($model, 'color')->widget(ColorPicker::class, ['container' => 'event-color-field'])->label(Yii::t('ExternalCalendarModule.views_calendar', 'Title and Color')); ?>

        <?= $form->field($model, 'title', ['template' => '
                                    {label}
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i></i>
                                        </span>
                                        {input}
                                    </div>
                                    {error}{hint}'
        ])->textInput(['placeholder' => Yii::t('ExternalCalendarModule.model_calendar', 'Title')])->label(false) ?>

    </div>

    <?= $form->field($model, 'url')->textarea(['rows' => 6, 'placeholder' => Yii::t('ExternalCalendarModule.model_calendar', 'e.g. https://calendar.google.com/calendar/ical/...')]) ?>


    <?= $form->field($model, 'public')->widget(ContentVisibilitySelect::class) ?>
    <?= $form->field($model, 'sync_mode')->dropDownList($model->getSyncModeItems()) ?>
    <?= $form->field($model, 'event_mode')->dropDownList($model->getEventModeItems()) ?>

    <div class="form-group">
        <?= Button::save()->submit() ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

