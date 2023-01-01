<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Artikelstatus;
use App\Models\Artikelsubkategori;
use App\Models\Leaderboard;
use App\Models\Point;
use App\Models\Status;
use App\Models\Subkategori;
use App\Models\User;
use App\Models\Riwayatpoin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RiwayatPoint;

class RedakturController extends Controller
{
    public function view($id)
    {
        $artikel = Artikel::find($id);
        $user = User::all();
        $artikelstatus = Artikelstatus::all();
        $status = Status::all();
        $artikelsubkategori = Artikelsubkategori::all();
        $subkategori = Subkategori::all();
        // dd($artikel);


        if (empty($artikel)) {
            return redirect()->route('artikel');
        }
        // else{
        //     $artikel = Artikel::with(['user', 'artikelstatus.status'])->get();
        // }
        return view('redaktur.viewartikel', [
            'artikel' => $artikel,
            'user' => $user,
            'artikelstatus' => $artikelstatus,
            'status' => $status,
            'artikelsubkategori' => $artikelsubkategori,
            'subkategori' => $subkategori
        ]);
    }

    public function edit($id)
    {
        $artikel = Artikel::find($id);
        $subkategori = Subkategori::all();
        $artikelsubkategori = Artikelsubkategori::with(['artikel', 'subkategori'])
            ->where('id_artikel', $id)->first();
        // $status = Status::all();
        // $user = User::all();

        if (empty($artikel)) {
            return redirect()->route('home');
        }

        return view('redaktur.verifikasiedit', [
            'artikel' => $artikel,
            'subkategori' => $subkategori,
            'artikelsubkategori' => $artikelsubkategori,
            // 'status' => $status,
            // 'users' => $user
        ]);
    }

    public function update($id, Request $request)
    {
        $artikel = Artikel::find($id);

        if (empty($artikel)) {
            return redirect()->route('myartikel');
        }

        // dd($request->all());
        // $status = 1;
        // if (isset($request->draft)) {
        //     $status = 3;
        // }
        // if (isset($request->kirim)) {
        //     $status = 2;
        // }
        $this->validate($request, [
            'judul' => 'required',
            'thumb' => 'file|mimes:jpeg,png,jpg,gif,svg',
            'isi' => 'required',
        ]);

        $file_upload = $request->file('thumb');

        if ($file_upload) {


            $fileName = time() . '.' . $file_upload->getClientOriginalExtension();

            $file_upload->move(public_path('uploads'), $fileName);

            $artikel->thumb = $fileName;
        }

        $artikel->judul = $request->judul;
        $artikel->isi = $request->isi;

        $artikelsubkategori = Artikelsubkategori::with(['artikel', 'subkategori'])
            ->where('id_artikel', $id)->first();
        $artikelsubkategori->id_artikel = $artikel->id;
        $artikelsubkategori->id_subkategori = trim($request->id_subkategori);

        $artikelstatus = Artikelstatus::with(['artikel', 'status'])
            ->where('id_artikel', $id)->first();
        $artikelstatus->id_artikel = $artikel->id;
        $artikelstatus->id_status = 2;

        $artikel->save();
        $artikelsubkategori->save();
        $artikelstatus->save();

        if ($artikel && $artikelsubkategori && $artikelstatus) {
            return redirect()->route('publish')->with(['success' => 'Success']);
        } else {
            return redirect()->route('publish')->with(['error' => 'Failed']);
        }
    }

    public function tolak($id)
    {
        $artikel = Artikel::find($id);

        if (empty($artikel)) {
            return redirect()->route('home');
        }

        return view('redaktur.alasan', ['artikel' => $artikel]);
    }

    public function alasan($id, Request $request)
    {
        $artikel = Artikel::find($id);

        if (empty($artikel)) {
            return redirect()->route('home');
        }
        $this->validate($request, [
            'keterangan' => 'required',
        ]);

        $artikel->keterangan = $request->keterangan;

        $artikelstatus = Artikelstatus::with(['artikel', 'status'])
            ->where('id_artikel', $id)->first();
        $artikelstatus->id_artikel = $artikel->id;
        $artikelstatus->id_status = 4;

        $artikel->save();
        $artikelstatus->save();

        if ($artikel && $artikelstatus) {
            return redirect()->route('home')->with(['success' => 'Success']);
        } else {
            return redirect()->route('home')->with(['error' => 'Failed']);
        }
    }

    public function publish($id)
    {
        // dd($id);
        $artikel = Artikel::find($id);

        $id_user = $artikel->id_user;

        $user = User::find($id_user);


        $id_point = $user->name;
        $user_id = $user->id;



        if (empty($artikel)) {
            return redirect()->route('home');
        }



        $artikelstatus = Artikelstatus::with(['artikel', 'status'])
            ->where('id_artikel', $id)->first();
        $artikelstatus->id_artikel = $artikel->id;
        $artikelstatus->id_status = 2;

        $artikelstatus->save();


        $point = Point::with(['user'])
            ->where('nama_user', $id_point)->first();
        $point->jumlah_point += 10;

        $point->save();

        $riwayat = new Riwayatpoin();

        $riwayat->id_point = $point->id;
        $riwayat->id_user = $user->id;
        $riwayat->jumlah_point = $point->jumlah_point;
        $riwayat->nama_user = $point->nama_user;
        $riwayat->keterangan = 'Point Publikasi Artikel berhasil di Tambahakan Senilai 10';
        // $riwayat->assignRole('jurnalis');
        $riwayat->save();

         
        $leaderboard = Leaderboard::with(['user'])
            ->where('user_id', $user_id)->first();
       
        $leaderboard->rank += 1;

       
        
      
        if ($leaderboard->rank == 5) {

            $leaderboard->badge ='SENIOR WRITER';

        }if ($leaderboard->rank == 10){

            $leaderboard->badge ='PROFESSIONAL WRITER';

        }if($leaderboard->rank >= 10 ){

            $leaderboard->badge ='LEGEND WRITER';

        }else{

             $leaderboard->badge ='JUNIOR WRITER';

        }

        $leaderboard->save();



        if ($artikelstatus && $point) {
            return redirect()->route('publish')->with(['success' => 'Success']);
        } else {
            return redirect()->route('publish')->with(['error' => 'Failed']);
        }
    }



    // public function point($user)
    // {


    //     $point = User::find($user);

    //     // $dbpoint = new Point();

    //     // $jumlah_point = $dbpoint['jumlah_point'];

    //     $id_user = $point->id_point;


    //     // if (empty($point)) {
    //     //     return redirect()->route('home');
    //     // }
    //     // $userdb = new User();

    //     // $id_user =




    //     $point_masuk = Point::with(['user'])
    //         ->where('id', $id_user)->first();
    //     $point_masuk->jumlah_point = +10;


    //     $point_masuk->save();

    //     if ($point_masuk) {
    //         return redirect()->route('publish')->with(['success' => 'Success']);
    //     } else {
    //         return redirect()->route('publish')->with(['error' => 'Failed']);
    //     }
    // }
}
