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
            self::PERMISSION_INDEX => 'permission.index',
            self::ROLE_INDEX => 'role.index',
            self::ROLE_ADD => 'role.add',
            self::ROLE_EDIT => 'role.edit',
            self::ROLE_DELETE => 'role.delete',
            self::USER_INDEX => 'user.index',
            self::USER_CREATE => 'user.create',
            self::USER_VERIF => 'user.verif',
            self::USER_CHANGE_PASSWORD => 'user.change-password',
            self::USER_DETAIL => 'user.detail',
            self::USER_EDIT => 'user.edit',
            self::USER_DELETE => 'user.delete',
            self::CAMPAIGN_INDEX => 'campaign.index',
            self::CAMPAIGN_DETAIL => 'campaign.detail',
            self::CAMPAIGN_ADD => 'campaign.add',
            self::CAMPAIGN_EDIT => 'campaign.edit',
            self::CAMPAIGN_APPROVE => 'campaign.approve',
            self::CAMPAIGN_FUND => 'campaign.fund',
            self::CAMPAIGN_ACT => 'campaign.act',
            self::CAMPAIGN_DELETE => 'campaign.delete',
            self::REPORT_INDEX => 'report.index',
            self::CLEANUP_INDEX => 'cleanup.index',
            self::CLEANUP_DETAIL => 'cleanup.detail',
            self::CLEANUP_ADD => 'cleanup.add',
            self::CLEANUP_VOTE => 'cleanup.vote',
            self::CLEANFUND_INDEX => 'cleanfund.index',
            self::CLEANFUND_DETAIL => 'cleanfund.detail',
            self::CLEANFUND_DONATE => 'cleanfund.donate',
            self::CLEANACT_INDEX => 'cleanact.index',
            self::CLEANACT_DETAIL => 'cleanact.detail',
            self::CLEANACT_REGISTER => 'cleanact.register',
        };
    }
}
