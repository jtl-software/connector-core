<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 * @subpackage #todo: get_main_controller#
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
    protected $_id = null;

    /**
     * @type string 
     */
    protected $_cAnsprechpartnerAbteilung = '';

    /**
     * @type string 
     */
    protected $_cAnsprechpartnerAnrede = '';

    /**
     * @type string 
     */
    protected $_cAnsprechpartnerEMail = '';

    /**
     * @type string 
     */
    protected $_cAnsprechpartnerFax = '';

    /**
     * @type string 
     */
    protected $_cAnsprechpartnerName = '';

    /**
     * @type string 
     */
    protected $_cAnsprechpartnerTel = '';

    /**
     * @type string 
     */
    protected $_cAnsprechpartnerVorname = '';

    /**
     * @type string 
     */
    protected $_cBeschreibung = '';

    /**
     * @type string 
     */
    protected $_cBundesland = '';

    /**
     * @type string 
     */
    protected $_cDimension1Name = '';

    /**
     * @type string 
     */
    protected $_cDimension1Trennzeichen = '';

    /**
     * @type string 
     */
    protected $_cDimension2Name = '';

    /**
     * @type string 
     */
    protected $_cDimension2Trennzeichen = '';

    /**
     * @type string 
     */
    protected $_cDimension3Name = '';

    /**
     * @type string 
     */
    protected $_cDimension3Trennzeichen = '';

    /**
     * @type string 
     */
    protected $_cDimension4Name = '';

    /**
     * @type string 
     */
    protected $_cDimension4Trennzeichen = '';

    /**
     * @type string 
     */
    protected $_cDimension5Name = '';

    /**
     * @type string 
     */
    protected $_cDimension5Trennzeichen = '';

    /**
     * @type string 
     */
    protected $_cEmpfaengerFirma = '';

    /**
     * @type string 
     */
    protected $_cKuerzel = '';

    /**
     * @type string 
     */
    protected $_cLagerTyp = '';

    /**
     * @type string 
     */
    protected $_cLand = '';

    /**
     * @type string 
     */
    protected $_cOrt = '';

    /**
     * @type string 
     */
    protected $_cPLZ = '';

    /**
     * @type string 
     */
    protected $_cStrasse = '';

    /**
     * @type integer|null 
     */
    protected $_kFirma = 0;

    /**
     * @type integer|null 
     */
    protected $_kQuellLager = 0;

    /**
     * @type integer|null 
     */
    protected $_kUser = 0;

    /**
     * @type integer|null 
     */
    protected $_kZielLager = 0;

    /**
     * @type string 
     */
    protected $_name = '';

    /**
     * @type integer|null 
     */
    protected $_nAuslieferungsPrio = 0;

    /**
     * @type integer|null 
     */
    protected $_nDimension1Laenge = 0;

    /**
     * @type integer|null 
     */
    protected $_nDimension1Typ = 0;

    /**
     * @type integer|null 
     */
    protected $_nDimension2Laenge = 0;

    /**
     * @type integer|null 
     */
    protected $_nDimension2Typ = 0;

    /**
     * @type integer|null 
     */
    protected $_nDimension3Laenge = 0;

    /**
     * @type integer|null 
     */
    protected $_nDimension3Typ = 0;

    /**
     * @type integer|null 
     */
    protected $_nDimension4Laenge = 0;

    /**
     * @type integer|null 
     */
    protected $_nDimension4Typ = 0;

    /**
     * @type integer|null 
     */
    protected $_nDimension5Laenge = 0;

    /**
     * @type integer|null 
     */
    protected $_nDimension5Typ = 0;

    /**
     * @type integer 
     */
    protected $_nFulfillment = 0;

    /**
     * @type integer 
     */
    protected $_nLagerplatzVerwaltung = 0;

    /**
     * @type integer|null 
     */
    protected $_nPackStationAktiv = 0;


	/**
	 * @type array
	 */
	protected $_identities = array(
		'_id',
	);

	/**
	 * @param  string $name 
	 * @return \jtl\Connector\Model\Warehouse
	 * @throws InvalidArgumentException if the provided argument is not of type 'string'.
	 */
	public function setName($name)
	{
		if (!is_string($name))
			throw new InvalidArgumentException('string expected.');
		$this->_name = $name;
		return $this;
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
		if (!is_string($cKuerzel))
			throw new InvalidArgumentException('string expected.');
		$this->_cKuerzel = $cKuerzel;
		return $this;
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
		if (!is_string($cLagerTyp))
			throw new InvalidArgumentException('string expected.');
		$this->_cLagerTyp = $cLagerTyp;
		return $this;
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
		if (!is_string($cBeschreibung))
			throw new InvalidArgumentException('string expected.');
		$this->_cBeschreibung = $cBeschreibung;
		return $this;
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
		if (!is_string($cStrasse))
			throw new InvalidArgumentException('string expected.');
		$this->_cStrasse = $cStrasse;
		return $this;
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
		if (!is_string($cPLZ))
			throw new InvalidArgumentException('string expected.');
		$this->_cPLZ = $cPLZ;
		return $this;
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
		if (!is_string($cOrt))
			throw new InvalidArgumentException('string expected.');
		$this->_cOrt = $cOrt;
		return $this;
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
		if (!is_string($cLand))
			throw new InvalidArgumentException('string expected.');
		$this->_cLand = $cLand;
		return $this;
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
		if (!is_string($cAnsprechpartnerAnrede))
			throw new InvalidArgumentException('string expected.');
		$this->_cAnsprechpartnerAnrede = $cAnsprechpartnerAnrede;
		return $this;
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
		if (!is_string($cAnsprechpartnerVorname))
			throw new InvalidArgumentException('string expected.');
		$this->_cAnsprechpartnerVorname = $cAnsprechpartnerVorname;
		return $this;
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
		if (!is_string($cAnsprechpartnerName))
			throw new InvalidArgumentException('string expected.');
		$this->_cAnsprechpartnerName = $cAnsprechpartnerName;
		return $this;
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
		if (!is_string($cAnsprechpartnerTel))
			throw new InvalidArgumentException('string expected.');
		$this->_cAnsprechpartnerTel = $cAnsprechpartnerTel;
		return $this;
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
		if (!is_string($cAnsprechpartnerFax))
			throw new InvalidArgumentException('string expected.');
		$this->_cAnsprechpartnerFax = $cAnsprechpartnerFax;
		return $this;
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
		if (!is_string($cAnsprechpartnerEMail))
			throw new InvalidArgumentException('string expected.');
		$this->_cAnsprechpartnerEMail = $cAnsprechpartnerEMail;
		return $this;
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
		if (!is_string($cAnsprechpartnerAbteilung))
			throw new InvalidArgumentException('string expected.');
		$this->_cAnsprechpartnerAbteilung = $cAnsprechpartnerAbteilung;
		return $this;
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
		if (!is_string($cBundesland))
			throw new InvalidArgumentException('string expected.');
		$this->_cBundesland = $cBundesland;
		return $this;
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
		if (!is_integer($kFirma))
			throw new InvalidArgumentException('integer expected.');
		$this->_kFirma = $kFirma;
		return $this;
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
		if (!is_integer($kUser))
			throw new InvalidArgumentException('integer expected.');
		$this->_kUser = $kUser;
		return $this;
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
		if (!is_integer($nFulfillment))
			throw new InvalidArgumentException('integer expected.');
		$this->_nFulfillment = $nFulfillment;
		return $this;
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
		if (!is_integer($nLagerplatzVerwaltung))
			throw new InvalidArgumentException('integer expected.');
		$this->_nLagerplatzVerwaltung = $nLagerplatzVerwaltung;
		return $this;
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
		if (!is_integer($nAuslieferungsPrio))
			throw new InvalidArgumentException('integer expected.');
		$this->_nAuslieferungsPrio = $nAuslieferungsPrio;
		return $this;
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
		if (!is_integer($nPackStationAktiv))
			throw new InvalidArgumentException('integer expected.');
		$this->_nPackStationAktiv = $nPackStationAktiv;
		return $this;
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
		if (!is_string($cDimension1Name))
			throw new InvalidArgumentException('string expected.');
		$this->_cDimension1Name = $cDimension1Name;
		return $this;
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
		if (!is_string($cDimension1Trennzeichen))
			throw new InvalidArgumentException('string expected.');
		$this->_cDimension1Trennzeichen = $cDimension1Trennzeichen;
		return $this;
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
		if (!is_integer($nDimension1Laenge))
			throw new InvalidArgumentException('integer expected.');
		$this->_nDimension1Laenge = $nDimension1Laenge;
		return $this;
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
		if (!is_integer($nDimension1Typ))
			throw new InvalidArgumentException('integer expected.');
		$this->_nDimension1Typ = $nDimension1Typ;
		return $this;
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
		if (!is_string($cDimension2Name))
			throw new InvalidArgumentException('string expected.');
		$this->_cDimension2Name = $cDimension2Name;
		return $this;
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
		if (!is_string($cDimension2Trennzeichen))
			throw new InvalidArgumentException('string expected.');
		$this->_cDimension2Trennzeichen = $cDimension2Trennzeichen;
		return $this;
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
		if (!is_integer($nDimension2Laenge))
			throw new InvalidArgumentException('integer expected.');
		$this->_nDimension2Laenge = $nDimension2Laenge;
		return $this;
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
		if (!is_integer($nDimension2Typ))
			throw new InvalidArgumentException('integer expected.');
		$this->_nDimension2Typ = $nDimension2Typ;
		return $this;
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
		if (!is_string($cDimension3Name))
			throw new InvalidArgumentException('string expected.');
		$this->_cDimension3Name = $cDimension3Name;
		return $this;
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
		if (!is_string($cDimension3Trennzeichen))
			throw new InvalidArgumentException('string expected.');
		$this->_cDimension3Trennzeichen = $cDimension3Trennzeichen;
		return $this;
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
		if (!is_integer($nDimension3Laenge))
			throw new InvalidArgumentException('integer expected.');
		$this->_nDimension3Laenge = $nDimension3Laenge;
		return $this;
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
		if (!is_integer($nDimension3Typ))
			throw new InvalidArgumentException('integer expected.');
		$this->_nDimension3Typ = $nDimension3Typ;
		return $this;
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
		if (!is_string($cDimension4Name))
			throw new InvalidArgumentException('string expected.');
		$this->_cDimension4Name = $cDimension4Name;
		return $this;
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
		if (!is_string($cDimension4Trennzeichen))
			throw new InvalidArgumentException('string expected.');
		$this->_cDimension4Trennzeichen = $cDimension4Trennzeichen;
		return $this;
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
		if (!is_integer($nDimension4Laenge))
			throw new InvalidArgumentException('integer expected.');
		$this->_nDimension4Laenge = $nDimension4Laenge;
		return $this;
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
		if (!is_integer($nDimension4Typ))
			throw new InvalidArgumentException('integer expected.');
		$this->_nDimension4Typ = $nDimension4Typ;
		return $this;
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
		if (!is_string($cDimension5Name))
			throw new InvalidArgumentException('string expected.');
		$this->_cDimension5Name = $cDimension5Name;
		return $this;
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
		if (!is_string($cDimension5Trennzeichen))
			throw new InvalidArgumentException('string expected.');
		$this->_cDimension5Trennzeichen = $cDimension5Trennzeichen;
		return $this;
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
		if (!is_integer($nDimension5Laenge))
			throw new InvalidArgumentException('integer expected.');
		$this->_nDimension5Laenge = $nDimension5Laenge;
		return $this;
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
		if (!is_integer($nDimension5Typ))
			throw new InvalidArgumentException('integer expected.');
		$this->_nDimension5Typ = $nDimension5Typ;
		return $this;
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
		if (!is_string($cEmpfaengerFirma))
			throw new InvalidArgumentException('string expected.');
		$this->_cEmpfaengerFirma = $cEmpfaengerFirma;
		return $this;
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
		if (!is_integer($kQuellLager))
			throw new InvalidArgumentException('integer expected.');
		$this->_kQuellLager = $kQuellLager;
		return $this;
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
		if (!is_integer($kZielLager))
			throw new InvalidArgumentException('integer expected.');
		$this->_kZielLager = $kZielLager;
		return $this;
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
		
		$this->_id = $id;
		return $this;
	}
	
	/**
	 * @return Identity Unique warehouse id
	 */
	public function getId()
	{
		return $this->_id;
	}
}

