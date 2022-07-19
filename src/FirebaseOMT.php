<?php


namespace SchoolOnline\Config;


use Carbon\Carbon;

class FirebaseOMT
{
    const CREATE_TENANT = 'tenant-manager/update';
    const UPDATE_TENANT = 'tenant-manager/update';
    const CREATE_MENU_ITEM = 'menu-item/create';
    const UPDATE_MENU_ITEM = 'menu-item/update';
    const CREATE_MENU_PACKAGE = 'menu-package/create';
    const UPDATE_MENU_PACKAGE = 'menu-package/update';
    const CREATE_SUBJECT = 'subject/create';
    const UPDATE_SUBJECT = 'subject/update';
    const DELETE_SUBJECT = 'subject/delete';
    const CREATE_CIRCULAR_ITEM = 'circular-item/create';
    const UPDATE_CIRCULAR_ITEM = 'circular-item/update';

    /**
     * @param string $userId
     * @param string $path , from FirebaseReference
     * @param string $message
     * @param bool $status
     * @return bool
     */
    public static function addFirebase(string $userId, string $path, string $message, bool $status)
    {
        try {
            $firebase = app('firebase.database');
            if (empty($firebase))
                return false;
            $path .= "/" . md5($userId);
            $data = json_encode([
                'status'  => $status,
                'message' => $message,
                'time'    => Carbon::now()->timestamp
            ]);
            $firebase->getReference($path)->push($data);
            return true;
        } catch (\Exception $exception) {
            return false;
        }
    }
}
