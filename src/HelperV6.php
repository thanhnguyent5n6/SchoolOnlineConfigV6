<?php


namespace SchoolOnline\Config;


use Carbon\Carbon;

class HelperV6
{
    /**
     * @param $token
     * @return array
     */
    public static function parseTokenJWT($token = "")
    {
        try {
            $tokenParts = explode(".", $token);
            $tokenHeader = base64_decode($tokenParts[0]);
            $tokenPayload = base64_decode($tokenParts[1]);
            $jwtHeader = (array) json_decode($tokenHeader);
            $jwtPayload = (array) json_decode($tokenPayload);
            return array(
                'header' => $jwtHeader,
                'payload' => $jwtPayload,
            );
        } catch (\Exception $exception) {
            return array(
                'header' => [],
                'payload' => [],
            );
        }
    }

    public static function getPayloadFromTokenJWT($token = "")
    {
        $data = self::parseTokenJWT($token);
        return $data['payload'] ?? [];
    }

    public static function getPermissionsFromLayoutUnit($layoutCode, $unitId, $dataToken)
    {
        $permissions = [];
        foreach($dataToken->Layouts as $layout) {
            if($layout->Code != $layoutCode)
                continue;

            foreach($layout->Units as $unit) {
                if($unit->Id != $unitId)
                    continue;

                foreach($unit->Permissions as $permission) {
                    $permissions[] = $permission;
                }
            }
        }
        return $permissions;
    }

    public static function fireBaseSuccessMessage($message)
    {
        return json_encode(array(
            'status' => true,
            'message' => $message,
            'time' => Carbon::now()->timestamp
        ));
    }

    public static function fireBaseErrorMessage($message)
    {
        return json_encode(array(
            'status' => false,
            'message' => $message,
            'time' => Carbon::now()->timestamp
        ));
    }
}