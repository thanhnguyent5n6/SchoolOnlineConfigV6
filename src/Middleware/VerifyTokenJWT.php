<?php

namespace SchoolOnline\VerifyTokenJWT;

use Closure;
use Illuminate\Support\Facades\App;
use SchoolOnline\Config\HelperV6;

class VerifyTokenJWT
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = $request->header('authorization');
        $payload = HelperV6::getPayloadFromTokenJWT($token);
        $dataJson = !empty($payload['data']) ? $payload['data'] : [];
        if(empty($dataJson))
            return response('Bạn không có quyền thao tác', 403);

        $dataToken = json_decode($dataJson);
        $permissions = HelperV6::getPermissionsFromLayoutUnit($request->Layout, $request->UnitId, $dataToken);

        if(empty($permissions))
            return response('Bạn không có quyền truy cập tính năng nào', 403);

        App::singleton('dataToken', static function () use ($dataToken) {
            return $dataToken;
        });
        App::singleton('currentPermissions', static function () use ($permissions) {
            return $permissions;
        });

        return $next($request);
    }


}
