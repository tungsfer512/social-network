<?php

namespace twitter\acceptance;

use \AcceptanceTester;

class AuthCest
{

    public function testTwitterSignUpAndLogin(AcceptanceTester $I)
    {
        $I->wantTo('sign up with twitter');

        $I->amOnPage('/user/auth/login');
        $I->wantTo('sign up with twitter');
        $I->jsClick('[href="/user/auth/external?authclient=twitter"]');
        $I->waitForText('Create Account', 10);
        $I->see('Password cannot be blank.');
        $I->fillField('User[username]', 'twitter-test');
        $I->fillField('Profile[firstname]', 'Twitter');
        $I->fillField('Profile[lastname]', 'Test');
        $I->jsClick('[name="save"]');
        $I->wait(3);
        $I->amOnUrl('dashboard');

        $I->wantTo('log in with twitter');

        $I->logout();
        $I->amOnPage('/user/auth/login');
        $I->jsClick('[href="/user/auth/external?authclient=twitter"]');
        $I->wait(3);
        $I->amOnUrl('dashboard');
    }

}
