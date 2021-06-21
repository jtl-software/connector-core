<?php


namespace Jtl\Connector\Core\Model\Generator;

use Jtl\Connector\Core\Model\TaxRate;

class TaxRateFactory extends AbstractModelFactory
{
    /**
     * @var array
     */
    protected $usedCountries = [];

    public function clearUsedCountries(): void
    {
        $this->usedCountries = [];
    }

    /**
     * @return string[]
     */
    protected function makeFakeArray(): array
    {
        return [
            'countryIso' => $this->getUnusedCountryIso(),
            'rate' => $this->faker->randomFloat(2, 0, 30)
        ];
    }

    /**
     * @return string
     */
    protected function getModelClass(): string
    {
        return TaxRate::class;
    }

    /**
     * @return string
     */
    protected function getUnusedCountryIso(): string
    {
        if(count($this->usedCountries) >= 247) {
            $this->clearUsedCountries();
        }

        while(true) {
            $countryIso = $this->faker->countryCode;
            if(!in_array($countryIso, $this->usedCountries, true)) {
                $this->usedCountries[] = $countryIso;
                return $countryIso;
            }
        }
    }
}