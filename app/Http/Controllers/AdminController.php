<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        // dd(session('id_user'));
        return view('dashboardAdmin.index');
    }

    public function viewdetail()
    {
        $response = Http::get('http://127.0.0.1:3000/api/permohonan');
        $letters = $response->json()['data'] ?? [];

        // Simpan data di sesi
        session(['letters' => $letters]);

        return view('detail.index');
    }


    public function approv(Request $request)
    {

        if (!empty($request->only('id'))) {
            $response = Http::post('http://127.0.0.1:3000/api/permohonan/approv',
                $request->only('id')
            );
            $response = json_decode($response);
        }
        return redirect()->route('admin.detail');
    }

    public function reject(Request $request)
    {
        // $email = $request->input('email');
        // $password = $request->input('password');

        if (!empty($request->only('id'))) {
            $response = Http::post('http://127.0.0.1:3000/api/permohonan/reject',
                $request->only('id')
            );
            $response = json_decode($response);
        }
        return redirect()->route('admin.detail');
    }

    public function generate(Request $request)
    {
        // $email = $request->input('email');
        // $password = $request->input('password');

        if (!empty($request->only('id'))) {
            $response = Http::post('http://127.0.0.1:3000/api/generate',
                $request->only('id')
            );
            $document = $response->body();
            $headers = [
                "Content-type" => "application/msword",
                "Content-length" => strlen($document),
                "Content-disposition" => "inline; filename=surat.doc"
            ];
            return response($document, headers: $headers);
        }
        return redirect()->route('admin.detail');

    }


}
