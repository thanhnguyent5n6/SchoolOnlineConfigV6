<?php 

class SchoolOnlineConfig
{
    /**
     * @param String $token
     * @return array
     */
    public function parseTokenJWT(String $token)
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
        } catch (Exception $exception) {
            return array(
                'header' => [],
                'payload' => [],
            );
        }
    }
}

?>