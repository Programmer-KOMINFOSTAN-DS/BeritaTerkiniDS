<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use App\Models\Komentar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Coderflex\Laravisit\Models\Visit;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::orderBy('tanggal', 'desc')->get();
        $datagrafik = $this->grafik();
        $komentarData=Komentar::select('klasifikasi')->get();
        $totalkomentar = $this->getCommentCount();
        $totalberita = $this->getNewsCount();
        $totaluser = $this->getUserCount();
        $totalvisitor = $this->getVisitorCount();
        // $visitorCount = $this->getVisitorCount();

        return view('dashboard.index', compact('totalkomentar', 'totalberita', 'totaluser','komentarData','datagrafik','news','totalvisitor'));
    }

    private function getCommentCount()
    {
        return Komentar::count();
    }

    private function getNewsCount()
    {
        return News::count();
    }

    private function getUserCount() 
    {
        return User::count();
    }

    private function getVisitorCount()
    {
        return Visit::count();
    }

    // private function getVisitorCount()
    // {
    //     return Visitor::count();
    // }

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
    
    
}
