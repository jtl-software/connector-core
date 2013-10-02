<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Model
 */

namespace jtl\Connector\Model;

use \jtl\Core\Model\DataModel;

/**
 * Product Model
 * @access public
 */
class Product extends DataModel
{
    /**
     * @var int Unique id
     */
    protected $_id = 0;
    
    /**
     * @var int Id des Master-Artikels (bei Variationskombinationen)
     */
    protected $_masterProductId = 0;
    
    /**
     * @var int Hersteller-Id
     */
    protected $_manufacturerId = 0;
    
    /**
     * @var int Lieferstatus-Id
     */
    protected $_deliveryStatusId = 0;
    
    /**
     * @var int Artikeleinheit-Id
     */
    protected $_unitId = 0;
    
    /**
     * @var int Artikelgrundpreis-Id
     */
    protected $_basePriceUnitId = 0;
    
    /**
     * @var int Steuerklassen Id
     */
    protected $_taxClassId = 0;
    
    /**
     * @var int Versandklassen Id
     */
    protected $_shippingClassId = 0;
    
    /**
     * @var string Artikelnummer (SKU / Stock Keeping Unit)
     */
    protected $_sku = '';
    
    /**
     * @var string interne Artikelnotiz
     */
    protected $_note = '';
    
    /**
     * @var double Lagerbestand
     */
    protected $_stockLevel = 0;
    
    /**
     * @var double Umsatzsteuer in Prozent
     */
    protected $_vat = 0.0;
    
    /**
     * @var double Mindestbestellmenge
     */
    protected $_minimumOrderQuantity = 0.0;
    
    /**
     * @var string EAN / Barcode
     */
    protected $_ean = '';
    
    /**
     * @var bool gibt an, ob es sich um ein Top-Produkt (Kennzeichnung in JTL-Wawi) handelt
     */
    protected $_isTopProduct = false;
    
    /**
     * @var double Artikelgewicht
     */
    protected $_productWeight = 0;
    
    /**
     * @var double Versandgewicht
     */
    protected $_shippingWeight = 0;
    
    /**
     * @var bool gibt an, ob es sich um ein neues Produkt (Kennzeichnung in JTL-Wawi) handelt
     */
    protected $_isNew = false;
    
    /**
     * @var double Unverbindliche Preisempfehlung des Herstellers (Bruttopreis)
     */
    protected $_recommendedRetailPrice = 0.0;
    
    /**
     * @var bool Lagerbestand beachten
     */
    protected $_considerStock = false;
    
    /**
     * @var bool Überverkäufe (negativen Lagerbestand) erlauben
     */
    protected $_permitNegativeStock = false;
    
    /**
     * @var bool Lagerbestand in Variationen beachten
     */
    protected $_considerVariationStock = false;
    
    /**
     * @var bool Produktmenge teilbar. true, wenn auch Dezimalwerte als Bestellmengen erlaubt sind. false, wenn nur ganzzahlige Mengen von dem Produkt gekauft werden dürfen. 
     */
    protected $_isDivisible = false;
    
    /**
     * @var bool Grundpreis beachten
     */
    protected $_considerBasePrice = false;
    
    /**
     * @var double Grundpreis Faktor = Verkaufsmenge / Grundpreismenge. Beispiel: Ein Produkt, das in einer Verkaufsmenge von 250g verkauft wird, muss den Grundpreis für 100g ausweisen: 250 / 100 = 2.5
     */
    protected $_basePriceValue = 0.0;
    
    /**
     * @var string Suchbegriffe (nicht mehrsprachig!). Vorwiegend für internationale Synonyme nutzen
     */
    protected $_keywords = '';
    
    /**
     * @var int Sortiernummer für Positionierung nach Sortiernummer in Artikellisten
     */
    protected $_sort = 0;
    
    /**
     * @var string Erstellungsdatum
     */
    protected $_created = "0000-00-00";
    
    /**
     * @var string Erscheinungsdatum (in der Regel für vorbestellbare Artikel z.B. Blu-Rays)
     */
    protected $_availableFrom = "0000-00-00";
    
    /**
     * @var string Herstellernummer (HAN)
     */
    protected $_manufacturerNumber = '';
    
    /**
     * @var string Seriennummer
     */
    protected $_serialNumber = '';
    
    /**
     * @var string ISBN
     */
    protected $_isbn = '';
    
    /**
     * @var string ASIN
     */
    protected $_asin = '';
    
    /**
     * @var string UN-Nummer / Stoffnummer
     */
    protected $_unNumber = '';
    
    /**
     * @var string Gefahrnummer / Kemler-Zahl
     */
    protected $_hazardIdNumber = '';
    
    /**
     * @var string Zolltarifnummer (TARIC)
     */
    protected $_taric = '';
    
    /**
     * @var bool True, wenn andere Produkte über MasterProductId auf diesen Artikel referenzieren. 
     */
    protected $_isMasterProduct = false;
    
    /**
     * @var double Abnahmeintervall. Das Produkt kann nur in Mengen, die durch das Abnahmeintervall teilbar sind, erworben werden. 
     */
    protected $_takeOffQuantity = 0.0;
    
    /**
     * @var int Stücklisten Id. Darf die gleiche Id wie Product.id nutzen. 
     */
    protected $_setArticleId = 0;
    
    /**
     * @var string Universal Product Code (UPC)
     */
    protected $_upc = '';
    
    /**
     * @var string Herkunftsland
     */
    protected $_originCountry = '';
    
    /**
     * @var string Ebay Item Part Number (ePID)
     */
    protected $_epid = '';
    
    /**
     * @var int Warengruppen-Id
     */
    protected $_productTypeId = 0;
    
    /**
     * @var double Menge im Zulauf
     */
    protected $_inflowQuantity = 0.0;
    
    /**
     * @var string voraussichtliches Zulaufdatum
     */
    protected $_inflowDate = '';
    
    /**
     * @var double Lieferantenlagerbestand des Standard-Lieferanten
     */
    protected $_supplierStockLevel = 0.0;
    
    /**
     * @var double Lieferzeit des Standard-Lieferanten
     */
    protected $_supplierDeliveryTime = 0.0;
    
    /**
     * @var string Mindesthaltbarkeitsdatum
     */
    protected $_bestBefore = '0000-00-00';
    
    /**
     * Product Setter
     *
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        if ($value === null) {
            $this->$name = null;
            return;
        }
        
        switch ($name) {
            case "_id":
            case "_masterProductId":
            case "_manufacturerId":
            case "_deliveryStatusId":
            case "_unitId":
            case "_basePriceUnitId":
            case "_taxClassId":
            case "_shippingClassId":
            case "_sort":
            case "_setArticleId":
            case "_productTypeId":
            
                $this->$name = (int)$value;
                break;
        
            case "_sku":
            case "_note":
            case "_ean":
            case "_keywords":
            case "_created":
            case "_availableFrom":
            case "_manufacturerNumber":
            case "_serialNumber":
            case "_isbn":
            case "_asin":
            case "_unNumber":
            case "_hazardIdNumber":
            case "_taric":
            case "_upc":
            case "_originCountry":
            case "_epid":
            case "_inflowDate":
            case "_bestBefore":
            
                $this->$name = (string)$value;
                break;
        
            case "_stockLevel":
            case "_vat":
            case "_minimumOrderQuantity":
            case "_productWeight":
            case "_shippingWeight":
            case "_recommendedRetailPrice":
            case "_basePriceValue":
            case "_takeOffQuantity":
            case "_inflowQuantity":
            case "_supplierStockLevel":
            case "_supplierDeliveryTime":
            
                $this->$name = (double)$value;
                break;
        
            case "_isTopProduct":
            case "_isNew":
            case "_considerStock":
            case "_permitNegativeStock":
            case "_considerVariationStock":
            case "_isDivisible":
            case "_considerBasePrice":
            case "_isMasterProduct":
            
                $this->$name = (bool)$value;
                break;
        
        }
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Model\DataModel::map()
     */ 
    public function map($toWawi = false, \stdClass $obj = null)
    {
    
    }
}
?>