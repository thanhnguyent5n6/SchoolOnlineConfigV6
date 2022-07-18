<?php


namespace SchoolOnline\Config;


class Enum
{
    const Language = [
        ConfigV6::LANGUAGE_VN,
        ConfigV6::LANGUAGE_EN,
        ConfigV6::LANGUAGE_JAPAN,
    ];

    const TimeZone = [
        ConfigV6::TIMEZONE_VN
    ];

    const Location = [
        ConfigV6::LOCATION_VN,
        ConfigV6::LOCATION_EN,
        ConfigV6::LOCATION_JAPAN,
    ];

    const CurrencyUnit = [
        ConfigV6::CURRENCY_UNIT_VN,
        ConfigV6::CURRENCY_UNIT_US,
    ];

    const IsActive = [
        ConfigV6::NO_ACTIVE,
        ConfigV6::ACTIVE,
    ];

    const IsDeleted = [
        ConfigV6::NO_DELETED,
        ConfigV6::DELETED,
    ];

    const Gender = [
        ConfigV6::GENDER_MALE,
        ConfigV6::GENDER_FEMALE,
    ];

    const TenantStatus = [
        ConfigV6::TENANT_STATUS_LOCKED,
        ConfigV6::TENANT_STATUS_ACTIVE,
        ConfigV6::TENANT_STATUS_TRIAL_USING,
        ConfigV6::TENANT_STATUS_EXPIRED,
    ];

    const Term = [
        ConfigV6::TERM_1,
        ConfigV6::TERM_2,
        ConfigV6::TERM_3,
        ConfigV6::TERM_4,
    ];

    const DayOfWeek = [
        ConfigV6::DAY_OF_WEEK_SUNDAY,
        ConfigV6::DAY_OF_WEEK_MONDAY,
        ConfigV6::DAY_OF_WEEK_TUESDAY,
        ConfigV6::DAY_OF_WEEK_WEDNESDAY,
        ConfigV6::DAY_OF_WEEK_THURSDAY,
        ConfigV6::DAY_OF_WEEK_FRIDAY,
        ConfigV6::DAY_OF_WEEK_SATURDAY,
    ];

    const Layout = [
        ConfigV6::LAYOUT_OMT,
        ConfigV6::LAYOUT_MINISTRY,
        ConfigV6::LAYOUT_DEPARTMENT,
        ConfigV6::LAYOUT_DIVISION,
        ConfigV6::LAYOUT_STAFF,
        ConfigV6::LAYOUT_TEACHER,
        ConfigV6::LAYOUT_PARENT,
        ConfigV6::LAYOUT_STUDENT,
        ConfigV6::LAYOUT_TENANT,
        ConfigV6::LAYOUT_CAMPUS,
    ];

    const MenuType = [
        ConfigV6::MENU_TYPE_URL,
        ConfigV6::MENU_TYPE_CATEGORY,
    ];

    const SubjectType = [
        ConfigV6::SUBJECT_MOET,
        ConfigV6::SUBJECT_PRIVATE,
        ConfigV6::SUBJECT_BILINGUAL,
    ];

    const EducationalStages = [
        ConfigV6::EDUCATIONAL_STAGE_PRIMARY_SCHOOL,
        ConfigV6::EDUCATIONAL_STAGE_SECONDARY_SCHOOL,
        ConfigV6::EDUCATIONAL_STAGE_HIGH_SCHOOL,
    ];

}