<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function dashboard()
    {
        // dd(session('id_user'));
        return view('dashboard.index');
    }

    public function lacak()
    {
        $response = Http::get('http://127.0.0.1:3000/api/permohonan');
        $letters = $response->json()['data'] ?? [];

        // Simpan data di sesi
        session(['letters' => $letters]);

        return view('lacak.index');
    }

    public function permohonan(Request $request)
    {

        // $userId = session('id_user');
        // session(['id_user' => $user->id]);


        $pilihanSurat = $request->input('pilihanSurat');

        $data = [];

        if ($pilihanSurat == 'Surat Berhenti Studi') {
            $data = $request->only([
                'name', 'nim', 'pilihanProdi', 'pilihanSurat', 'nomorTelepon', 'isiSurat',
                'status']);
            $data['semester'] = $request->input('additionalFieldsSurat1');
        } else if ($pilihanSurat == 'Surat Cuti') {
            $data = $request->only([
                'name', 'nim', 'pilihanProdi', 'pilihanSurat', 'cuti', 'nomorTelepon', 'isiSurat',
                'status']);
            $data['semester'] = $request->input('additionalFieldsSurat2');
        } else {
            $data = $request->only([
                'name', 'nim', 'pilihanProdi', 'pilihanSurat', 'nomorTelepon', 'isiSurat',
                'status']);
            $data['semester'] = $request->input('additionalFieldsSurat3');
        }


        $response = Http::post('http://127.0.0.1:3000/api/permohonan', $data);
        $response = $response->json();

        // dd($response);
        // $id_user = session('id_user');
        // dd($id_user->id);


        if ($response['message'] == 'Sukses') {
            // Redirect back to the dashboard
            return redirect()->route('user.dashboard');
        } else {
            // If the request was not successful, handle accordingly
            return redirect()->route('user.dashboard')->with('error', 'Gagal mengirim permohonan. Silakan coba lagi.');
        }
    }

}
