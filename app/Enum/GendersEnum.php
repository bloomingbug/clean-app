<?php

namespace App\Enum;

enum GendersEnum: string
{
    case MALE = 'M';
    case FEMALE = 'F';

    public static function getGenders(): array
    {
        return [
            self::MALE,
            self::FEMALE,
        ];
    }

    public function label(): string
    {
        return match ($this) {
            self::MALE => 'M',
            self::FEMALE => 'F',
        };
    }
}
