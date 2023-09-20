<?php

use humhub\modules\content\widgets\richtext\converter\RichTextToHtmlConverter;
use humhub\modules\termsbox\Assets;
use humhub\libs\Html;
use yii\helpers\Url;

/* @var $title string */
/* @var $statement string */
/* @var $content string */

Assets::register($this);
?>

<div class="modal" id="termsboxModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="myModalLabel" class="modal-title"><?= Html::encode($title) ?></h4>
            </div>
            <div class="modal-body">
                <p class='help-block'><?= Html::encode($statement) ?></p>
                <div class="termsbox-body" data-ui-markdown>
                    <?= RichTextToHtmlConverter::process($content) ?>
                </div>
            </div>
            <div class="modal-footer">
                <a id="termsbox-accept" class="btn btn-success" data-ui-loader><?= Yii::t('TermsboxModule.widgets_views_termsboxModal', 'Accept'); ?></a>
                <a class="btn btn-danger" href="<?= Url::to(['/termsbox/index/decline']); ?>" data-method="POST" data-ui-loader><?= Yii::t('TermsboxModule.widgets_views_termsboxModal', 'Decline'); ?></a>
            </div>
        </div>
    </div>
</div>


<?= Html::beginTag('script') ?>
    $(document).ready(function () {
        $('#termsboxModal').modal({
            backdrop: 'static',
            keyboard: false,
            show: true
        });
    });

    $('#termsbox-accept').on('click', function () {
        $.ajax({
            url: '<?= Url::to(['/termsbox/index/accept']) ?>',
            success: function () {
                $('#termsboxModal').modal('hide');
            }
        });
    });
<?= Html::endTag('script')?>
