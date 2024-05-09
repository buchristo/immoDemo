<?php

namespace ImmoDemo\Enums;

enum PreferredContact: string {
    case EMAIL = "EMAIL";
    case TELEPHONE = "TEL";
    case MOBILE = "MOBIL";
    case FAX = "FAX";
    case LETTER = "BRIEF";
}