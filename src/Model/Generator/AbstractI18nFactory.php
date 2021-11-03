<?php

namespace Jtl\Connector\Core\Model\Generator;

abstract class AbstractI18nFactory extends AbstractModelFactory
{
    /**
     * @var array<string>
     */
    protected $usedLanguages = [];

    /**
     * @param array $override
     * @return array
     */
    public function makeOneArray(array $override = []): array
    {
        $languageIsoAppendix = [];
        if (!isset($override['languageIso'])) {
            while (true) {
                if(count($this->usedLanguages) > 180) {
                    $this->clearUsedLanguages();
                }

                $languageIso = $this->faker->languageCode;
                if (!in_array($languageIso, $this->usedLanguages, true)) {
                    $languageIsoAppendix['languageIso'] = $languageIso;
                    $this->usedLanguages[] = $languageIso;
                    break;
                }
            }
        }

        return parent::makeOneArray($override) + $languageIsoAppendix;
    }

    /**
     * @param int $quantity
     * @param array $specificOverrides
     * @param array $globalOverrides
     * @return array
     */
    public function makeArray(int $quantity, array $specificOverrides = [], array $globalOverrides = []): array
    {
        $usedLanguagesCount = count($this->usedLanguages);
        if($quantity >= $usedLanguagesCount || $usedLanguagesCount - $quantity > 180) {
            $this->clearUsedLanguages();
        }

        return parent::makeArray($quantity, $specificOverrides, $globalOverrides);
    }

    /**
     * @return void
     */
    public function clearUsedLanguages(): void
    {
        $this->usedLanguages = [];
    }
}
