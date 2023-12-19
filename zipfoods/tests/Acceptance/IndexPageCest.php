<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class IndexPageCest
{
    public function welcomeMessage(AcceptanceTester $I)
    {
        $I->amOnPage('/');

        $I->see('Welcome!');
    }
}