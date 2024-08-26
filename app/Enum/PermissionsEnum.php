<?php

namespace App\Enum;

enum PermissionsEnum: string
{
    case PERMISSION_INDEX = 'permission.index';
    case ROLE_INDEX = 'role.index';
    case ROLE_ADD = 'role.add';
    case ROLE_EDIT = 'role.edit';
    case ROLE_DELETE = 'role.delete';
    case USER_INDEX = 'user.index';
    case USER_CREATE = 'user.create';
    case USER_VERIF = 'user.verif';
    case USER_CHANGE_PASSWORD = 'user.change-password';
    case USER_DETAIL = 'user.detail';
    case USER_EDIT = 'user.edit';
    case USER_DELETE = 'user.delete';
    case CAMPAIGN_INDEX = 'campaign.index';
    case CAMPAIGN_DETAIL = 'campaign.detail';
    case CAMPAIGN_ADD = 'campaign.add';
    case CAMPAIGN_EDIT = 'campaign.edit';
    case CAMPAIGN_APPROVE = 'campaign.approve';
    case CAMPAIGN_FUND = 'campaign.fund';
    case CAMPAIGN_ACT = 'campaign.act';
    case CAMPAIGN_DELETE = 'campaign.delete';
    case REPORT_INDEX = 'report.index';
    case CLEANUP_INDEX = 'cleanup.index';
    case CLEANUP_DETAIL = 'cleanup.detail';
    case CLEANUP_ADD = 'cleanup.add';
    case CLEANUP_VOTE = 'cleanup.vote';
    case CLEANFUND_INDEX = 'cleanfund.index';
    case CLEANFUND_DETAIL = 'cleanfund.detail';
    case CLEANFUND_DONATE = 'cleanfund.donate';
    case CLEANACT_INDEX = 'cleanact.index';
    case CLEANACT_DETAIL = 'cleanact.detail';
    case CLEANACT_REGISTER = 'cleanact.register';


    public static function getPermissions(): array
    {
        return [
            self::PERMISSION_INDEX,
            self::ROLE_INDEX,
            self::ROLE_ADD,
            self::ROLE_EDIT,
            self::ROLE_DELETE,
            self::USER_INDEX,
            self::USER_CREATE,
            self::USER_VERIF,
            self::USER_CHANGE_PASSWORD,
            self::USER_DETAIL,
            self::USER_EDIT,
            self::USER_DELETE,
            self::CAMPAIGN_INDEX,
            self::CAMPAIGN_DETAIL,
            self::CAMPAIGN_ADD,
            self::CAMPAIGN_EDIT,
            self::CAMPAIGN_APPROVE,
            self::CAMPAIGN_FUND,
            self::CAMPAIGN_ACT,
            self::CAMPAIGN_DELETE,
            self::REPORT_INDEX,
            self::CLEANUP_INDEX,
            self::CLEANUP_DETAIL,
            self::CLEANUP_ADD,
            self::CLEANUP_VOTE,
            self::CLEANFUND_INDEX,
            self::CLEANFUND_DETAIL,
            self::CLEANFUND_DONATE,
            self::CLEANACT_INDEX,
            self::CLEANACT_DETAIL,
            self::CLEANACT_REGISTER,
        ];
    }

    public function label(): string
    {
        return match ($this) {
            static::PERMISSION_INDEX => 'permission.index',
            static::ROLE_INDEX => 'role.index',
            static::ROLE_ADD => 'role.add',
            static::ROLE_EDIT => 'role.edit',
            static::ROLE_DELETE => 'role.delete',
            static::USER_INDEX => 'user.index',
            static::USER_CREATE => 'user.create',
            static::USER_VERIF => 'user.verif',
            static::USER_CHANGE_PASSWORD => 'user.change-password',
            static::USER_DETAIL => 'user.detail',
            static::USER_EDIT => 'user.edit',
            static::USER_DELETE => 'user.delete',
            static::CAMPAIGN_INDEX => 'campaign.index',
            static::CAMPAIGN_DETAIL => 'campaign.detail',
            static::CAMPAIGN_ADD => 'campaign.add',
            static::CAMPAIGN_EDIT => 'campaign.edit',
            static::CAMPAIGN_APPROVE => 'campaign.approve',
            static::CAMPAIGN_FUND => 'campaign.fund',
            static::CAMPAIGN_ACT => 'campaign.act',
            static::CAMPAIGN_DELETE => 'campaign.delete',
            static::REPORT_INDEX => 'report.index',
            static::CLEANUP_INDEX => 'cleanup.index',
            static::CLEANUP_DETAIL => 'cleanup.detail',
            static::CLEANUP_ADD => 'cleanup.add',
            static::CLEANUP_VOTE => 'cleanup.vote',
            static::CLEANFUND_INDEX => 'cleanfund.index',
            static::CLEANFUND_DETAIL => 'cleanfund.detail',
            static::CLEANFUND_DONATE => 'cleanfund.donate',
            static::CLEANACT_INDEX => 'cleanact.index',
            static::CLEANACT_DETAIL => 'cleanact.detail',
            static::CLEANACT_REGISTER => 'cleanact.register',
        };
    }
}
