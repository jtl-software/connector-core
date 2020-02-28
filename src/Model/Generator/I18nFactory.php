<?php
namespace Jtl\Connector\Core\Model\Generator;

use Jtl\Connector\Core\Exception\NotImplementedException;

class I18nFactory extends AbstractModelFactory
{
    protected $usedLanguages = [];

    public function makeOneArray(array $override = []): array
    {
        if(!isset($override['languageIso'])) {
            while(true) {
                $languageCode = $this->faker->languageCode;
                if(!in_array($languageCode, $this->usedLanguages)) {
                    $override['languageIso'] = $languageCode;
                    $this->usedLanguages[] = $languageCode;
                    break;
                }
            }
        }

        return $override;
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