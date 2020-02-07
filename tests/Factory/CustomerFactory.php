<?php
namespace Jtl\Connector\Core\Tests\Factory;

use Jtl\Connector\Core\Model\Customer;

/**
 * Class CustomerFactory
 * @package Jtl\Connector\Core\Tests\Factory
 */
class CustomerFactory extends ModelFactory
{
    /**
     * @return string
     */
    protected function getModelClass(): string
    {
        return Customer::class;
    }

    /**
     * @param array $override
     * @return array
     * @throws \Exception
     */
    public function makeOneArray(array $override = []): array
    {
        $faker = self::getFaker();

        return array_merge([
            'id' => self::identity(),
            'customerGroupId' => self::identity(),
            'accountCredit' => $faker->numberBetween(),
            'birthday' => self::dateBetween('-40 years', '-30 years'),
            'city' => $faker->city,
            'company' => $faker->company,
            'countryIso' => $faker->countryCode,
            'creationDate' => self::dateBetween('-1 day'),
            'customerNumber' => $faker->numberBetween(1),
            'deliveryInstruction' => '',
            'discount' => '',
            'eMail' => $faker->safeEmail,
            'extraAddressLine' => '',
            'fax' => '',
            'firstName' => $faker->firstName,
            'hasCustomerAccount' => $faker->boolean,
            'hasNewsletterSubscription' => '',
            'isActive' => $faker->boolean,
            'lastName' => $faker->lastName,
            'mobile' => $faker->phoneNumber,
            'note' => $faker->realText(),
            'origin' => '',
            'phone' => $faker->phoneNumber,
            'salutation' => $faker->randomElement(['Herr', 'Frau', '']),
            'state' => '',
            'street' => $faker->streetAddress,
            'title' => $faker->title,
            'vatNumber' => $faker->vat(true),
            'websiteUrl' => $faker->safeEmailDomain,
            'zipCode' => $faker->postcode,
            'languageIso' => $faker->languageCode
        ], $override);
    }
}