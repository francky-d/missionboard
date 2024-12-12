<?php

namespace App\Enum;

use App\Traits\HasEnumToArray;

enum ConsultantStatusEnum : string
{
    use HasEnumToArray;
    CASE AVAILABLE = 'available';
    CASE UNAVAILABLE = 'unavailable';
}
