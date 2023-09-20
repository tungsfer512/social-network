<?php

namespace humhubContrib\auth\linkedin\authclient;

use yii\authclient\clients\LinkedIn;

/**
 * LinkedIn allows authentication via LinkedIn OAuth.
 */
class LinkedinAuth extends LinkedIn
{

    /**
     * @inheritdoc
     */
    protected function defaultViewOptions()
    {
        return [
            'popupWidth' => 860,
            'popupHeight' => 480,
            'cssIcon' => 'fa fa-linkedin',
            'buttonBackgroundColor' => '#e0492f',
        ];
    }

    /**
     * @inheritdoc
     */
    protected function defaultNormalizeUserAttributeMap()
    {
        return [
            'username' => 'displayName',
            'firstname' => function ($attributes) {
                if (!isset($attributes['firstname']) || empty($attributes['firstname'])) {
                    $key = array_keys($attributes['firstName']['localized'])[0];
                    return isset($attributes['firstName']['localized'][$key]) ? $attributes['firstName']['localized'][$key] : '';
                }

                return $attributes['firstname'];
            },
            'lastname' => function ($attributes) {
                if (!isset($attributes['lastname']) || empty($attributes['lastname'])) {
                    $key = array_keys($attributes['lastName']['localized'])[0];
                    return isset($attributes['lastName']['localized'][$key]) ? $attributes['lastName']['localized'][$key] : '';
                }

                return $attributes['lastname'];
            },
            'title' => 'tagline',
            'email' => function ($attributes) {
                return $attributes['email'];
            },
        ];
    }
}
