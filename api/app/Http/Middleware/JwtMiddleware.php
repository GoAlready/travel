<?php

namespace App\Http\Middleware;

use Closure;
use \Firebase\JWT\JWT as JWTCHECK;
class JwtMiddleware
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
        $jwt = substr($request->server('HTTP_AUTHORIZATION'), 7);
        try
        {
            // 解析 token
            $jwt = JWTCHECK::decode($jwt, env('JWT_KEY'), array('HS256'));
            // 把解析出来的数据保存到 Request 对象中的 jwt 属性上，将来在控制器中就可能 $req->jwt 这样来获取了
            $request->jwt = $jwt;

            // 继续执行下一个中间件
            return $next($request);
        }
        catch(\Exception $e)
        {
            // 返回错误信息
            return response([
                'code'=>'403',
                'message'=>$e->getMessage()
            ]);
        }
        return $next($request);
    }
}
