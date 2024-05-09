<?php

require_once __DIR__ . '../../../vendor/autoload.php';

use ImmoDemo\Builder\SuitorBuilder;
use ImmoDemo\Builder\XmlBuilder;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $postData = json_decode(file_get_contents("php://input"), true);

    if ($postData) {

        $suitor = SuitorBuilder::build($postData);
        $xmlDocument = XmlBuilder::generateXml($suitor);

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