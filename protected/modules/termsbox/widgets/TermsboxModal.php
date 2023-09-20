<?php

namespace humhub\modules\termsbox\widgets;

use humhub\components\Widget;
use humhub\modules\termsbox\models\forms\EditForm;

/**
 * Will injected a terms and condition box to the layout
 *
 * @package humhub.modules.termsbox.widgets
 * @since 0.5 
 * @author Luke
 */
class TermsboxModal extends Widget
{

    /**
     * Executes the widgets
     */
    public function run()
    {
        $termsboxForm = new EditForm();
        
        return $this->render('termsboxModal', [
            'title' => $termsboxForm->title, 
            'content' => $termsboxForm->content,
            'statement' => $termsboxForm->statement
        ]);
    }

}