<?php

namespace ImmoDemo\Model;

use ImmoDemo\Enums\PreferredContact;
use ImmoDemo\Enums\Request;

class Suitor {
    private string $id;
    private string $title;
    private string $firstName;
    private string $lastName;
    private string $company;
    private string $street;
    private string $streetNumber;
    private string $zipCode;
    private string $city;
    private string $phoneNumber;
    private string $faxNumber;
    private string $mobileNumber;
    private string $email;
    private array $contactPreferences = [];
    private array $suitorRequests = [];

    public function __construct(
        string $title,
        string $firstName,
        string $lastName,
        string $company,
        string $street,
        string $streetNumber,
        string $zipCode,
        string $city,
        string $phoneNumber,
        string $faxNumber,
        string $mobileNumber,
        string $email,

    ) {
        $this->id = uniqid();
        $this->title = $title;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->company = $company;
        $this->street = $street;
        $this->streetNumber = $streetNumber;
        $this->zipCode = $zipCode;
        $this->city = $city;
        $this->phoneNumber = $phoneNumber;
        $this->faxNumber = $faxNumber;
        $this->mobileNumber = $mobileNumber;
        $this->email = $email;

    }

    public function addContactPreference(PreferredContact $preferredContact) {
        if (!in_array($preferredContact, $this->contactPreferences)) {
            $this->contactPreferences[] = $preferredContact;
        }
    }

    public function addSuitorRequest(Request $request) {
        if (!in_array($request, $this->suitorRequests)) {
            $this->suitorRequests[] = $request;
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getCompany()
    {
        return $this->company;
    }

    public function getStreet()
    {
        return $this->street;
    }

    public function getStreetNumber()
    {
        return $this->streetNumber;
    }

    public function getZipCode()
    {
        return $this->zipCode;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    public function getFaxNumber()
    {
        return $this->faxNumber;
    }

    public function getMobileNumber()
    {
        return $this->mobileNumber;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getContactPreferences()
    {
        return $this->contactPreferences;
    }

    public function getSuitorRequests()
    {
        return $this->suitorRequests;
    }
}