<?php

use humhub\modules\calendar\widgets\CalendarControls;
use humhub\modules\calendar\widgets\ConfigureButton;
use humhub\modules\calendar\widgets\FilterType;
use humhub\modules\content\components\ActiveQueryContent;
use humhub\modules\calendar\models\CalendarEntry;
use humhub\widgets\FadeIn;

/* @var $canConfigure bool */
/* @var $canAddEntries bool */
/* @var $selectors array */
/* @var $filters array */
/* @var $showSelectors bool */
/* @var $showFilters bool */
/* @var $showTypes bool */
?>

<?php FadeIn::begin() ?>
<div class="row calendar-options">
    <div class="col-md-12">
        <div id="calendar-overview-loader"></div>
        <div class="calendar-option-buttons">
            <?= CalendarControls::widget([
                    'widgets' => [
                        [ConfigureButton::class, [], ['sortOrder' => 100]]
                    ]
            ])?>
        </div>
        <?php if ($showSelectors) : ?>
            <div class="calendar-selectors">
                <strong style="padding-left:10px;">
                    <?= Yii::t('CalendarModule.views_global_index', '<strong>Select</strong> calendars'); ?>
                </strong>
                <br>
                <div style="display:inline-block; float:left;margin-right:10px;">
                    <div class="checkbox">
                        <label class="calendar_my_profile">
                            <input type="checkbox" name="selector" class="selectorCheckbox" value="<?= ActiveQueryContent::USER_RELATED_SCOPE_OWN_PROFILE; ?>"
                                   <?php if (in_array(ActiveQueryContent::USER_RELATED_SCOPE_OWN_PROFILE, $selectors)): ?>checked="checked"<?php endif; ?>>
                            <?= Yii::t('CalendarModule.views_global_index', 'My profile'); ?>
                        </label>
                    </div>
                    <div class="checkbox">
                        <label class="calendar_my_spaces">
                            <input type="checkbox" name="selector" class="selectorCheckbox" value="<?= ActiveQueryContent::USER_RELATED_SCOPE_SPACES; ?>"
                                   <?php if (in_array(ActiveQueryContent::USER_RELATED_SCOPE_SPACES, $selectors)): ?>checked="checked"<?php endif; ?>>
                            <?= Yii::t('CalendarModule.views_global_index', 'My spaces'); ?>
                        </label>
                    </div>
                </div>

                <?php if (!Yii::$app->getModule('user')->disableFollow) : ?>
                    <div style="display:inline-block;">
                        <div class="checkbox">
                            <label class="calendar_followed_spaces">
                                <input type="checkbox" name="selector" class="selectorCheckbox" value="<?= ActiveQueryContent::USER_RELATED_SCOPE_FOLLOWED_SPACES; ?>"
                                       <?php if (in_array(ActiveQueryContent::USER_RELATED_SCOPE_FOLLOWED_SPACES, $selectors)): ?>checked="checked"<?php endif; ?>>
                                <?= Yii::t('CalendarModule.views_global_index', 'Followed spaces'); ?>
                            </label>
                        </div>
                        <div class="checkbox">
                            <label class="calendar_followed_users">
                                <input type="checkbox" name="selector" class="selectorCheckbox" value="<?= ActiveQueryContent::USER_RELATED_SCOPE_FOLLOWED_USERS; ?>"
                                       <?php if (in_array(ActiveQueryContent::USER_RELATED_SCOPE_FOLLOWED_USERS, $selectors)): ?>checked="checked"<?php endif; ?>>
                                <?= Yii::t('CalendarModule.views_global_index', 'Followed users'); ?>
                            </label>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif ?>
        <?php if ($showFilters) : ?>
        <div class="calendar-filters" style="<?= ($showSelectors) ? 'border-left:2px solid ' . $this->theme->variable('default') : '' ?>">
            <strong style="padding-left:10px;">
                <?= Yii::t('CalendarModule.views_global_index', '<strong>Filter</strong> events'); ?>
            </strong>
            <br>

            <div style="display:inline-block;margin-right:10px;">
                <div class="checkbox">
                    <label class="calendar_filter_participate">
                        <input type="checkbox" name="filter" class="filterCheckbox" value="<?= CalendarEntry::FILTER_PARTICIPATE; ?>"
                               <?php if (in_array(CalendarEntry::FILTER_PARTICIPATE, $filters)): ?>checked="checked"<?php endif; ?>>
                        <?= Yii::t('CalendarModule.views_global_index', 'I\'m attending'); ?>
                    </label>
                </div>
                <div class="checkbox">
                    <label class="calendar_filter_mine">
                        <input type="checkbox" name="filter" class="filterCheckbox" value="<?= CalendarEntry::FILTER_MINE; ?>"
                               <?php if (in_array(CalendarEntry::FILTER_MINE, $filters)): ?>checked="checked"<?php endif; ?>>
                        <?= Yii::t('CalendarModule.views_global_index', 'My events'); ?>
                    </label>
                </div>
            </div>
        </div>
        <?php endif ?>
        <?php if ($showTypes) : ?>
        <div class="calendar-types" style="<?= $showSelectors || $showFilters ? 'border-left:2px solid ' . $this->theme->variable('default') : '' ?>">
            <strong style="padding-left:10px;">
                <?= Yii::t('CalendarModule.base', 'Filter by types'); ?>
            </strong>
            <br>
            <div style="padding: 0 0 10px 10px">
                <?= FilterType::widget(['name' => 'filterType']) ?>
            </div>
        </div>
        <?php endif ?>
    </div>
</div>
<?php FadeIn::end() ?>