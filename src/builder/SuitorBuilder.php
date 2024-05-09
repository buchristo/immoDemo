<?php

namespace ImmoDemo\Builder;

use ImmoDemo\Model\Suitor;
use ImmoDemo\Enums\PreferredContact;
use ImmoDemo\Enums\Request;

class SuitorBuilder {
    public static function build(array $postData): Suitor {
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

        return $suitor;
    }
}