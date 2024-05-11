<?php

namespace ImmoDemo\Builder;

use ImmoDemo\Model\Suitor;
use SimpleXMLElement;
use DOMDocument;

class XmlBuilder {
    public static function generateXml(Suitor $suitor): string {

        $xml = new SimpleXMLElement('<AntragformularXML></AntragformularXML>');

        $objekt = $xml->addChild('Objekt');
        $objekt->addChild('object_id', $suitor->getPropertyObject()->getId());
        $objekt->addChild('bezeichnung', $suitor->getPropertyObject()->getName());

        $interessent = $xml->addChild('Interessent');
        self::addChildIfNotEmpty($interessent, 'id', $suitor->getId());
        self::addChildIfNotEmpty($interessent, 'anrede', $suitor->getTitle());
        self::addChildIfNotEmpty($interessent, 'vorname', $suitor->getFirstName());
        self::addChildIfNotEmpty($interessent, 'nachname', $suitor->getLastName());
        self::addChildIfNotEmpty($interessent, 'firma', $suitor->getCompany());
        self::addChildIfNotEmpty($interessent, 'strasse', $suitor->getStreet());
        self::addChildIfNotEmpty($interessent, 'postfach', $suitor->getStreetNumber());
        self::addChildIfNotEmpty($interessent, 'plz', $suitor->getZipCode());
        self::addChildIfNotEmpty($interessent, 'ort', $suitor->getCity());
        self::addChildIfNotEmpty($interessent, 'tel', $suitor->getPhoneNumber());
        self::addChildIfNotEmpty($interessent, 'fax', $suitor->getFaxNumber());
        self::addChildIfNotEmpty($interessent, 'mobil', $suitor->getMobileNumber());
        self::addChildIfNotEmpty($interessent, 'email', $suitor->getEmail());

        $bevorzugt = $interessent->addChild('Bevorzugt');
        foreach ($suitor->getContactPreferences() as $preference) {
            $contactNode = $bevorzugt->addChild('Preferred Contact');
            $contactNode->addAttribute('value', $preference->value);
        }

        $wunsch = $interessent->addChild('Wunsch');
        foreach ($suitor->getSuitorRequests() as $request) {
            $requestNode = $wunsch->addChild('Suitor Request');
            $requestNode->addAttribute('value', $request->value);
        }

        $dom = new DOMDocument('1.0');
        $dom->formatOutput = true;
        $dom->preserveWhiteSpace = false;
        $domElement = dom_import_simplexml($xml);
        $domElement = $dom->importNode($domElement, true);
        $domElement = $dom->appendChild($domElement);

        /*$suitorId = $suitor->getId();
        $filename = "../../save/suitor-{$suitorId}.xml";
        $dom->save($filename);
        */

        return $dom->saveXML();
    }

    private static function addChildIfNotEmpty($parent, $childName, $value) {
        if (!empty($value)) {
            $parent->addChild($childName, htmlspecialchars($value));
        }
    }
}