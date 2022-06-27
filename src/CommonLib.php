<?php


namespace SchoolOnline\Config;


class CommonLib
{
    public static function getLanguages()
    {
        return [
            ConfigV6::LANGUAGE_VN => trans('common.language.vi'),
            ConfigV6::LANGUAGE_EN => trans('common.language.en'),
            ConfigV6::LANGUAGE_JAPAN => trans('common.language.jp'),
        ];
    }

    public static function getTimeZones()
    {
        return [
            ConfigV6::TIMEZONE_VN,
        ];
    }

    public static function getLocations()
    {
        return [
            ConfigV6::LOCATION_VN => trans('common.location.vi'),
            ConfigV6::LOCATION_EN => trans('common.location.en'),
            ConfigV6::LOCATION_JAPAN => trans('common.location.jp'),
        ];
    }

    public static function getCurrencyUnits()
    {
        return [
            ConfigV6::CURRENCY_UNIT_VN => 'VNĐ',
            ConfigV6::CURRENCY_UNIT_US => '$',
        ];
    }

    public static function getFieldName()
    {
        return [
            ConfigV6::FIRST_NAME,
            ConfigV6::MIDDLE_NAME,
            ConfigV6::LAST_NAME,
        ];
    }
}