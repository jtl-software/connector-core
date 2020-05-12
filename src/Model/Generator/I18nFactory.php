<?php

namespace Jtl\Connector\Core\Model\Generator;

use Jtl\Connector\Core\Exception\NotImplementedException;

class I18nFactory extends AbstractModelFactory
{
    protected $usedLanguages = [];

    /**
     * @return mixed[]
     */
    protected function makeFakeArray(): array
    {
        $data = [];
        while (true) {
            $languageCode = $this->faker->languageCode;
            if (!in_array($languageCode, $this->usedLanguages, true)) {
                $data['languageIso'] = $languageCode;
                $this->usedLanguages[] = $languageCode;
                break;
            }
        }

        return $data;
    }

    /**
     * @return string
     * @throws NotImplementedException
     */
    protected function getModelClass(): string
    {
        throw new NotImplementedException('This factory can be used for making array only');
    }

    /**
     * @return void
     */
    public function clearUsedLanguages(): void
    {
        $this->usedLanguages = [];
    }
}
