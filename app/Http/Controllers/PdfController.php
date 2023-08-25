<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PDF;
class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
	{
	    $user = User::get();

	    $data = [
	            'nama_lengkap' => 'How To Create PDF File Using DomPDF In Laravel 9 - Techsolutionstuff',
	            'email' => email,
	            'role' => email,
	            'email' => email,
	            
	    ];

	    if($request->has('download'))
	    {
	        $pdf = PDF::loadView('index',$data);
	        return $pdf->download('users_pdf_example.pdf');
	    }

	    return view('index',compact('user'));
	}
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
}
