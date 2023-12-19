<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class P3Cest
{


    // tests
    public function playGame(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->seeElement('[test=card-shows]');
        $I->fillField('[test=high-radio]', 'high');
        $I->click('[test=submit-button]');

        $I->seeElement('[test=results-div]');

        $original_card = $I->grabTextFrom('[test=first-card]');
        $next_card = $I->grabTextFrom('[test=next-card]');
        $I->comment('Original card: '.$original_card);
        $I->comment('Next draw: '.$next_card);
        if($next_card > $original_card) {
            $I->seeElement('[test=won-message]');
        } else {
            $I->seeElement('[test=lost-message]');
        }
        $I->seeElement('[test=player-guess]');
        $I->fillField('[test=low-radio]', 'low');
        $I->click('[test=submit-button]');

        $I->seeElement('[test=results-div]');

        $original_card = $I->grabTextFrom('[test=first-card]');
        $next_card = $I->grabTextFrom('[test=next-card]');
        $I->comment('Original card: '.$original_card);
        $I->comment('Next draw: '.$next_card);
        if($next_card < $original_card) {
            $I->seeElement('[test=won-message]');
        } else {
            $I->seeElement('[test=lost-message]');
        }
        $I->seeElement('[test=player-guess]');
    }
    public function showsHistoryAndRoundDetails(AcceptanceTester $I)
    {
        $I->amOnPage('/history');
        $roundCount = count($I->grabMultiple('[test=individual-round]'));
        $I->assertGreaterThanOrEqual(10, $roundCount);
        $timestamp = $I->grabTextFrom('[test=individual-round]');
        $I->click($timestamp);
        $I->see($timestamp);
        $I->seeElement('[test=round-details-header]');
        $I->see('Round Id:');

    }
    public function testValidation(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->click('[test=submit-button]');
        $I->seeElement('[test=form-validation-errors]');
    }
    public function testLinks(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->seeElement('[test=history-page-link]');
        $I->click('[test=history-page-link]');
        $I->seeElement('[test=history-page-header]');
        $I->seeElement('[test=back-to-home-page]');
        $I->click('[test=back-to-home-page]');
        $I->seeElement('[test=home-page-header]');
    }
}