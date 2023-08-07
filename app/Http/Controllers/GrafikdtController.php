<?php

namespace App\Http\Controllers;

use App\Models\Tanggapan as ModelsTanggapan;
use Illuminate\Http\Request;
use App\Models\Tanggapan;

class GrafikdtController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_tanggapan=Tanggapan::all();
       
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
        $datapos =Tanggapan::pluck('positive')->all();
        $datanev =Tanggapan::pluck('negative')->all();

        return ['x'=>$datapos, 'y'=>$datanev];

    }
    public function showLandingPage(){

        $datagrafik = $this->grafik();
        return view('landingpage', compact('datagrafik'));
    }
}
