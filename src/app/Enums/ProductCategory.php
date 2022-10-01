<?php

namespace App\Enums;

enum ProductCategory: string
{
    case INSURANCE = 'insurance';
    case VEHICLE = 'vehicle';

    public static function values(): array
    {
        return array_map(static function ($enum) {
            return $enum->value;
        }, self::cases());
    }
}
