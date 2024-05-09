<?php

require_once '../model/Suitor.php';
require_once __DIR__ . '../../../vendor/autoload.php';

use ImmoDemo\Enums\PreferredContact;
use ImmoDemo\Enums\Request;
use ImmoDemo\Model\Suitor;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $postData = json_decode(file_get_contents("php://input"), true);

// eigene klasse welche den suitor buildet

    if ($postData) {
        $suitor = new Suitor(
            $postData['title'],
            $postData['firstName'],
            $postData['lastName'],
            $postData['company'],
            $postData['street'],
            $postData['streetNumber'],
            $postData['zipCode'],
            $postData['city'],
            $postData['phoneNumber'],
            $postData['faxNumber'],
            $postData['mobileNumber'],
            $postData['email']
        );

        $postData['contactViaEmail'] && $suitor->addContactPreference(PreferredContact::EMAIL);
        $postData['contactViaPhone'] && $suitor->addContactPreference(PreferredContact::TELEPHONE);
        $postData['contactViaMobile'] && $suitor->addContactPreference(PreferredContact::MOBILE);
        $postData['contactViaFax'] && $suitor->addContactPreference(PreferredContact::FAX);
        $postData['contactViaLetter'] && $suitor->addContactPreference(PreferredContact::LETTER);

        $postData['requestViewing'] && $suitor->addSuitorRequest(Request::VIEWING);
        $postData['requestCallback'] && $suitor->addSuitorRequest(Request::CALLBACK);
        $postData['requestDetails'] && $suitor->addSuitorRequest(Request::DETAIL);

//----------------- generate XML --> eigene klasse

        $xml = new SimpleXMLElement('<AntragformularXML></AntragformularXML>');

        $objekt = $xml->addChild('objekt');
        $objekt->addChild('object_id', '123');
        $objekt->addChild('bezeichnung', 'Beispielobjekt');

        $interessent = $xml->addChild('Interessent');
        $interessent = $xml->addChild('id', $suitor->getId());
        $interessent = $xml->addChild('anrede', htmlspecialchars($postData['title']));
        $interessent = $xml->addChild('vorname', htmlspecialchars($postData['firstName']));
        $interessent = $xml->addChild('nachname', htmlspecialchars($postData['lastName']));
        $interessent = $xml->addChild('firma', htmlspecialchars($postData['company']));
        $interessent = $xml->addChild('strasse', htmlspecialchars($postData['street']));
        $interessent = $xml->addChild('postfach', htmlspecialchars($postData['streetNumber']));
        $interessent = $xml->addChild('plz', htmlspecialchars($postData['zipCode']));
        $interessent = $xml->addChild('ort', htmlspecialchars($postData['city']));
        $interessent = $xml->addChild('tel', htmlspecialchars($postData['phoneNumber']));
        $interessent = $xml->addChild('fax', htmlspecialchars($postData['faxNumber']));
        $interessent = $xml->addChild('mobil', htmlspecialchars($postData['mobileNumber']));
        $interessent = $xml->addChild('email', htmlspecialchars($postData['email']));

        $bevorzugt = $xml->addChild('Bevorzugt');
        foreach ($suitor->getContactPreferences() as $preference) {
            $contactNode = $bevorzugt->addChild('Preferred Contact');
            $contactNode->addAttribute('value', $preference->value);
        }

        $wunsch = $xml->addChild('Wunsch');
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

        $dom->save('../../save/suitor.xml');

        header('Content-Type: application/json');
        echo json_encode(['success' => true, 'message' => 'Daten erfolgreich empfangen']);
    } else {
        header('Content-Type: application/json');
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Keine Daten empfangen']);
    }
} else {
    header('Content-Type: application/json');
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Nur POST-Methode erlaubt']);
}