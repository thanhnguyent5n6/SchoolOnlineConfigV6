<?php


namespace SchoolOnline\Config;


class ConfigV6
{
    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;

    const NO_DELETED = 0;
    const DELETED = 1;

    const DAY_OF_WEEK_SUNDAY = 0;//Chu nhat
    const DAY_OF_WEEK_MONDAY = 1;//Thu 2
    const DAY_OF_WEEK_TUESDAY = 2;//Thu 3
    const DAY_OF_WEEK_WEDNESDAY = 3;//Thu 4
    const DAY_OF_WEEK_THURSDAY = 4;//Thu 5
    const DAY_OF_WEEK_FRIDAY = 5;//Thu 6
    const DAY_OF_WEEK_SATURDAY = 6;//Thu 7

    const TERM_1 = 1;// Giua hoc ky 1 (Term1)
    const TERM_2 = 2;// Cuoi hoc ky 1 (Term2)
    const TERM_3 = 3;// Giua hoc ky 2 (Term3)
    const TERM_4 = 4;// Cuoi hoc ky 2 (Term4)

    const DISPLAY_DATE_FORMAT = 'd/m/Y'; //Format hien thi ngay thang nam
    const DISPLAY_DATETIME_FORMAT = 'H:i:s d/m/Y'; //Format hien thi ngay thang nam gio phut giay
    const DISPLAY_SHORT_DATETIME_FORMAT = 'H:i d/m/Y'; //Format hien thi ngay thang nam gio phut giay
    const DISPLAY_TIME_FORMAT = 'H:i';//Format hien thi gio phut
    const DISPLAY_TIME_SECOND_FORMAT = 'H:i:s'; //Format hien thi gio phut giay
    const DISPLAY_DATETIME_FORMAT_2 = 'd/m/Y H:i:s'; //Format hien thi ngay thang nam gio phut giay

    const ATTENDANCE_STATUS_NOT_YET = 0;//Chua thiet lap
    const ATTENDANCE_STATUS_ON_TIME = 1;//Dung gio
    const ATTENDANCE_STATUS_LATE = 2;//Di muon
    const ATTENDANCE_STATUS_EXCUSED_ABSENT = 3;//Vang co phep
    const ATTENDANCE_STATUS_UNEXCUSED_ABSENT = 4;//Vang khong phep
    const ATTENDANCE_STATUS_EXCUSED_ABSENT_SCHEDULED = 5;//Vang co phep (co ke hoach)
    const ATTENDANCE_STATUS_EXCUSED_ABSENT_UNSCHEDULED = 6;//Vang co phep (dot xuat)
    const ATTENDANCE_STATUS_NOT_SCHOOL_YET = 7;// chua den truong
}