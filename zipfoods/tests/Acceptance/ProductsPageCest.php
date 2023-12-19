<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class ProductsPageCest
{
    public function productsSeeded(AcceptanceTester $I)
    {
        $I->amOnPage('/products');
        $productCount = count($I->grabMultiple('.product-link'));
        $I->assertGreaterThanOrEqual(10, $productCount);
    }
    public function createProduct(AcceptanceTester $I)
    {
        $I->amOnPage('/products/new');

        $I->fillField('sku', 'lala ');

        $I->click('[test=new-submit-button]');
        
        $I->seeElement('[test=new-product-error]');
   
    }
}