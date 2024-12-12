<?php

namespace App\Enum;

use App\Traits\HasEnumToArray;

enum UserRoleEnum : string
{
    use HasEnumToArray;
    CASE COMMERCIAL = "commercial";
    case CONSULTANT = "consultant";
}
