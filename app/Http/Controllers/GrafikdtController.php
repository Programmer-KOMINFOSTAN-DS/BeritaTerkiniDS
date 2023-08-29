<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Komentar;
use Illuminate\Http\Request;
use Coderflex\Laravisit\Models\Visit;


class GrafikdtController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $komentarData = Komentar::select('klasifikasi')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function grafik()
    {
        $komentarData = Komentar::select('klasifikasi')->get();

        $xtotal = 0;
        $ytotal = 0;
        $ztotal = 0;

        foreach ($komentarData as $komentar) {
            $klasifikasi = $komentar->klasifikasi;

            // Menghitung kata "Positif" dan "Negatif" menggunakan regex
            $xtotal += preg_match_all('/\bPositif\b/i', $klasifikasi);
            $ytotal += preg_match_all('/\bNegatif\b/i', $klasifikasi);
            $ztotal += preg_match_all('/\bNetral\b/i', $klasifikasi);
        }

        // Menyimpan nilai x dan y dalam variabel
        return ['x' => $xtotal, 'y' => $ytotal, 'z' => $ztotal];
    }

    public function showLandingPage(Request $request)
    {
        $news = News::orderBy('tanggal', 'desc')->get();
        $datagrafik = $this->grafik();
        // Mendapatkan IP address dari pengunjung
        $visitorIp = $request->ip();
        // die(print_r($visitorIp));
        // Simpan informasi kunjungan ke database
        Visit::create([
            'ip_address' => $visitorIp,
            // tambahkan field lain yang diperlukan
        ]);
        return view('landingpage', compact('datagrafik', 'news'));
    }

    // public function showLandingPage(Request $request)
    // {
    //     $news = News::orderBy('tanggal', 'desc')->get();
    //     $datagrafik = $this->grafik();

    //     // Mendapatkan IP address dari pengunjung
    //     $visitorIp = $request->ip();

    //     // Cek apakah IP address sudah ada dalam database
    //     $existingVisit = Visit::where('ip_address', $visitorIp)->first();

    //     if (!$existingVisit) {
    //         // IP address belum ada, maka simpan informasi kunjungan ke database
    //         Visit::create([
    //             'ip_address' => $visitorIp,
    //             // tambahkan field lain yang diperlukan
    //         ]);
    //     }

    //     return view('landingpage', compact('datagrafik', 'news'));
    // }
}
