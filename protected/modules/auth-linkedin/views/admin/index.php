<?php
/* @var $this \humhub\modules\ui\view\components\View */
/* @var $model \humhubContrib\auth\linkedin\models\ConfigureForm */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>
<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            <?= Yii::t('AuthLinkedinModule.base', '<strong>LinkedIn</strong> Sign-In configuration') ?></div>

        <div class="panel-body">
            <p>
                <?= Html::a(Yii::t('AuthLinkedinModule.base', 'LinkedIn Documentation'), 'https://www.linkedin.com/help/linkedin/answer/5070/log-in-with-linkedin-credentials?lang=en', ['class' => 'btn btn-primary pull-right btn-sm', 'target' => '_blank']); ?>
                <?= Yii::t('AuthLinkedinModule.base', 'Please follow the LinkedIn instructions to create the required <strong>OAuth client</strong> credentials.'); ?>
                <br/>
            </p>
            <br/>

            <?php $form = ActiveForm::begin(['id' => 'configure-form', 'enableClientValidation' => false, 'enableClientScript' => false]); ?>

            <?= $form->field($model, 'enabled')->checkbox(); ?>

            <br/>
            <?= $form->field($model, 'clientId'); ?>
            <?= $form->field($model, 'clientSecret'); ?>

            <br/>
            <?= $form->field($model, 'redirectUri')->textInput(['readonly' => true]); ?>
            <br/>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('base', 'Save'), ['class' => 'btn btn-primary', 'data-ui-loader' => '']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
