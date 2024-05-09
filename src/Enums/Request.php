<?php

namespace ImmoDemo\Enums;

enum Request: string {
    case VIEWING = "BESICHTIGUNG";
    case CALLBACK = "ANRUF";
    case DETAIL = "DETAIL";
}