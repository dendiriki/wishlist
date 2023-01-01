<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Artikelstatus;
use App\Models\Artikelsubkategori;
use App\Models\Status;
use App\Models\Kategori;
use App\Models\Subkategori;
use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Facades\Cache;
use App\Models\Commant;

class WishlistController extends Controller
{
    //
    public function index()
    {
         // artikel headline
        $art = Artikel::with(['artikelstatus', 'artikelheadline'])
        ->join('artikelstatus', 'artikelstatus.id_artikel', '=', 'artikel.id')
        ->where('id_status', 2)
        ->join('artikelheadline', 'artikelheadline.id_artikel', '=', 'artikel.id')
        ->where('id_headline', 1)->orWhere('id_headline', 3)->latest('artikel.id');

        // list artikel
        $artikel = Artikel::with(['artikelstatus', 'artikelheadline'])
        ->join('artikelstatus', 'artikelstatus.id_artikel', '=', 'artikel.id')
        ->where('id_status', 2, 'AND')
        ->join('artikelheadline', 'artikelheadline.id_artikel', '=', 'artikel.id')
        ->where('id_headline', 2)->latest('artikel.id')
        ->take(4);

        // kategori
        $subkategori = Subkategori::all();

        // user
        $users = User::take(5)->get();

        // video youtube
        /* $seconds = 3 * 60 * 60; // each 3 hours
        $youtube_cache = Cache::remember('youtube-video', $seconds, function () {
            $queryParams = [
                'channelId' => 'UCsyREEwjN2Ohn41pLwreqyA',
                // 'maxResults' => 20,
                'maxResults' => 6,
                'order' => 'date',
                'key' => 'AIzaSyBcLi2lzsRLbhTL8a0qxkw8HwEGm8zjxIE'
            ];
            $apiUrl = "https://youtube.googleapis.com/youtube/v3/search?part=snippet";
            foreach ($queryParams as $param => $value) {
                $apiUrl .= "&" . $param . "=" . $value;
            }
            $request = json_decode(file_get_contents($apiUrl));
            $youtube = collect($request->items);
            return $youtube;
        }); */
        $video = Video::take(6);

        if(request('search')){
            $art->where('judul','like','%'.request('search').'%');
            $artikel->where('judul','like','%'.request('search').'%');
            $video->where('nama','like','%'.request('search').'%');
        }



        return view('start', [
            'art' => $art->get(),
            'artikel' => $artikel->paginate(8),
            'subkategori' => $subkategori,
            'users' => $users,
            'youtube' => $video->paginate(6),
        ]);

    }

    public function kategori()
    {
    }

    public function halaman_artikel($id)
    {
        $artikel = Artikel::with(['commants', 'commants.child'])->find($id);

        return view('post', compact('artikel'));

        // $artikel = Artikel::with(['commants', 'commants.child'])->where('id', $id)->first();
        // return view('post', compact('artikel'));
    }
    

    // public function halaman_subartikel($id)
    // {
    //     $artikel = Artikel::with(['commants', 'commants.child'])->find($id);

    //     return view('post', compact('artikel'));

    //     // $artikel = Artikel::with(['commants', 'commants.child'])->where('id', $id)->first();
    //     // return view('post', compact('artikel'));
    // }

    public function commant(Request $request)
    {
        //VALIDASI DATA YANG DITERIMA
        $this->validate($request, [
            'username' => 'required',
            'commant' => 'required'
        ]);
    
        Commant::create([
            'artikel_id' => $request->id,
            //JIKA PARENT ID TIDAK KOSONG, MAKA AKAN DISIMPAN IDNYA, SELAIN ITU NULL
            'parent_id' => $request->parent_id != '' ? $request->parent_id:NULL,
            'username' => $request->username,
            'commant' => $request->commant
        ]);
        return redirect()->back()->with(['success' => 'Komentar Ditambahkan']);
    }
}

