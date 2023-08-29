<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use PHPInsight\Sentiment;
use PHPInsight\Autoloader;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class KomentarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $komentardesc = Komentar::orderBy('created_at', 'desc')->limit(100)->get();
        $komentar = Komentar::orderBy('created_at', 'desc')->limit(100)->get();
        require_once app_path("Path/To/PHPInsight/Autoloader.php");
        Autoloader::register();

        $sentiment = new Sentiment();

        foreach ($komentar as $comment) {
            $text = $comment->komentar;

            $scores = $sentiment->score($text);

            // Find the highest sentiment score (positive or negative)
            $highestScore = max($scores);

            // Determine the classification based on the highest sentiment score
            $threshold = 1.0; // Adjust the threshold as needed
            if ($highestScore == $scores['netral']) {
                $categoryLabel = 'Netral';
            } elseif ($highestScore == $scores['positif']) {
                $categoryLabel = 'Positif';
            } else {
                $categoryLabel = 'Negatif';
            }


            Komentar::where('id', $comment->id)->update([
                'nilaisentimen' => json_encode($scores),
                'klasifikasi' => $categoryLabel,
            ]);
        }

        return view('komentar.index', compact('komentar'));
    }

    private function analyzeSentiment($text)
    {

        require_once app_path("Path/To/PHPInsight/Autoloader.php");
        Autoloader::register();

        $sentiment = new Sentiment();

        $scores = $sentiment->score($text);
        $highestScore = max($scores);

        $threshold = 1.0; // Adjust the threshold as needed
        if ($highestScore == $scores['netral']) {
            $categoryLabel = 'Netral';
        } elseif ($highestScore == $scores['positif']) {
            $categoryLabel = 'Positif';
        } else {
            $categoryLabel = 'Negatif';
        }

        $result = [
            'klasifikasi' => $categoryLabel,
            'scores' => $scores,
        ];

        return $result;
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
        $request->validate([
            'news_id' => 'required|exists:news,id',
            'nama' => 'required|string|max:255',
            'komentar' => 'required|string',
        ]);

        $news = News::findOrFail($request->input('news_id'));

        $comment = new Komentar();
        $comment->nama = $request->input('nama');
        $comment->komentar = $request->input('komentar');

        // Menggunakan relasi untuk menyimpan komentar pada berita yang sesuai
        $news->komentars()->save($comment);

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan.');
    }

    public function postkomentar(Request $request)
    {
        $request->validate([
            'news_id' => 'required|exists:news,id',
            'komentar' => 'required|string',
        ]);

        // Mengambil berita berdasarkan ID yang ada dalam form
        $news = News::findOrFail($request->input('news_id'));

        $comment = new Komentar();
        $comment->user_id = auth()->user()->id;
        $comment->nama = auth()->user()->nama_lengkap;
        $comment->news_id = $news->id; // Menggunakan ID berita yang sesuai
        $comment->komentar = $request->input('komentar');
        // Melakukan analisis sentimen (gunakan method analyzeSentiment jika diperlukan)
        $sentiment = $this->analyzeSentiment($comment->komentar);
        $comment->klasifikasi = $sentiment['klasifikasi']; // Memberikan nilai untuk kolom 'klasifikasi'
        $comment->nilaisentimen = json_encode($sentiment['scores']);

        // Simpan komentar
        $comment->save();

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan.');
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
