<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        // $address = new Address([
        //     'country_id' => 82,
        //     'postal_code' => $request->postalCode,
        //     'city' => $request->city,
        //     'street' => $request->street,
        //     'housenumber' => $request->housenumber
        // ]);
        // $address->save();

        // $person = new Person([
        //     'address_id' => $address->id,
        //     'first_name' => $request->firstName,
        //     'last_name' => $request->lastName,
        //     'birthday' => $request->birthday,
        //     'birthday_place' => $request->birthdayPlace,
        // ]);
        // $person->save();

        $user = new User([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // 'person_id' => $person->id,
            // 'picture' => $request->picture
        ]);
        $user->save();

        return $user;
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if ($token = $this->guard()->attempt($credentials)) {
            $user = Auth::user();
            $user->token = $token;
            return response()->json([
                'status' => 'success',
                'user' => $user
            ], 200)->header('Authorization', $token);
        }
        return response()->json(['error' => 'login_error'], 401);
    }

    public function logout()
    {
        $this->guard()->logout();
        return response()->json([
            'status' => 'success',
            'msg' => 'Logged out Successfully.'
        ], 200);
    }

    public function user(Request $request)
    {
        $user = User::find(Auth::user()->id);
        return response()->json([
            'status' => 'success',
            'user' => $user
        ]);
    }

    public function refresh()
    {
        if ($token = $this->guard()->refresh()) {
            $user = Auth::user();
            $user->token = $token;
            return response()
                ->json(['status' => 'successs'], 200)
                ->header('Authorization', $token);
        }
        return response()->json(['error' => 'refresh_token_error'], 401);
    }

    private function guard()
    {
        return Auth::guard();
    }
}
