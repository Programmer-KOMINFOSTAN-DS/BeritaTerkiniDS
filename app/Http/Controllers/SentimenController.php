<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Komentar;
use Illuminate\Http\Request;

class SentimenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $komentarData=Komentar::select('klasifikasi')->get();
        return view('sentimen.index');
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
        $komentarData=Komentar::select('klasifikasi')->get();
      
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
         return['x'=> $xtotal, 'y'=>$ytotal, 'z'=>$ztotal];
    }
    
    public function showLandingPage(){
        $news = News::orderBy('tanggal', 'desc')->get();
        $datagrafik = $this->grafik();
        return view('sentimen.index', compact('datagrafik','news'));
    }
}
