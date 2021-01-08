<?php

namespace Jtl\Connector\Core\Model\Generator;

abstract class AbstractI18nFactory extends AbstractModelFactory
{
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
     * @return void
     */
    public function clearUsedLanguages(): void
    {
        $this->usedLanguages = [];
    }
}
