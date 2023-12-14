<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $response = Http::post('http://127.0.0.1:3000/api/login', [
            'email' => $email,
            'password' => $password
        ]);
        $response = json_decode($response);
        // dd($response);

        if ($response->message == 'Login success') {
            $user = new User($response->id_user, '', $response->role);
            // session()->put('id_user', $user->id);
            session(['id_user' => $user->id]);

            if ($response->role != '1') {
                // Redirect to user dashboard for roles other than admin
                return redirect()->route('user.dashboard');
            }

            // Auth::login($user, $remember = true);
            // dd(Auth::user());
            // dd(session('id_user'));
            return redirect()->route('admin.dashboard');
        }
        return view('/login/index');
    }

    public function logout(Request $request, string $id)
    {
        // $email = $request->input('email');
        // dd($id);
        // dd($request);

        $response = Http::post('http://127.0.0.1:3000/api/logout', [
            'id' => $id
        ]);

        return redirect('/login');
    }

    public function register(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $prodi = $request->input('prodi');
        $role = $request->input('role');

        $response = Http::post('http://127.0.0.1:3000/api/register', [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'prodi' => $prodi,
            'role' => $role
        ]);
        $response = json_decode($response);
        // dd($response);
        if ($response->token_type == 'Bearer') {
            return view('/login/index');
        }
        return view('/register/index');
    }
}
