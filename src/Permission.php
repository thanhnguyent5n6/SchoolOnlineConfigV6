<?php


namespace SchoolOnline\Config;


class Permission
{
    public static function allows($permissions)
    {
        if(!in_array(Permission::OMT_MANAGER, app('permissions')))
            return false;

        return true;
    }

    public static function denies($permissions)
    {
        if(!in_array(Permission::OMT_MANAGER, app('permissions')))
            return true;

        return false;
    }

    public static function response403()
    {
        return response(trans('common.accessDenied'), 403);
    }

    const OMT_ACCESS = "omt_access";
    const OMT_MANAGER = "omt_manager";
}