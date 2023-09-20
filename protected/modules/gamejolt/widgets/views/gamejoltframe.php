<?php

use humhub\libs\Html;
use humhub\widgets\PanelMenu;

\humhub\modules\gamejolt\Assets::register($this);
?>

<div class="panel panel-default panel-gamejolt" id="panel-gamejolt">
    <?= PanelMenu::widget(['id' => 'panel-gamejolt']); ?>
  <div class="panel-heading">
    <?= Yii::t('GamejoltModule.base', '<strong>Gamejolt</strong>'); ?>
  </div>
  <div class="panel-body">

<?= Html::beginTag('div') ?>
<iframe src="<?= $gamejoltUrl; ?><?= $mode; ?>" id="gamejoltFrame" width="100%" height="300" allowtransparency="true" frameborder="0" name="iframeContainer"></iframe>
<?= Html::endTag('div'); ?>
</div>
</div>
