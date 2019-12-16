<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Payment
 */
namespace Jtl\Connector\Core\Definition;

final class PaymentType
{
    const ADYEN = 'pm_adyen';
    const ALIPAY = 'pm_alipay';
    const AMAPAY = 'pm_amazon_payments';
    const ASIAPAY = 'pm_asiapay';
    const ATOS = 'pm_atos';
    const AUTHORIZE = 'pm_authorize';
    const BALANCED = 'pm_balanced';
    const BANK_TRANSFER = 'pm_bank_transfer';
    const CASH = 'pm_cash';
    const CASH_ON_DELIVERY = 'pm_cash_on_delivery';
    const BILLPAY = 'pm_billpay';
    const BILLSAFE = 'pm_billsafe';
    const BPAY = 'pm_bpay';
    const BRAINTREE = 'pm_braintree';
    const CHARGIFY = 'pm_chargify';
    const CITI_BANK = 'pm_citi_bank';
    const CLICKANDBUY = 'pm_clickandbuy';
    const COMMERZ_FINANZ = 'pm_commerzfinanz';
    const CREDITCALL = 'pm_creditcall';
    const CYBERSOURCE = 'pm_cybersource';
    const DATACASH = 'pm_datacash';
    const DIGICASH = 'pm_digicash';
    const DIRECT_DEBIT = 'pm_direct_debit';
    const DWOLLA = 'pm_dwolla';
    const EDY = 'pm_edy';
    const ELAVON = 'pm_elavon';
    const EOS_CREDIT_CARD = 'pm_eos_creditcard';
    const EOS_DIRECT_BANKING = 'pm_eos_direct';
    const EOS_DIRECT_DEBIT = 'pm_eos_direct_debit';
    const EOS_EWALLET = 'pm_eos_ewallet';
    const EURONET_WORLDWIDE = 'pm_euronet_worldwide';
    const EWAY = 'pm_eway';
    const FLOOZ = 'pm_flooz';
    const GLOBALCOLLECT = 'pm_globalcollect';
    const GOOGLE = 'pm_google';
    const HEIDELPAY = 'pm_heidelpay';
    const HSBC = 'pm_hsbc';
    const IKOBO = 'pm_ikobo';
    const ILOXX = 'pm_iloxx';
    const INVOICE = 'pm_invoice';
    const IPAYMENT = 'pm_ipayment';
    const IP_PAYMENTS = 'pm_ip_payments';
    const KLARNA = 'pm_klarna';
    const MOBILPENGE = 'pm_mobilpenge';
    const MODUSLINK = 'pm_moduslink';
    const MPP_GLOBAL_SOLUTIONS = 'pm_mpp_global_solutions';
    const NETELLER = 'pm_neteller';
    const NOCHEX = 'pm_nochex';
    const NO_PAYMENT_REQUIRED = 'pm_free';
    const OGONE = 'pm_ogone';
    const PAYBOX = 'pm_paybox';
    const PAYEX = 'pm_payex';
    const PAYMATE = 'pm_paymate';
    const PAYMILL = 'pm_paymill';
    const PAYMORROW = 'pm_paymorrow';
    const PAYONEER = 'pm_payoneer';
    const PAYPAL = 'pm_paypal_standard';
    const PAYPAL_EXPRESS = 'pm_paypal_express';
    const PAYPAL_PLUS = 'pm_paypal_plus';
    const PAYPOINT = 'pm_paypoint';
    const PAYSAFECARD = 'pm_paysafecard';
    const PAYXPERT = 'pm_payxpert';
    const PAYZA = 'pm_payza';
    const PEPPERCOIN = 'pm_peppercoin';
    const PLAYSPAN = 'pm_playspan';
    const POPMONEY = 'pm_popmoney';
    const POSTFINANCE = 'pm_postfinance';
    const PREPAYMENT = 'pm_prepayment';
    const PROBILLER = 'pm_probiller';
    const RECURLY = 'pm_recurly';
    const SAFERPAY = 'pm_saferpay';
    const SAFETYPAY = 'pm_safetypay';
    const SAGE_GROUP = 'pm_sage_group';
    const SKRILL = 'pm_skrill';
    const SOFORT = 'pm_sofort';
    const SQUARE_INC = 'pm_square';
    const STRIPE = 'pm_stripe';
    const TFI_MARKETS = 'pm_tfi_markets';
    const TIMWE = 'pm_timwe';
    const VERIFONE = 'pm_verifone';
    const VINDICIA = 'pm_vindicia';
    const WEBMONEY = 'pm_webmoney';
    const WEPAY = 'pm_wepay';
    const WIRECARD = 'pm_wirecard';
    const WORLDPAY = 'pm_worldpay';

    /**
     * @var null|string[]
     */
    protected static $types = null;

    /**
     * @return integer[]
     * @throws \ReflectionException
     */
    public static function getTypes(): array
    {
        if (is_null(self::$types)) {
            self::$types = (new \ReflectionClass(self::class))->getConstants();
        }

        return self::$types;
    }

    /**
     * @param integer $type
     * @return boolean
     * @throws \ReflectionException
     */
    public static function isType(int $type): bool
    {
        return in_array($type, self::getTypes(), true);
    }
}
