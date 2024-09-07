<?php

namespace App\Enum;

enum RolesEnum: string
{
    case ADMIN = 'Admin';
    case SUPERADMIN = 'Super Admin';
    case USER = 'User';

    public static function getRoles(): array
    {
        return [
            self::ADMIN,
            self::SUPERADMIN,
            self::USER,
        ];
    }

    public static function getAdminRoles(): array
    {
        return [
            self::ADMIN,
            self::SUPERADMIN,
        ];
    }

    public static function getUserRoles(): array
    {
        return [
            self::USER,
        ];
    }

    public function label(): string
    {
        return match ($this) {
            self::ADMIN => 'Admin',
            self::SUPERADMIN => 'Super Admin',
            self::USER => 'User',
        };
    }
}
