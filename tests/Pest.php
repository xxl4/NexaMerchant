<?php

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "uses()" function to bind a different classes or traits.
|
*/

// uses(Webkul\Admin\Tests\AdminTestCase::class)->in('../packages/Webkul/Admin/tests');
uses(Webkul\DataGrid\Tests\DataGridTestCase::class)->in('../packages/Webkul/DataGrid/tests');
uses(Webkul\Shop\Tests\ShopTestCase::class)->in('../packages/Webkul/Shop/tests');

uses(Nicelizhi\Shopify\Tests\ShopifyTestCase::class)->in('../packages/Nicelizhi/Shopify/tests');
uses(Nicelizhi\Checkout\Tests\CheckoutTestCase::class)->in('../packages/Nicelizhi/Checkout/tests');
uses(Nicelizhi\Binom\Tests\BinomTestCase::class)->in('../packages/Nicelizhi/Binom/tests');
uses(Nicelizhi\OneBuy\Tests\OneBuyTestCase::class)->in('../packages/Nicelizhi/OneBuy/tests');
uses(Nicelizhi\Comments\Tests\CommentsTestCase::class)->in('../packages/Nicelizhi/Comments/tests');
uses(Nicelizhi\Lp\Tests\LpTestCase::class)->in('../packages/Nicelizhi/Lp/tests');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

function something()
{
    // ..
}
