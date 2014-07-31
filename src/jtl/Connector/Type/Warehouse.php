<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Type
 */

namespace jtl\Connector\Type;

use jtl\Connector\Type\PropertyInfo;

/**
 * @access public
 * @package jtl\Connector\Type
 */
class Warehouse extends DataModel
{
    protected function loadProperties()
    {
        return array(
			'CDE6B7C7' => new PropertyInfo('id', '\jtl\Connector\Model\Identity', null, true, true, true),
			'B4A7C210' => new PropertyInfo('cAnsprechpartnerAbteilung', 'string', '', false, false, false),
			'9E1403BC' => new PropertyInfo('cAnsprechpartnerAnrede', 'string', '', false, false, false),
			'E277ABD1' => new PropertyInfo('cAnsprechpartnerEMail', 'string', '', false, false, false),
			'C49126C0' => new PropertyInfo('cAnsprechpartnerFax', 'string', '', false, false, false),
			'045CB76F' => new PropertyInfo('cAnsprechpartnerName', 'string', '', false, false, false),
			'79AA42EA' => new PropertyInfo('cAnsprechpartnerTel', 'string', '', false, false, false),
			'CAEED899' => new PropertyInfo('cAnsprechpartnerVorname', 'string', '', false, false, false),
			'044D8110' => new PropertyInfo('cBeschreibung', 'string', '', false, false, false),
			'387E9089' => new PropertyInfo('cBundesland', 'string', '', false, false, false),
			'2650FC91' => new PropertyInfo('cDimension1Name', 'string', '', false, false, false),
			'4B469513' => new PropertyInfo('cDimension1Trennzeichen', 'string', '', false, false, false),
			'1DE7048C' => new PropertyInfo('cDimension2Name', 'string', '', false, false, false),
			'9D6514CE' => new PropertyInfo('cDimension2Trennzeichen', 'string', '', false, false, false),
			'8ADF3A1B' => new PropertyInfo('cDimension3Name', 'string', '', false, false, false),
			'07DB01AD' => new PropertyInfo('cDimension3Trennzeichen', 'string', '', false, false, false),
			'95485B2E' => new PropertyInfo('cDimension4Name', 'string', '', false, false, false),
			'5DD190C0' => new PropertyInfo('cDimension4Trennzeichen', 'string', '', false, false, false),
			'177C3595' => new PropertyInfo('cDimension5Name', 'string', '', false, false, false),
			'7F63A4FF' => new PropertyInfo('cDimension5Trennzeichen', 'string', '', false, false, false),
			'55B53259' => new PropertyInfo('cEmpfaengerFirma', 'string', '', false, false, false),
			'0AD1F849' => new PropertyInfo('cKuerzel', 'string', '', false, false, false),
			'367F6805' => new PropertyInfo('cLagerTyp', 'string', '', false, false, false),
			'1BB9A77C' => new PropertyInfo('cLand', 'string', '', false, false, false),
			'486219CD' => new PropertyInfo('cOrt', 'string', '', false, false, false),
			'2C9F147B' => new PropertyInfo('cPLZ', 'string', '', false, false, false),
			'12029FDD' => new PropertyInfo('cStrasse', 'string', '', false, false, false),
			'8E510375' => new PropertyInfo('kFirma', 'integer', 0, false, false, false),
			'01406DEA' => new PropertyInfo('kQuellLager', 'integer', 0, false, false, false),
			'67B547D4' => new PropertyInfo('kUser', 'integer', 0, false, false, false),
			'1BCFD0F2' => new PropertyInfo('kZielLager', 'integer', 0, false, false, false),
			'03BD1C7B' => new PropertyInfo('name', 'string', '', false, false, false),
			'61B673EA' => new PropertyInfo('nAuslieferungsPrio', 'integer', 0, false, false, false),
			'B24EE443' => new PropertyInfo('nDimension1Laenge', 'integer', 0, false, false, false),
			'53A07450' => new PropertyInfo('nDimension1Typ', 'integer', 0, false, false, false),
			'64960308' => new PropertyInfo('nDimension2Laenge', 'integer', 0, false, false, false),
			'B0F8FFB5' => new PropertyInfo('nDimension2Typ', 'integer', 0, false, false, false),
			'A17AF439' => new PropertyInfo('nDimension3Laenge', 'integer', 0, false, false, false),
			'0E518B1A' => new PropertyInfo('nDimension3Typ', 'integer', 0, false, false, false),
			'910C75C6' => new PropertyInfo('nDimension4Laenge', 'integer', 0, false, false, false),
			'80E5BB57' => new PropertyInfo('nDimension4Typ', 'integer', 0, false, false, false),
			'CDF166F7' => new PropertyInfo('nDimension5Laenge', 'integer', 0, false, false, false),
			'DE3E46BC' => new PropertyInfo('nDimension5Typ', 'integer', 0, false, false, false),
			'D025C545' => new PropertyInfo('nFulfillment', 'integer', 0, false, false, false),
			'5374A4CD' => new PropertyInfo('nLagerplatzVerwaltung', 'integer', 0, false, false, false),
			'D1B03B15' => new PropertyInfo('nPackStationAktiv', 'integer', 0, false, false, false),
        );
    }
}


