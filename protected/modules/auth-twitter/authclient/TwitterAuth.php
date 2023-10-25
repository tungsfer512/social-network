<?php

namespace humhubContrib\auth\twitter\authclient;

use yii\authclient\clients\Twitter;

/**
 * Twitter allows authentication via Twitter OAuth.
 */
class TwitterAuth extends Twitter
{
    /**
     * @inheritdoc
     */
    public $attributeParams = [
        'include_email' => 'true'
    ];

    /**
     * @inheritdoc
     */
    protected function defaultViewOptions()
    {
        return [
            'popupWidth' => 860,
            'popupHeight' => 480,
            'cssIcon' => 'fa fa-twitter',
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
                if (!isset($attributes['given_name'])) {
                    return '';
                }

                return $attributes['given_name'];
            },
            'lastname' => function ($attributes) {
                if (!isset($attributes['family_name'])) {
                    return '';
                }

                return $attributes['family_name'];
            },
            'title' => 'tagline',
            'email' => function ($attributes) {
                return $attributes['email'];
            },
        ];
    }
}
