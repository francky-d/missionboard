<?php

namespace App\Traits;

trait HasEnumToArray
{
    public function allValueAsArrayExcept(self $enumCase): array
    {
        return array_filter(
            self::allValueAsArray(), fn ($status) => $status != $enumCase->value
        );
    }

    public static function allValueAsArray(): array
    {
        return array_column(self::cases(), 'value');
    }
}
