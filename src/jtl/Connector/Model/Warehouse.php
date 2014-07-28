<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #!!todo: get_main_controller!!#
 */

namespace jtl\Connector\Model;

/**
 * warehouse model (set in JTL-Wawi ERP)..
 *
 * @access public
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
 */
class Warehouse extends DataModel
{
    /**
     * @type Identity Unique warehouse id
     */
    public $_id = null;

    /**
     * @type string 
     */
    public $_cAnsprechpartnerAbteilung = '';

    /**
     * @type string 
     */
    public $_cAnsprechpartnerAnrede = '';

    /**
     * @type string 
     */
    public $_cAnsprechpartnerEMail = '';

    /**
     * @type string 
     */
    public $_cAnsprechpartnerFax = '';

    /**
     * @type string 
     */
    public $_cAnsprechpartnerName = '';

    /**
     * @type string 
     */
    public $_cAnsprechpartnerTel = '';

    /**
     * @type string 
     */
    public $_cAnsprechpartnerVorname = '';

    /**
     * @type string 
     */
    public $_cBeschreibung = '';

    /**
     * @type string 
     */
    public $_cBundesland = '';

    /**
     * @type string 
     */
    public $_cDimension1Name = '';

    /**
     * @type string 
     */
    public $_cDimension1Trennzeichen = '';

    /**
     * @type string 
     */
    public $_cDimension2Name = '';

    /**
     * @type string 
     */
    public $_cDimension2Trennzeichen = '';

    /**
     * @type string 
     */
    public $_cDimension3Name = '';

    /**
     * @type string 
     */
    public $_cDimension3Trennzeichen = '';

    /**
     * @type string 
     */
    public $_cDimension4Name = '';

    /**
     * @type string 
     */
    public $_cDimension4Trennzeichen = '';

    /**
     * @type string 
     */
    public $_cDimension5Name = '';

    /**
     * @type string 
     */
    public $_cDimension5Trennzeichen = '';

    /**
     * @type string 
     */
    public $_cEmpfaengerFirma = '';

    /**
     * @type string 
     */
    public $_cKuerzel = '';

    /**
     * @type string 
     */
    public $_cLagerTyp = '';

    /**
     * @type string 
     */
    public $_cLand = '';

    /**
     * @type string 
     */
    public $_cOrt = '';

    /**
     * @type string 
     */
    public $_cPLZ = '';

    /**
     * @type string 
     */
    public $_cStrasse = '';

    /**
     * @type integer|null 
     */
    public $_kFirma = 0;

    /**
     * @type integer|null 
     */
    public $_kQuellLager = 0;

    /**
     * @type integer|null 
     */
    public $_kUser = 0;

    /**
     * @type integer|null 
     */
    public $_kZielLager = 0;

    /**
     * @type string 
     */
    public $_name = '';

    /**
     * @type integer|null 
     */
    public $_nAuslieferungsPrio = 0;

    /**
     * @type integer|null 
     */
    public $_nDimension1Laenge = 0;

    /**
     * @type integer|null 
     */
    public $_nDimension1Typ = 0;

    /**
     * @type integer|null 
     */
    public $_nDimension2Laenge = 0;

    /**
     * @type integer|null 
     */
    public $_nDimension2Typ = 0;

    /**
     * @type integer|null 
     */
    public $_nDimension3Laenge = 0;

    /**
     * @type integer|null 
     */
    public $_nDimension3Typ = 0;

    /**
     * @type integer|null 
     */
    public $_nDimension4Laenge = 0;

    /**
     * @type integer|null 
     */
    public $_nDimension4Typ = 0;

    /**
     * @type integer|null 
     */
    public $_nDimension5Laenge = 0;

    /**
     * @type integer|null 
     */
    public $_nDimension5Typ = 0;

    /**
     * @type integer 
     */
    public $_nFulfillment = 0;

    /**
     * @type integer 
     */
    public $_nLagerplatzVerwaltung = 0;

    /**
     * @type integer|null 
     */
    public $_nPackStationAktiv = 0;


    /**
     * @type array list of identities
     */
    public $_identities = array(
        '_id',
    );

    /**
     * @type array list of navigations
     */
    public $_navigations = array(
    );

    /**
     * @return array 
     */
    public function getIdentities()
    {
        return $this->_identities;
    }

    /**
     * @return array 
     */
    public function getNavigations()
    {
        return $this->_navigations;
    }

    /**
     * @todo: Move to BasisModel
     */
    protected function setProperty($name, $value, $type)
    {
        if (!$this->validateType($value, $type)) {
            throw new InvalidArgumentException(sprintf("expected type %s, given value %s.", $type, gettype($value)));
        }
        $this->{$name} = $value;
        return $this;
    }

    /**
     * @todo: Move to BasisModel
     */
    protected function validateType($value, $type)
    {
        switch ($type)
        {
            case 'boolean':
                return is_bool($value);
            case 'integer':
                return is_integer($value);
            case 'float':
                return is_float($value);
            case 'string':
                return is_string($value);
            case 'array':
                return is_array($value);
            default:
                throw new InvalidArgumentException('type validator not found');
        }
    }

    /**
     * @param  string $name 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setName($name)
    {
        return $this->setProperty('_name', $name, 'string');
    }
    
    /**
     * @return string 
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param  string $cKuerzel 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCKuerzel($cKuerzel)
    {
        return $this->setProperty('_cKuerzel', $cKuerzel, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCKuerzel()
    {
        return $this->_cKuerzel;
    }

    /**
     * @param  string $cLagerTyp 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCLagerTyp($cLagerTyp)
    {
        return $this->setProperty('_cLagerTyp', $cLagerTyp, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCLagerTyp()
    {
        return $this->_cLagerTyp;
    }

    /**
     * @param  string $cBeschreibung 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCBeschreibung($cBeschreibung)
    {
        return $this->setProperty('_cBeschreibung', $cBeschreibung, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCBeschreibung()
    {
        return $this->_cBeschreibung;
    }

    /**
     * @param  string $cStrasse 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCStrasse($cStrasse)
    {
        return $this->setProperty('_cStrasse', $cStrasse, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCStrasse()
    {
        return $this->_cStrasse;
    }

    /**
     * @param  string $cPLZ 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCPLZ($cPLZ)
    {
        return $this->setProperty('_cPLZ', $cPLZ, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCPLZ()
    {
        return $this->_cPLZ;
    }

    /**
     * @param  string $cOrt 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCOrt($cOrt)
    {
        return $this->setProperty('_cOrt', $cOrt, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCOrt()
    {
        return $this->_cOrt;
    }

    /**
     * @param  string $cLand 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCLand($cLand)
    {
        return $this->setProperty('_cLand', $cLand, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCLand()
    {
        return $this->_cLand;
    }

    /**
     * @param  string $cAnsprechpartnerAnrede 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCAnsprechpartnerAnrede($cAnsprechpartnerAnrede)
    {
        return $this->setProperty('_cAnsprechpartnerAnrede', $cAnsprechpartnerAnrede, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCAnsprechpartnerAnrede()
    {
        return $this->_cAnsprechpartnerAnrede;
    }

    /**
     * @param  string $cAnsprechpartnerVorname 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCAnsprechpartnerVorname($cAnsprechpartnerVorname)
    {
        return $this->setProperty('_cAnsprechpartnerVorname', $cAnsprechpartnerVorname, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCAnsprechpartnerVorname()
    {
        return $this->_cAnsprechpartnerVorname;
    }

    /**
     * @param  string $cAnsprechpartnerName 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCAnsprechpartnerName($cAnsprechpartnerName)
    {
        return $this->setProperty('_cAnsprechpartnerName', $cAnsprechpartnerName, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCAnsprechpartnerName()
    {
        return $this->_cAnsprechpartnerName;
    }

    /**
     * @param  string $cAnsprechpartnerTel 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCAnsprechpartnerTel($cAnsprechpartnerTel)
    {
        return $this->setProperty('_cAnsprechpartnerTel', $cAnsprechpartnerTel, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCAnsprechpartnerTel()
    {
        return $this->_cAnsprechpartnerTel;
    }

    /**
     * @param  string $cAnsprechpartnerFax 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCAnsprechpartnerFax($cAnsprechpartnerFax)
    {
        return $this->setProperty('_cAnsprechpartnerFax', $cAnsprechpartnerFax, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCAnsprechpartnerFax()
    {
        return $this->_cAnsprechpartnerFax;
    }

    /**
     * @param  string $cAnsprechpartnerEMail 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCAnsprechpartnerEMail($cAnsprechpartnerEMail)
    {
        return $this->setProperty('_cAnsprechpartnerEMail', $cAnsprechpartnerEMail, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCAnsprechpartnerEMail()
    {
        return $this->_cAnsprechpartnerEMail;
    }

    /**
     * @param  string $cAnsprechpartnerAbteilung 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCAnsprechpartnerAbteilung($cAnsprechpartnerAbteilung)
    {
        return $this->setProperty('_cAnsprechpartnerAbteilung', $cAnsprechpartnerAbteilung, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCAnsprechpartnerAbteilung()
    {
        return $this->_cAnsprechpartnerAbteilung;
    }

    /**
     * @param  string $cBundesland 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCBundesland($cBundesland)
    {
        return $this->setProperty('_cBundesland', $cBundesland, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCBundesland()
    {
        return $this->_cBundesland;
    }

    /**
     * @param  integer $kFirma 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setKFirma($kFirma)
    {
        return $this->setProperty('_kFirma', $kFirma, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getKFirma()
    {
        return $this->_kFirma;
    }

    /**
     * @param  integer $kUser 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setKUser($kUser)
    {
        return $this->setProperty('_kUser', $kUser, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getKUser()
    {
        return $this->_kUser;
    }

    /**
     * @param  integer $nFulfillment 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setNFulfillment($nFulfillment)
    {
        return $this->setProperty('_nFulfillment', $nFulfillment, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getNFulfillment()
    {
        return $this->_nFulfillment;
    }

    /**
     * @param  integer $nLagerplatzVerwaltung 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setNLagerplatzVerwaltung($nLagerplatzVerwaltung)
    {
        return $this->setProperty('_nLagerplatzVerwaltung', $nLagerplatzVerwaltung, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getNLagerplatzVerwaltung()
    {
        return $this->_nLagerplatzVerwaltung;
    }

    /**
     * @param  integer $nAuslieferungsPrio 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setNAuslieferungsPrio($nAuslieferungsPrio)
    {
        return $this->setProperty('_nAuslieferungsPrio', $nAuslieferungsPrio, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getNAuslieferungsPrio()
    {
        return $this->_nAuslieferungsPrio;
    }

    /**
     * @param  integer $nPackStationAktiv 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setNPackStationAktiv($nPackStationAktiv)
    {
        return $this->setProperty('_nPackStationAktiv', $nPackStationAktiv, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getNPackStationAktiv()
    {
        return $this->_nPackStationAktiv;
    }

    /**
     * @param  string $cDimension1Name 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCDimension1Name($cDimension1Name)
    {
        return $this->setProperty('_cDimension1Name', $cDimension1Name, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCDimension1Name()
    {
        return $this->_cDimension1Name;
    }

    /**
     * @param  string $cDimension1Trennzeichen 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCDimension1Trennzeichen($cDimension1Trennzeichen)
    {
        return $this->setProperty('_cDimension1Trennzeichen', $cDimension1Trennzeichen, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCDimension1Trennzeichen()
    {
        return $this->_cDimension1Trennzeichen;
    }

    /**
     * @param  integer $nDimension1Laenge 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setNDimension1Laenge($nDimension1Laenge)
    {
        return $this->setProperty('_nDimension1Laenge', $nDimension1Laenge, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getNDimension1Laenge()
    {
        return $this->_nDimension1Laenge;
    }

    /**
     * @param  integer $nDimension1Typ 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setNDimension1Typ($nDimension1Typ)
    {
        return $this->setProperty('_nDimension1Typ', $nDimension1Typ, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getNDimension1Typ()
    {
        return $this->_nDimension1Typ;
    }

    /**
     * @param  string $cDimension2Name 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCDimension2Name($cDimension2Name)
    {
        return $this->setProperty('_cDimension2Name', $cDimension2Name, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCDimension2Name()
    {
        return $this->_cDimension2Name;
    }

    /**
     * @param  string $cDimension2Trennzeichen 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCDimension2Trennzeichen($cDimension2Trennzeichen)
    {
        return $this->setProperty('_cDimension2Trennzeichen', $cDimension2Trennzeichen, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCDimension2Trennzeichen()
    {
        return $this->_cDimension2Trennzeichen;
    }

    /**
     * @param  integer $nDimension2Laenge 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setNDimension2Laenge($nDimension2Laenge)
    {
        return $this->setProperty('_nDimension2Laenge', $nDimension2Laenge, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getNDimension2Laenge()
    {
        return $this->_nDimension2Laenge;
    }

    /**
     * @param  integer $nDimension2Typ 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setNDimension2Typ($nDimension2Typ)
    {
        return $this->setProperty('_nDimension2Typ', $nDimension2Typ, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getNDimension2Typ()
    {
        return $this->_nDimension2Typ;
    }

    /**
     * @param  string $cDimension3Name 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCDimension3Name($cDimension3Name)
    {
        return $this->setProperty('_cDimension3Name', $cDimension3Name, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCDimension3Name()
    {
        return $this->_cDimension3Name;
    }

    /**
     * @param  string $cDimension3Trennzeichen 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCDimension3Trennzeichen($cDimension3Trennzeichen)
    {
        return $this->setProperty('_cDimension3Trennzeichen', $cDimension3Trennzeichen, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCDimension3Trennzeichen()
    {
        return $this->_cDimension3Trennzeichen;
    }

    /**
     * @param  integer $nDimension3Laenge 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setNDimension3Laenge($nDimension3Laenge)
    {
        return $this->setProperty('_nDimension3Laenge', $nDimension3Laenge, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getNDimension3Laenge()
    {
        return $this->_nDimension3Laenge;
    }

    /**
     * @param  integer $nDimension3Typ 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setNDimension3Typ($nDimension3Typ)
    {
        return $this->setProperty('_nDimension3Typ', $nDimension3Typ, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getNDimension3Typ()
    {
        return $this->_nDimension3Typ;
    }

    /**
     * @param  string $cDimension4Name 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCDimension4Name($cDimension4Name)
    {
        return $this->setProperty('_cDimension4Name', $cDimension4Name, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCDimension4Name()
    {
        return $this->_cDimension4Name;
    }

    /**
     * @param  string $cDimension4Trennzeichen 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCDimension4Trennzeichen($cDimension4Trennzeichen)
    {
        return $this->setProperty('_cDimension4Trennzeichen', $cDimension4Trennzeichen, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCDimension4Trennzeichen()
    {
        return $this->_cDimension4Trennzeichen;
    }

    /**
     * @param  integer $nDimension4Laenge 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setNDimension4Laenge($nDimension4Laenge)
    {
        return $this->setProperty('_nDimension4Laenge', $nDimension4Laenge, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getNDimension4Laenge()
    {
        return $this->_nDimension4Laenge;
    }

    /**
     * @param  integer $nDimension4Typ 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setNDimension4Typ($nDimension4Typ)
    {
        return $this->setProperty('_nDimension4Typ', $nDimension4Typ, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getNDimension4Typ()
    {
        return $this->_nDimension4Typ;
    }

    /**
     * @param  string $cDimension5Name 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCDimension5Name($cDimension5Name)
    {
        return $this->setProperty('_cDimension5Name', $cDimension5Name, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCDimension5Name()
    {
        return $this->_cDimension5Name;
    }

    /**
     * @param  string $cDimension5Trennzeichen 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCDimension5Trennzeichen($cDimension5Trennzeichen)
    {
        return $this->setProperty('_cDimension5Trennzeichen', $cDimension5Trennzeichen, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCDimension5Trennzeichen()
    {
        return $this->_cDimension5Trennzeichen;
    }

    /**
     * @param  integer $nDimension5Laenge 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setNDimension5Laenge($nDimension5Laenge)
    {
        return $this->setProperty('_nDimension5Laenge', $nDimension5Laenge, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getNDimension5Laenge()
    {
        return $this->_nDimension5Laenge;
    }

    /**
     * @param  integer $nDimension5Typ 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setNDimension5Typ($nDimension5Typ)
    {
        return $this->setProperty('_nDimension5Typ', $nDimension5Typ, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getNDimension5Typ()
    {
        return $this->_nDimension5Typ;
    }

    /**
     * @param  string $cEmpfaengerFirma 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCEmpfaengerFirma($cEmpfaengerFirma)
    {
        return $this->setProperty('_cEmpfaengerFirma', $cEmpfaengerFirma, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCEmpfaengerFirma()
    {
        return $this->_cEmpfaengerFirma;
    }

    /**
     * @param  integer $kQuellLager 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setKQuellLager($kQuellLager)
    {
        return $this->setProperty('_kQuellLager', $kQuellLager, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getKQuellLager()
    {
        return $this->_kQuellLager;
    }

    /**
     * @param  integer $kZielLager 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setKZielLager($kZielLager)
    {
        return $this->setProperty('_kZielLager', $kZielLager, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getKZielLager()
    {
        return $this->_kZielLager;
    }

    /**
     * @param  Identity $id Unique warehouse id
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('_id', $id, 'Identity');
    }
    
    /**
     * @return Identity Unique warehouse id
     */
    public function getId()
    {
        return $this->_id;
    }
}

