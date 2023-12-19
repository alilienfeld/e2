<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class NewProductPage
{
    public function createProduct(AcceptanceTester $I)
    {
        $I->amOnPage('/products/new');

        $I->fillField('sku', 'lala ');

        $I->click('[test=new-submit-button]');
        
        $I->seeElement('[test=new-product-error]');

        
    }
}