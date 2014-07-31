<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

/**
 * warehouse model (set in JTL-Wawi ERP)..
 *
 * @access public
 * @package jtl\Connector\Model
 */
class Warehouse extends DataModel
{
    /**
     * @type Identity Unique warehouse id
     */
    protected $id = null;

    /**
     * @type string 
     */
    protected $cAnsprechpartnerAbteilung = '';

    /**
     * @type string 
     */
    protected $cAnsprechpartnerAnrede = '';

    /**
     * @type string 
     */
    protected $cAnsprechpartnerEMail = '';

    /**
     * @type string 
     */
    protected $cAnsprechpartnerFax = '';

    /**
     * @type string 
     */
    protected $cAnsprechpartnerName = '';

    /**
     * @type string 
     */
    protected $cAnsprechpartnerTel = '';

    /**
     * @type string 
     */
    protected $cAnsprechpartnerVorname = '';

    /**
     * @type string 
     */
    protected $cBeschreibung = '';

    /**
     * @type string 
     */
    protected $cBundesland = '';

    /**
     * @type string 
     */
    protected $cDimension1Name = '';

    /**
     * @type string 
     */
    protected $cDimension1Trennzeichen = '';

    /**
     * @type string 
     */
    protected $cDimension2Name = '';

    /**
     * @type string 
     */
    protected $cDimension2Trennzeichen = '';

    /**
     * @type string 
     */
    protected $cDimension3Name = '';

    /**
     * @type string 
     */
    protected $cDimension3Trennzeichen = '';

    /**
     * @type string 
     */
    protected $cDimension4Name = '';

    /**
     * @type string 
     */
    protected $cDimension4Trennzeichen = '';

    /**
     * @type string 
     */
    protected $cDimension5Name = '';

    /**
     * @type string 
     */
    protected $cDimension5Trennzeichen = '';

    /**
     * @type string 
     */
    protected $cEmpfaengerFirma = '';

    /**
     * @type string 
     */
    protected $cKuerzel = '';

    /**
     * @type string 
     */
    protected $cLagerTyp = '';

    /**
     * @type string 
     */
    protected $cLand = '';

    /**
     * @type string 
     */
    protected $cOrt = '';

    /**
     * @type string 
     */
    protected $cPLZ = '';

    /**
     * @type string 
     */
    protected $cStrasse = '';

    /**
     * @type integer|null 
     */
    protected $kFirma = 0;

    /**
     * @type integer|null 
     */
    protected $kQuellLager = 0;

    /**
     * @type integer|null 
     */
    protected $kUser = 0;

    /**
     * @type integer|null 
     */
    protected $kZielLager = 0;

    /**
     * @type string 
     */
    protected $name = '';

    /**
     * @type integer|null 
     */
    protected $nAuslieferungsPrio = 0;

    /**
     * @type integer|null 
     */
    protected $nDimension1Laenge = 0;

    /**
     * @type integer|null 
     */
    protected $nDimension1Typ = 0;

    /**
     * @type integer|null 
     */
    protected $nDimension2Laenge = 0;

    /**
     * @type integer|null 
     */
    protected $nDimension2Typ = 0;

    /**
     * @type integer|null 
     */
    protected $nDimension3Laenge = 0;

    /**
     * @type integer|null 
     */
    protected $nDimension3Typ = 0;

    /**
     * @type integer|null 
     */
    protected $nDimension4Laenge = 0;

    /**
     * @type integer|null 
     */
    protected $nDimension4Typ = 0;

    /**
     * @type integer|null 
     */
    protected $nDimension5Laenge = 0;

    /**
     * @type integer|null 
     */
    protected $nDimension5Typ = 0;

    /**
     * @type integer 
     */
    protected $nFulfillment = 0;

    /**
     * @type integer 
     */
    protected $nLagerplatzVerwaltung = 0;

    /**
     * @type integer|null 
     */
    protected $nPackStationAktiv = 0;


    /**
     * @type array list of identities
     */
    protected $identities = array(
        'id',
    );

    /**
     * @param  string $name 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setName($name)
    {
        return $this->setProperty('name', $name, 'string');
    }
    
    /**
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param  string $cKuerzel 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCKuerzel($cKuerzel)
    {
        return $this->setProperty('cKuerzel', $cKuerzel, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCKuerzel()
    {
        return $this->cKuerzel;
    }

    /**
     * @param  string $cLagerTyp 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCLagerTyp($cLagerTyp)
    {
        return $this->setProperty('cLagerTyp', $cLagerTyp, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCLagerTyp()
    {
        return $this->cLagerTyp;
    }

    /**
     * @param  string $cBeschreibung 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCBeschreibung($cBeschreibung)
    {
        return $this->setProperty('cBeschreibung', $cBeschreibung, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCBeschreibung()
    {
        return $this->cBeschreibung;
    }

    /**
     * @param  string $cStrasse 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCStrasse($cStrasse)
    {
        return $this->setProperty('cStrasse', $cStrasse, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCStrasse()
    {
        return $this->cStrasse;
    }

    /**
     * @param  string $cPLZ 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCPLZ($cPLZ)
    {
        return $this->setProperty('cPLZ', $cPLZ, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCPLZ()
    {
        return $this->cPLZ;
    }

    /**
     * @param  string $cOrt 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCOrt($cOrt)
    {
        return $this->setProperty('cOrt', $cOrt, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCOrt()
    {
        return $this->cOrt;
    }

    /**
     * @param  string $cLand 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCLand($cLand)
    {
        return $this->setProperty('cLand', $cLand, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCLand()
    {
        return $this->cLand;
    }

    /**
     * @param  string $cAnsprechpartnerAnrede 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCAnsprechpartnerAnrede($cAnsprechpartnerAnrede)
    {
        return $this->setProperty('cAnsprechpartnerAnrede', $cAnsprechpartnerAnrede, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCAnsprechpartnerAnrede()
    {
        return $this->cAnsprechpartnerAnrede;
    }

    /**
     * @param  string $cAnsprechpartnerVorname 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCAnsprechpartnerVorname($cAnsprechpartnerVorname)
    {
        return $this->setProperty('cAnsprechpartnerVorname', $cAnsprechpartnerVorname, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCAnsprechpartnerVorname()
    {
        return $this->cAnsprechpartnerVorname;
    }

    /**
     * @param  string $cAnsprechpartnerName 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCAnsprechpartnerName($cAnsprechpartnerName)
    {
        return $this->setProperty('cAnsprechpartnerName', $cAnsprechpartnerName, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCAnsprechpartnerName()
    {
        return $this->cAnsprechpartnerName;
    }

    /**
     * @param  string $cAnsprechpartnerTel 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCAnsprechpartnerTel($cAnsprechpartnerTel)
    {
        return $this->setProperty('cAnsprechpartnerTel', $cAnsprechpartnerTel, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCAnsprechpartnerTel()
    {
        return $this->cAnsprechpartnerTel;
    }

    /**
     * @param  string $cAnsprechpartnerFax 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCAnsprechpartnerFax($cAnsprechpartnerFax)
    {
        return $this->setProperty('cAnsprechpartnerFax', $cAnsprechpartnerFax, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCAnsprechpartnerFax()
    {
        return $this->cAnsprechpartnerFax;
    }

    /**
     * @param  string $cAnsprechpartnerEMail 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCAnsprechpartnerEMail($cAnsprechpartnerEMail)
    {
        return $this->setProperty('cAnsprechpartnerEMail', $cAnsprechpartnerEMail, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCAnsprechpartnerEMail()
    {
        return $this->cAnsprechpartnerEMail;
    }

    /**
     * @param  string $cAnsprechpartnerAbteilung 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCAnsprechpartnerAbteilung($cAnsprechpartnerAbteilung)
    {
        return $this->setProperty('cAnsprechpartnerAbteilung', $cAnsprechpartnerAbteilung, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCAnsprechpartnerAbteilung()
    {
        return $this->cAnsprechpartnerAbteilung;
    }

    /**
     * @param  string $cBundesland 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCBundesland($cBundesland)
    {
        return $this->setProperty('cBundesland', $cBundesland, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCBundesland()
    {
        return $this->cBundesland;
    }

    /**
     * @param  integer $kFirma 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setKFirma($kFirma)
    {
        return $this->setProperty('kFirma', $kFirma, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getKFirma()
    {
        return $this->kFirma;
    }

    /**
     * @param  integer $kUser 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setKUser($kUser)
    {
        return $this->setProperty('kUser', $kUser, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getKUser()
    {
        return $this->kUser;
    }

    /**
     * @param  integer $nFulfillment 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setNFulfillment($nFulfillment)
    {
        return $this->setProperty('nFulfillment', $nFulfillment, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getNFulfillment()
    {
        return $this->nFulfillment;
    }

    /**
     * @param  integer $nLagerplatzVerwaltung 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setNLagerplatzVerwaltung($nLagerplatzVerwaltung)
    {
        return $this->setProperty('nLagerplatzVerwaltung', $nLagerplatzVerwaltung, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getNLagerplatzVerwaltung()
    {
        return $this->nLagerplatzVerwaltung;
    }

    /**
     * @param  integer $nAuslieferungsPrio 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setNAuslieferungsPrio($nAuslieferungsPrio)
    {
        return $this->setProperty('nAuslieferungsPrio', $nAuslieferungsPrio, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getNAuslieferungsPrio()
    {
        return $this->nAuslieferungsPrio;
    }

    /**
     * @param  integer $nPackStationAktiv 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setNPackStationAktiv($nPackStationAktiv)
    {
        return $this->setProperty('nPackStationAktiv', $nPackStationAktiv, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getNPackStationAktiv()
    {
        return $this->nPackStationAktiv;
    }

    /**
     * @param  string $cDimension1Name 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCDimension1Name($cDimension1Name)
    {
        return $this->setProperty('cDimension1Name', $cDimension1Name, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCDimension1Name()
    {
        return $this->cDimension1Name;
    }

    /**
     * @param  string $cDimension1Trennzeichen 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCDimension1Trennzeichen($cDimension1Trennzeichen)
    {
        return $this->setProperty('cDimension1Trennzeichen', $cDimension1Trennzeichen, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCDimension1Trennzeichen()
    {
        return $this->cDimension1Trennzeichen;
    }

    /**
     * @param  integer $nDimension1Laenge 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setNDimension1Laenge($nDimension1Laenge)
    {
        return $this->setProperty('nDimension1Laenge', $nDimension1Laenge, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getNDimension1Laenge()
    {
        return $this->nDimension1Laenge;
    }

    /**
     * @param  integer $nDimension1Typ 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setNDimension1Typ($nDimension1Typ)
    {
        return $this->setProperty('nDimension1Typ', $nDimension1Typ, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getNDimension1Typ()
    {
        return $this->nDimension1Typ;
    }

    /**
     * @param  string $cDimension2Name 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCDimension2Name($cDimension2Name)
    {
        return $this->setProperty('cDimension2Name', $cDimension2Name, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCDimension2Name()
    {
        return $this->cDimension2Name;
    }

    /**
     * @param  string $cDimension2Trennzeichen 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCDimension2Trennzeichen($cDimension2Trennzeichen)
    {
        return $this->setProperty('cDimension2Trennzeichen', $cDimension2Trennzeichen, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCDimension2Trennzeichen()
    {
        return $this->cDimension2Trennzeichen;
    }

    /**
     * @param  integer $nDimension2Laenge 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setNDimension2Laenge($nDimension2Laenge)
    {
        return $this->setProperty('nDimension2Laenge', $nDimension2Laenge, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getNDimension2Laenge()
    {
        return $this->nDimension2Laenge;
    }

    /**
     * @param  integer $nDimension2Typ 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setNDimension2Typ($nDimension2Typ)
    {
        return $this->setProperty('nDimension2Typ', $nDimension2Typ, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getNDimension2Typ()
    {
        return $this->nDimension2Typ;
    }

    /**
     * @param  string $cDimension3Name 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCDimension3Name($cDimension3Name)
    {
        return $this->setProperty('cDimension3Name', $cDimension3Name, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCDimension3Name()
    {
        return $this->cDimension3Name;
    }

    /**
     * @param  string $cDimension3Trennzeichen 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCDimension3Trennzeichen($cDimension3Trennzeichen)
    {
        return $this->setProperty('cDimension3Trennzeichen', $cDimension3Trennzeichen, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCDimension3Trennzeichen()
    {
        return $this->cDimension3Trennzeichen;
    }

    /**
     * @param  integer $nDimension3Laenge 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setNDimension3Laenge($nDimension3Laenge)
    {
        return $this->setProperty('nDimension3Laenge', $nDimension3Laenge, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getNDimension3Laenge()
    {
        return $this->nDimension3Laenge;
    }

    /**
     * @param  integer $nDimension3Typ 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setNDimension3Typ($nDimension3Typ)
    {
        return $this->setProperty('nDimension3Typ', $nDimension3Typ, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getNDimension3Typ()
    {
        return $this->nDimension3Typ;
    }

    /**
     * @param  string $cDimension4Name 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCDimension4Name($cDimension4Name)
    {
        return $this->setProperty('cDimension4Name', $cDimension4Name, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCDimension4Name()
    {
        return $this->cDimension4Name;
    }

    /**
     * @param  string $cDimension4Trennzeichen 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCDimension4Trennzeichen($cDimension4Trennzeichen)
    {
        return $this->setProperty('cDimension4Trennzeichen', $cDimension4Trennzeichen, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCDimension4Trennzeichen()
    {
        return $this->cDimension4Trennzeichen;
    }

    /**
     * @param  integer $nDimension4Laenge 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setNDimension4Laenge($nDimension4Laenge)
    {
        return $this->setProperty('nDimension4Laenge', $nDimension4Laenge, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getNDimension4Laenge()
    {
        return $this->nDimension4Laenge;
    }

    /**
     * @param  integer $nDimension4Typ 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setNDimension4Typ($nDimension4Typ)
    {
        return $this->setProperty('nDimension4Typ', $nDimension4Typ, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getNDimension4Typ()
    {
        return $this->nDimension4Typ;
    }

    /**
     * @param  string $cDimension5Name 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCDimension5Name($cDimension5Name)
    {
        return $this->setProperty('cDimension5Name', $cDimension5Name, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCDimension5Name()
    {
        return $this->cDimension5Name;
    }

    /**
     * @param  string $cDimension5Trennzeichen 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCDimension5Trennzeichen($cDimension5Trennzeichen)
    {
        return $this->setProperty('cDimension5Trennzeichen', $cDimension5Trennzeichen, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCDimension5Trennzeichen()
    {
        return $this->cDimension5Trennzeichen;
    }

    /**
     * @param  integer $nDimension5Laenge 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setNDimension5Laenge($nDimension5Laenge)
    {
        return $this->setProperty('nDimension5Laenge', $nDimension5Laenge, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getNDimension5Laenge()
    {
        return $this->nDimension5Laenge;
    }

    /**
     * @param  integer $nDimension5Typ 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setNDimension5Typ($nDimension5Typ)
    {
        return $this->setProperty('nDimension5Typ', $nDimension5Typ, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getNDimension5Typ()
    {
        return $this->nDimension5Typ;
    }

    /**
     * @param  string $cEmpfaengerFirma 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'string'.
     */
    public function setCEmpfaengerFirma($cEmpfaengerFirma)
    {
        return $this->setProperty('cEmpfaengerFirma', $cEmpfaengerFirma, 'string');
    }
    
    /**
     * @return string 
     */
    public function getCEmpfaengerFirma()
    {
        return $this->cEmpfaengerFirma;
    }

    /**
     * @param  integer $kQuellLager 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setKQuellLager($kQuellLager)
    {
        return $this->setProperty('kQuellLager', $kQuellLager, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getKQuellLager()
    {
        return $this->kQuellLager;
    }

    /**
     * @param  integer $kZielLager 
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'integer'.
     */
    public function setKZielLager($kZielLager)
    {
        return $this->setProperty('kZielLager', $kZielLager, 'integer');
    }
    
    /**
     * @return integer 
     */
    public function getKZielLager()
    {
        return $this->kZielLager;
    }

    /**
     * @param  Identity $id Unique warehouse id
     * @return \jtl\Connector\Model\Warehouse
     * @throws InvalidArgumentException if the provided argument is not of type 'Identity'.
     */
    public function setId(Identity $id)
    {
        return $this->setProperty('id', $id, 'Identity');
    }
    
    /**
     * @return Identity Unique warehouse id
     */
    public function getId()
    {
        return $this->id;
    }
}

