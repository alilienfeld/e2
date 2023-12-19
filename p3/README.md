
# Project 3
+ By: Ali Lilienfeld
+ URL: <http://e2p3.hesclassali.me>

## Graduate requirement
*x one of the following:*
+ [x] I have integrated testing into my application
+ [ ] I am taking this course for undergraduate credit and have opted out of integrating testing into my application

## Outside resources
+ https://stackoverflow.com/questions/6547209/passing-an-array-using-an-html-form-hidden-element 
## Notes for instructor
+ I read through https://github.com/susanBuck/e2-fall23/issues/40 to understand next steps but ran out of time to implement.

## Codeception testing output
```
Codeception PHP Testing Framework v5.0.12 https://stand-with-ukraine.pp.ua

Tests.Acceptance Tests (4) -----------------------------------------------------
P3Cest: Play game
Signature: Tests\Acceptance\P3Cest:playGame
Test: tests/Acceptance/P3Cest.php:playGame
Scenario --
 I am on page "/"
 I see element "[test=card-shows]"
 I fill field "[test=high-radio]","high"
 I click "[test=submit-button]"
 I see element "[test=results-div]"
 I grab text from "[test=first-card]"
 I grab text from "[test=next-card]"
 Original card: 3
 Next draw: 10
 I see element "[test=won-message]"
 I see element "[test=player-guess]"
 I fill field "[test=low-radio]","low"
 I click "[test=submit-button]"
 I see element "[test=results-div]"
 I grab text from "[test=first-card]"
 I grab text from "[test=next-card]"
 Original card: 10
 Next draw: 6
 I see element "[test=won-message]"
 I see element "[test=player-guess]"
 PASSED 

P3Cest: Shows history and round details
Signature: Tests\Acceptance\P3Cest:showsHistoryAndRoundDetails
Test: tests/Acceptance/P3Cest.php:showsHistoryAndRoundDetails
Scenario --
 I am on page "/history"
 I grab multiple "[test=individual-round]"
 I assert greater than or equal 10,34
 I grab text from "[test=individual-round]"
 I click "2023-12-19 04:21:29"
 I see "2023-12-19 04:21:29"
 I see element "[test=round-details-header]"
 I see "Round Id:"
 PASSED 

P3Cest: Test validation
Signature: Tests\Acceptance\P3Cest:testValidation
Test: tests/Acceptance/P3Cest.php:testValidation
Scenario --
 I am on page "/"
 I click "[test=submit-button]"
 I see element "[test=form-validation-errors]"
 PASSED 

P3Cest: Test links
Signature: Tests\Acceptance\P3Cest:testLinks
Test: tests/Acceptance/P3Cest.php:testLinks
Scenario --
 I am on page "/"
 I see element "[test=history-page-link]"
 I click "[test=history-page-link]"
 I see element "[test=history-page-header]"
 I see element "[test=back-to-home-page]"
 I click "[test=back-to-home-page]"
 I see element "[test=home-page-header]"
 PASSED 

--------------------------------------------------------------------------------
Time: 00:00.307, Memory: 12.00 MB

OK (4 tests, 17 assertions)
```
