<?php namespace Lovata\Shopaholic\Tests\Unit\Models;

include_once __DIR__.'/../../../../toolbox/vendor/autoload.php';
include_once __DIR__.'/../../../../../../tests/PluginTestCase.php';

use PluginTestCase;
use Lovata\Shopaholic\Models\Category;
use Lovata\Shopaholic\Models\Product;
use Lovata\Toolbox\Traits\Tests\TestModelHasImages;
use Lovata\Toolbox\Traits\Tests\TestModelHasPreviewImage;
use Lovata\Toolbox\Traits\Tests\TestModelValidationNameField;
use Lovata\Toolbox\Traits\Tests\TestModelValidationSlugField;

/**
 * Class CategoryTest
 * @package Lovata\Shopaholic\Tests\Unit\Models
 * @author Andrey Kharanenka, a.khoronenko@lovata.com, LOVATA Group
 *
 * @mixin \PHPUnit\Framework\Assert
 */
class CategoryTest extends PluginTestCase
{
    use TestModelHasPreviewImage;
    use TestModelHasImages;

    use TestModelValidationNameField;
    use TestModelValidationSlugField;

    protected $sModelClass;

    /**
     * CategoryTest constructor.
     */
    public function __construct()
    {
        $this->sModelClass = Category::class;
        parent::__construct();
    }

    /**
     * Check model "product" relation config
     */
    public function testHasProductRelation()
    {
        $sErrorMessage = $this->sModelClass.' model has not correct "product" relation config';

        /** @var Category $obModel */
        $obModel = new Category();
        self::assertNotEmpty($obModel->hasMany, $sErrorMessage);
        self::assertArrayHasKey('product', $obModel->hasMany, $sErrorMessage);
        self::assertEquals(Product::class, $obModel->hasMany['product'], $sErrorMessage);
    }
}