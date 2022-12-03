<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class APIAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','cusomerRegister']]);
    }

    public function cusomerRegister(Request $request){
        $user = new User();
        $user->name=$request->userName;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->type="user";
        $user->status=1;
        $user->phone=$request->phone;
        $user->address=$request->address;
        $user->save();
        return response()->json(['message' => 'Successfully Registered']);
    }

    public function test(){
        return "test";
    }
    public function login(Request $request)
    {
//        return $request;
        $credentials = $request->only('email', 'password');


        $user = User::where('email', $request->email)->where('type', 'user')
            ->first();
        if ($user && Hash::check($request->password, $user->password)) {
            $token = $this->guard('api')->login($user);
            return $this->respondWithToken($token);
        }


//        if ($token = $this->guard('api')->attempt($credentials)) {
//            return $this->respondWithToken($token);
//        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    public function me()
    {
        return response()->json($this->guard('api')->user());
    }


    /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $this->guard('api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken($this->guard('api')->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard('api')->factory()->getTTL() * 60
        ]);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard()
    {
        return Auth::guard('api');
    }
}
