<?php namespace App\Tests;
use App\Tests\AcceptanceTester;

class UserCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function tryToLogin(AcceptanceTester $I)
    {
        $I->amOnPage('/login');
        $I->fillField('email', 'laura.hantz@hotmail.fr');
        $I->fillField('password', 'alaji');
        $I->click('Se connecter');
        $I->amOnPage('/login');
        $I->see('Vous êtes connecté en tant que laura.hantz@hotmail.fr');
    }

    public function tryToFailLogin(AcceptanceTester $I)
    {
        $I->amOnPage('/login');
        $I->fillField('email', 'laura.hantz@hotmail.fr');
        $I->fillField('password', 'sdrfrf');
        $I->click('Se connecter');
        $I->see('Invalid credentials.');
    }
}
