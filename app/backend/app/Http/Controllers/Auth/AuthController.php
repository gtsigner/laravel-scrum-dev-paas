<?php
/**
 * Created by PhpStorm.
 * User: godtoy
 * Date: 2018/3/6
 * Time: 18:13
 */

namespace App\Http\Controllers\Auth;


use App\Constants\RestfulCodes;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        //调用权限验证中间件
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $user = request(['username', 'password']);
        if (!$token = auth()->attempt($user)) {
            return response()->json([
                'status_code' => 1004,
                'message' => '授权失败'
            ]);
        }
        return response()->json($this->respondWithToken($token));
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function profile()
    {
        $user = auth()->user();
        return response()->json([
            'status_code' => 200,
            'message' => 'success',
            'data' => [
                'user' => $user
            ]
        ]);
    }

    /**
     * 注销用户
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();
        return \Response::json(['message' => 'Logout Success', 'status_code' => 200]);
    }

    /**
     * Refresh a token.
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * @param $token
     * @return array
     */
    protected function respondWithToken($token)
    {
        return [
            'status_code' => RestfulCodes::$CODES['SUCCESS'],
            'message' => 'success',
            'data' => [
                'access_token' => $token,
                'expires_in' => auth()->factory()->getTTL() * 60
            ]
        ];
    }
}