<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use PHPInsight\Sentiment;
use PHPInsight\Autoloader;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class KomentarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $komentar = Komentar::limit(100)->get();

        require_once app_path("Path/To/PHPInsight/Autoloader.php");
        Autoloader::register();
        
        $sentiment = new Sentiment();
        
        foreach ($komentar as $comment) {
            $text = $comment->komentar;
            
            $scores = $sentiment->score($text);
            $category = $sentiment->categorise($text);

            if ($category == 'pos' || $category == 'neu') {
                $categoryLabel = 'Positif';
            } else {
                $categoryLabel = 'Negatif';
            }

            Komentar::where('id', $comment->id)->update([
              
                'nilaisentimen' => json_encode($scores),
                'klasifikasi' => $categoryLabel
            ]);
        }

        return view('komentar.index', compact('komentar'));
    }





    public function json()
    {
        return DataTables::of(Komentar::limit(10))->make(true);
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
        $post   = Komentar::find($id);
        $post->delete();

        return redirect()->route('komentar.index')->with('success', 'Data Berhasil Dihapus');
    }
}
