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
class Product extends DataModel
{
    protected function loadProperties()
    {
        return array(
			new PropertyInfo('id', '\jtl\Connector\Model\IdentityKeyPair', null, true, true, false),
			new PropertyInfo('cAnsprechpartnerAbteilung', 'string', '', false, false, false),
			new PropertyInfo('cAnsprechpartnerAnrede', 'string', '', false, false, false),
			new PropertyInfo('cAnsprechpartnerEMail', 'string', '', false, false, false),
			new PropertyInfo('cAnsprechpartnerFax', 'string', '', false, false, false),
			new PropertyInfo('cAnsprechpartnerName', 'string', '', false, false, false),
			new PropertyInfo('cAnsprechpartnerTel', 'string', '', false, false, false),
			new PropertyInfo('cAnsprechpartnerVorname', 'string', '', false, false, false),
			new PropertyInfo('cBeschreibung', 'string', '', false, false, false),
			new PropertyInfo('cBundesland', 'string', '', false, false, false),
			new PropertyInfo('cDimension1Name', 'string', '', false, false, false),
			new PropertyInfo('cDimension1Trennzeichen', 'string', '', false, false, false),
			new PropertyInfo('cDimension2Name', 'string', '', false, false, false),
			new PropertyInfo('cDimension2Trennzeichen', 'string', '', false, false, false),
			new PropertyInfo('cDimension3Name', 'string', '', false, false, false),
			new PropertyInfo('cDimension3Trennzeichen', 'string', '', false, false, false),
			new PropertyInfo('cDimension4Name', 'string', '', false, false, false),
			new PropertyInfo('cDimension4Trennzeichen', 'string', '', false, false, false),
			new PropertyInfo('cDimension5Name', 'string', '', false, false, false),
			new PropertyInfo('cDimension5Trennzeichen', 'string', '', false, false, false),
			new PropertyInfo('cEmpfaengerFirma', 'string', '', false, false, false),
			new PropertyInfo('cKuerzel', 'string', '', false, false, false),
			new PropertyInfo('cLagerTyp', 'string', '', false, false, false),
			new PropertyInfo('cLand', 'string', '', false, false, false),
			new PropertyInfo('cOrt', 'string', '', false, false, false),
			new PropertyInfo('cPLZ', 'string', '', false, false, false),
			new PropertyInfo('cStrasse', 'string', '', false, false, false),
			new PropertyInfo('kFirma', 'integer', 0, false, false, false),
			new PropertyInfo('kQuellLager', 'integer', 0, false, false, false),
			new PropertyInfo('kUser', 'integer', 0, false, false, false),
			new PropertyInfo('kZielLager', 'integer', 0, false, false, false),
			new PropertyInfo('name', 'string', '', false, false, false),
			new PropertyInfo('nAuslieferungsPrio', 'integer', 0, false, false, false),
			new PropertyInfo('nDimension1Laenge', 'integer', 0, false, false, false),
			new PropertyInfo('nDimension1Typ', 'integer', 0, false, false, false),
			new PropertyInfo('nDimension2Laenge', 'integer', 0, false, false, false),
			new PropertyInfo('nDimension2Typ', 'integer', 0, false, false, false),
			new PropertyInfo('nDimension3Laenge', 'integer', 0, false, false, false),
			new PropertyInfo('nDimension3Typ', 'integer', 0, false, false, false),
			new PropertyInfo('nDimension4Laenge', 'integer', 0, false, false, false),
			new PropertyInfo('nDimension4Typ', 'integer', 0, false, false, false),
			new PropertyInfo('nDimension5Laenge', 'integer', 0, false, false, false),
			new PropertyInfo('nDimension5Typ', 'integer', 0, false, false, false),
			new PropertyInfo('nFulfillment', 'integer', 0, false, false, false),
			new PropertyInfo('nLagerplatzVerwaltung', 'integer', 0, false, false, false),
			new PropertyInfo('nPackStationAktiv', 'integer', 0, false, false, false),
        );
    }
}
