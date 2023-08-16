<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Yajra\DataTables\Datatables;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Services\DataTable;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = News::limit(100)->get();
        return view('news.index',compact('data'));
   
    }
    public function json()
    {
        return DataTables::of(News::limit(10))->make(true);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = News::create($request->all());
        if($request->hasFile('gambar')){
            $request->file('gambar')->move('gambarberita/',$request->file('gambar')->getClientOriginalName());
            $data->gambar =$request->file('gambar')->getClientOriginalName();
            $data->save();
        }
        

        return redirect()->route('news.index')->with('success', 'Data Berhasil Ditambahkan');



        // DB::table('news')->insert([
        //     'judul' => $request->judul,
        //     'tanggal' => $request->tanggal,
        //     'gambar' => $request->gambar,
        //     'deskripsi' => $request->deskripsi,
        //     'sumber' => $request->sumber

        // ]);

        // return redirect()->route('news.index')->with('success', 'Data Berhasil Ditambahkan');
    }



    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = News::findOrFail($id);

        // dd($data);

        return view('news.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $gambar = $request->file('gambar');

        if (is_null($gambar)) {
            $data = News::find($id);
            $data->update([
                'judul' => $request->judul,
                'tanggal' => $request->tanggal,
                'deskripsi' => $request->deskripsi,
                'sumber' => $request->sumber,
                
            ]);
            return redirect()->route('news.index')->with('success', 'Berita Berhasil Diubah');
        }

        $data = News::find($id);
        Storage::delete('public/gambarberita/' .$data->gambar);

        $originalName = $gambar->getClientOriginalName();
        $gambar->storeAs('public/gambarberita/', $originalName);
        $data->update([
            'judul' => $request->judul,
            'gambar' => $originalName,
            'tanggal' => $request->tanggal,
            'deskripsi' => $request->deskripsi,
            'sumber' => $request->sumber,
            
        ]);

        return redirect()->route('news.index')->with('success', 'Berita Berhasil Diubah');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post   = News::find($id);
        $post->delete();

        return redirect()->route('news.index')->with('success', 'Data Berhasil Dihapus');
    }
}
