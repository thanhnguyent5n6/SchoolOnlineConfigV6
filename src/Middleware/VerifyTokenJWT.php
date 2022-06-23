<?php

namespace App\Http\Middleware;

use App\Libs\CommonLib;
use Carbon\Carbon;
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
        $layout = $request->header('Layout');
        $unit_id = $request->header('UnitId');
        $payload = HelperV6::getPayloadFromTokenJWT($token);
        $dataJson = $payload['data'] ?? null;
        $expTime = !empty($payload['exp']) ? Carbon::createFromTimestamp($payload['exp']) : null;

        if(empty($dataJson))
            return response('Bạn không có quyền thao tác', 403);
        if(empty($layout))
            return response('Thiếu thông tin Layout gửi lên', 403);
        if(empty($unit_id))
            return response('Thiếu thông tin Đơn vị gửi lên', 403);
        if(is_null($expTime) || $expTime->lt(Carbon::now()))
            return response('Đã hết hạn phiên đăng nhập', 403);

        $dataToken = json_decode($dataJson);
        $permissions = HelperV6::getPermissionsFromLayoutUnit($layout, $unit_id, $dataToken);

        if(empty($permissions))
            return response('Bạn không có quyền truy cập quyền hoặc đơn vị này', 403);

        App::singleton('dataToken', static function () use ($dataToken) {
            return $dataToken;
        });
        App::singleton('currentPermissions', static function () use ($permissions) {
            return $permissions;
        });

        return $next($request);
    }
}