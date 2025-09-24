<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;

class LoginController extends Controller
{
    public function register(Request $request){
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'level' => 'pelanggan',
            'api_token' => '12345',
            'status' => '1',
            'relasi' => $request->input('email'),
        ];

        User::create($data);

        return response()->json($data);
    }

    public function login(Request $request){
            $email = $request->input('email');
            $password = $request->input('password');

            $user = User::where('email', $email)->first();

            if($user->password === $password){
                $token = Str::random(40);

                $user->update([
                    'api_token' => $token,
                ]);

                return response()->json([
                    'status'=> 'success',
                    'token' => $token,
                    'data' => $user,
                ]);
            } else if ($user->password != $password){
                    return response()->json([
                        'status'=> 'Password salah.',
                        'data' => '',
                ]);
            } else {
                return response()->json([
                    'status'=> 'error',
                    'data' => '',
                ]);
            }
    }
}
