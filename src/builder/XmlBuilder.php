<?php

namespace ImmoDemo\Builder;

use ImmoDemo\Model\Suitor;
use SimpleXMLElement;
use DOMDocument;

class XmlBuilder {
    public static function generateXml(Suitor $suitor): string {

        $xml = new SimpleXMLElement('<AntragformularXML></AntragformularXML>');

        $objekt = $xml->addChild('Objekt');
        $objekt->addChild('object_id', '123');
        $objekt->addChild('bezeichnung', 'Beispielobjekt');

        $interessent = $xml->addChild('Interessent');
        $interessent->addChild('id', $suitor->getId());
        $interessent->addChild('anrede', htmlspecialchars($suitor->getTitle()));
        $interessent->addChild('vorname', htmlspecialchars($suitor->getFirstName()));
        $interessent->addChild('nachname', htmlspecialchars($suitor->getLastName()));
        $interessent->addChild('firma', htmlspecialchars($suitor->getCompany()));
        $interessent->addChild('strasse', htmlspecialchars($suitor->getStreet()));
        $interessent->addChild('postfach', htmlspecialchars($suitor->getStreetNumber()));
        $interessent->addChild('plz', htmlspecialchars($suitor->getZipCode()));
        $interessent->addChild('ort', htmlspecialchars($suitor->getCity()));
        $interessent->addChild('tel', htmlspecialchars($suitor->getPhoneNumber()));
        $interessent->addChild('fax', htmlspecialchars($suitor->getFaxNumber()));
        $interessent->addChild('mobil', htmlspecialchars($suitor->getMobileNumber()));
        $interessent->addChild('email', htmlspecialchars($suitor->getEmail()));

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

        $suitorId = $suitor->getId();
        $filename = "../../save/suitor-{$suitorId}.xml";

        $dom->save($filename);
        return $dom->saveXML();
    }
}