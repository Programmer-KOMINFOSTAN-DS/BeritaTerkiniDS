<?php

namespace App\Http\Controllers;

//use App\Models\Visit;
use Illuminate\Http\Request;
use Coderflex\Laravisit\Models\Visit;


class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Visit::limit(100)->get();
        // Mendapatkan IP address dari pengunjung
        $visitorIp = $request->ip();
       
        Visit::create([
            'ip_address' => $visitorIp,
            // tambahkan field lain yang diperlukan
        ]);
        
        // Ambil daftar pengunjung terbaru dari model Visit
        $recentVisitors = Visit::latest()->take(10)->get();

        return view('visitor.index',compact('data'));

    }
    public function json()
    {
        return DataTables::of(Visit::limit(10))->make(true);
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
    public function show(Visit $visit)
    {
        $visit->visit()->withIP()->withSession()->withUser();
        return view('laravisits.show', compact('visit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Visit $visit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Visit $visit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visit $visit)
    {
        //
    }
}