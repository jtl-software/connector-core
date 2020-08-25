<?php

namespace Jtl\Connector\Core\Model\Generator;

use Jawira\CaseConverter\CaseConverterException;
use Jtl\Connector\Core\Definition\IdentityType;
use Jtl\Connector\Core\Model\Product;

class ProductFactory extends AbstractModelFactory
{
    protected $withBasePrice = false;

    /**
     * @return array
     * @throws \Exception
     */
    protected function makeFakeArray(): array
    {
        /** @var IdentityFactory $identityFactory */
        $identityFactory = $this->getFactory('Identity');

        $units = ['mm', 'cm', 'm', 'km'];

        return [
            'basePriceUnitId' => $identityFactory->makeOneArray(),
            'manufacturerId' => $this->makeIdentityArray(IdentityType::MANUFACTURER),
            'measurementUnitId' => $identityFactory->makeOneArray(),
            'partsListId' => $identityFactory->makeOneArray(),
            'productTypeId' => $identityFactory->makeOneArray(),
            'shippingClassId' => $identityFactory->makeOneArray(),
            'unitId' => $identityFactory->makeOneArray(),
            'asin' => $this->faker->word,
            'availableFrom' => mt_rand(0, 1) === 1 ? $this->faker->iso8601 : null,
            'measurementQuantity' => $this->faker->randomFloat(2, 1),
            'measurementUnitCode' => $this->faker->randomElement($units),
            'basePriceDivisor' => 0.0,
            'basePriceFactor' => 0.0,
            'basePriceQuantity' => $this->faker->randomFloat(3, 1),
            'basePriceUnitCode' => $this->faker->randomElement($units),
            'basePriceUnitName' => $this->faker->word,
            'considerBasePrice' => false,
            'considerStock' => $this->faker->boolean,
            'considerVariationStock' => $this->faker->boolean,
            'creationDate' => $this->dateBetween(sprintf('-%d %s', mt_rand(1, 60), $this->faker->randomKey(['days', 'years', 'hours', 'minutes', 'seconds']))),
            'ean' => $this->faker->ean8,
            'epid' => $this->faker->uuid,
            'hazardIdNumber' => $this->faker->sha1,
            'height' => $this->faker->randomFloat(),
            'isActive' => $this->faker->boolean,
            'isBatch' => $this->faker->boolean,
            'isBestBefore' => $this->faker->boolean,
            'isbn' => $this->faker->isbn13,
            'isDivisible' => $this->faker->boolean,
            //'isMasterProduct' => false,
            'isNewProduct' => $this->faker->boolean,
            'isSerialNumber' => $this->faker->boolean,
            'isTopProduct' => $this->faker->boolean,
            'keywords' => $this->faker->words(mt_rand(0, 10), true),
            'length' => $this->faker->randomFloat(),
            'manufacturerNumber' => $this->faker->word(),
            //'manufacturer' => null,
            'minBestBeforeDate' => $this->dateBetween(sprintf('+%d %s', mt_rand(0, 60), $this->faker->randomKey(['days', 'years', 'hours', 'minutes', 'seconds']))),
            'minimumOrderQuantity' => $this->faker->randomFloat(2),
            'minimumQuantity' => $this->faker->randomFloat(2),
            'modified' => $this->faker->iso8601,
            'newReleaseDate' => $this->faker->iso8601,
            'nextAvailableInflowDate' => $this->faker->iso8601,
            'nextAvailableInflowQuantity' => $this->faker->randomFloat(3),
            'note' => $this->faker->sentence,
            'originCountry' => $this->faker->languageCode,
            'packagingQuantity' => $this->faker->randomFloat(2),
            'permitNegativeStock' => $this->faker->boolean,
            'productWeight' => $this->faker->randomFloat(4),
            'purchasePrice' => $this->faker->randomFloat(4),
            'recommendedRetailPrice' => $this->faker->randomFloat(),
            'serialNumber' => $this->faker->uuid,
            'shippingWeight' => $this->faker->randomFloat(3),
            'sku' => $this->faker->uuid,
            //'sort' => 0,
            'stockLevel' => null,
            'supplierDeliveryTime' => $this->faker->numberBetween(0, 366),
            'supplierStockLevel' => $this->faker->randomFloat(),
            'taric' => $this->faker->word,
            'unNumber' => $this->faker->word,
            'upc' => $this->faker->uuid,
            'vat' => $this->faker->randomFloat(2),
            'width' => $this->faker->randomFloat(2),
            'attributes' => [],
            'categories' => $this->getFactory('Product2Category')->makeArray(mt_rand(1, 3)),
            'checksums' => [],
            //'configGroups' => [],
            //'customerGroupPackagingQuantities' => [],
            //'fileDownloads' => [],
            'i18ns' => [$this->getFactory('ProductI18n')->makeOneArray()],
            'invisibilities' => [],
            'mediaFiles' => [],
            'partsLists' => [],
            'prices' => [
                $this->getFactory('ProductPrice')
                    ->setWithBulkPrices(mt_rand(0, 1) === 1)
                    ->makeOneArray(['customerGroupId' => $identityFactory->makeOneArray([1 => 0])])
            ],
            'specialPrices' => [],
            'specifics' => [],
            'variations' => [],
            //'warehouseInfo' => [],
        ];
    }

    public function makeOneProductVariantArray(array $i18ns = null)
    {
        $variationsQuantity = 2;
        if (is_null($i18ns)) {
            $i18ns = $this->getFactory('I18n')->makeArray(mt_rand(1, 3));
        }

        $productI18ns = $this->getFactory('ProductI18n')->makeArray(count($i18ns), $i18ns);

        $variantsQuantity = 1;
        $variations = [];
        for ($i = 0; $i < $variationsQuantity; $i++) {
            $variationI18ns = array_map(function (array $i18n) {
                return $this->getFactory('ProductVariationI18n')->makeOneArray($i18n);
            }, $i18ns);

            $values = [];
            $valuesQuantity = mt_rand(1, 10);
            $variantsQuantity *= $valuesQuantity;
            for ($j = 0; $j < $valuesQuantity; $j++) {
                $valueI18ns = [];
                foreach ($i18ns as $i18n) {
                    $valueI18ns[] = $this->getFactory('ProductVariationValueI18n')->makeOneArray($i18n);
                }

                $values[] = $this->getFactory('ProductVariationValue')->makeOneArray([
                    'i18ns' => $valueI18ns,
                    'sort' => $j
                ]);
            }

            $variations[] = $this->getFactory('ProductVariation')->makeOneArray([
                'i18ns' => $variationI18ns,
                'values' => $values,
                'sort' => $i
            ]);
        }

        $parentId = $this->getFactory('Identity')->makeOneArray();
        $variants = [$this->makeOneArray(['id' => $parentId, 'isMasterProduct' => true, 'variations' => $variations, 'sort' => 0, 'i18ns' => $productI18ns])];

        $i = 0;
        foreach ($variations[0]['values'] as $firstValue) {
            foreach ($variations[1]['values'] as $secondValue) {
                $variants[] = $this->makeOneArray([
                    'masterProductId' => $parentId,
                    'isMasterProduct' => false,
                    'variations' => [array_merge($variations[0], ['values' => [$firstValue]]), array_merge($variations[1], ['values' => [$secondValue]])],
                    'sort' => ++$i,
                    'prices' => $variants[0]['prices'],
                    'i18ns' => $productI18ns
                ]);
            }
        }

        return $variants;
    }

    /**
     * @param array|null $i18ns
     * @return array
     * @throws \Exception
     */
    public function makeOneProductVariant(array $i18ns = null)
    {
        $data = $this->makeOneProductVariantArray($i18ns);
        return $this->make(count($data), $data);
    }

    /**
     * @return string
     */
    protected function getModelClass(): string
    {
        return Product::class;
    }
}
