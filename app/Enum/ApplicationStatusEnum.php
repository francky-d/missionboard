<?php

namespace App\Enum;

use App\Traits\HasEnumToArray;

enum ApplicationStatusEnum : string
{
    use HasEnumToArray;
    CASE PENDING = "pending";
    case ACCEPTED = "accepted";
    case REJECTED = "rejected";
}
