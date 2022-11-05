<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Point;
use App\Models\Riwayatpoin;
use App\Models\Artikelheadline;
use App\Models\Artikelstatus;
use App\Models\Artikelsubkategori;
use App\Models\Headline;
use App\Models\Status;
use App\Models\Subkategori;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArtikelRedakturController extends Controller
{
    //add artikel
    public function add()
    {
        $subkategori = Subkategori::all();
        $status = Status::all();
        $user = User::all();
        $headline = Headline::all();
        return view('redaktur.artikel-add', ['subkategori' => $subkategori, 'status' => $status, 'user' => $user, 'headline' => $headline]);
    }

    function newDraft(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'thumb' => 'required|file|mimes:jpeg,png,jpg,gif,svg',
            'isi' => 'required',
        ]);

        $file_upload = $request->file('thumb');

        $fileName = time() . '.' . $file_upload->getClientOriginalExtension();

        $file_upload->move(public_path('uploads'), $fileName);

        $artikel = Artikel::create([
            'judul' => $request->judul,
            'thumb' =>  $fileName,
            'isi' => $request->isi,
            'id_user' => Auth::user()->id,
        ]);

        $artikelsubkategori = Artikelsubkategori::create([
            'id_artikel' => $artikel->id,
            'id_subkategori' => trim($request->id_subkategori),
        ]);

        $artikelstatus = Artikelstatus::create([
            'id_artikel' => $artikel->id,
            'id_status' => 3,
        ]);

        $artikelheadline = Artikelheadline::create([
            'id_artikel' => $artikel->id,
            'id_headline' => trim($request->id_headline),
        ]);

        if ($artikel && $artikelsubkategori && $artikelstatus && $artikelheadline) {
            return redirect()->route('myartikel')->with(['success' => 'Success']);
        } else {
            return redirect()->route('myartikel')->with(['error' => 'Failed']);
        }
    }

    function newPublish(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'thumb' => 'required|file|mimes:jpeg,png,jpg,gif,svg',
            'isi' => 'required',
        ]);

        $file_upload = $request->file('thumb');

        $fileName = time() . '.' . $file_upload->getClientOriginalExtension();

        $file_upload->move(public_path('uploads'), $fileName);

        $artikel = Artikel::create([
            'judul' => $request->judul,
            'thumb' =>  $fileName,
            'isi' => $request->isi,
            'id_user' => Auth::user()->id,
        ]);

        $artikelsubkategori = Artikelsubkategori::create([
            'id_artikel' => $artikel->id,
            'id_subkategori' => trim($request->id_subkategori),
        ]);

        $artikelstatus = Artikelstatus::create([
            'id_artikel' => $artikel->id,
            'id_status' => 2,
        ]);

        $artikelheadline = Artikelheadline::create([
            'id_artikel' => $artikel->id,
            'id_headline' => trim($request->id_headline),
        ]);

        if ($artikel && $artikelsubkategori && $artikelstatus && $artikelheadline) {
            return redirect()->route('myartikel')->with(['success' => 'Success']);
        } else {
            return redirect()->route('myartikel')->with(['error' => 'Failed']);
        }
    }


    //edit artikel
    public function edit($id)
    {
        $subkategori = Subkategori::all();
        $headline = Headline::all();
        $artikel = Artikel::find($id);
        $artikelsubkategori = Artikelsubkategori::with(['artikel', 'subkategori'])
            ->where('id_artikel', $id)->first();
        $artikelheadline = Artikelheadline::with(['artikel', 'headline'])
            ->where('id_artikel', $id)->first();

        if (empty($artikel)) {
            return redirect()->route('artikel');
        }

        return view('redaktur.artikel-edit', [
            'artikel' => $artikel,
            'subkategori' => $subkategori,
            'artikelsubkategori' => $artikelsubkategori,
            'headline' => $headline,
            'artikelheadline' => $artikelheadline
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

        $artikelheadline = Artikelheadline::with(['headline'])
            ->where('id_artikel', $id)->first();
        $artikelheadline->id_artikel = $artikel->id;
        $artikelheadline->id_headline = trim($request->id_headline);

        if($artikelheadline->id_headline =3){

            $artikel = Artikel::find($id);

            $id_user = $artikel->id_user;
    
            $user = User::find($id_user);
    
    
            $id_point = $user->name;
    
    
    
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
            $riwayat->keterangan = 'Point headline Artikel berhasil di Tambahakan Senilai 10';
            // $riwayat->assignRole('jurnalis');
            $riwayat->save();
        }

        $artikel->save();
        $artikelsubkategori->save();
        $artikelstatus->save();
        $artikelheadline->save();

        if ($artikel && $artikelsubkategori && $artikelstatus && $artikelheadline) {
            return redirect()->route('myartikel')->with(['success' => 'Success']);
        } else {
            return redirect()->route('myartikel')->with(['error' => 'Failed']);
        }
    }

    public function updateDraft($id, Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'thumb' => 'file|mimes:jpeg,png,jpg,gif,svg',
            'isi' => 'required',
        ]);

        $artikel = Artikel::find($id);

        if (empty($artikel)) {
            return redirect()->route('myartikel');
        }

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
        $artikelsubkategori->id_subkategori = $request->id_subkategori;

        $artikelstatus = Artikelstatus::with(['artikel', 'status'])
            ->where('id_artikel', $id)->first();
        $artikelstatus->id_artikel = $artikel->id;
        $artikelstatus->id_status = 3;

        $artikelheadline = Artikelheadline::with(['headline'])
            ->where('id_artikel', $id)->first();
        $artikelheadline->id_artikel = $artikel->id;
        $artikelheadline->id_headline = $request->id_headline;

        if($artikelheadline->id_headline =3){

            $artikel = Artikel::find($id);

            $id_user = $artikel->id_user;
    
            $user = User::find($id_user);
    
    
            $id_point = $user->name;
    
    
    
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
            $riwayat->keterangan = 'Point headline Artikel berhasil di Tambahakan Senilai 10';
            // $riwayat->assignRole('jurnalis');
            $riwayat->save();
        }

        $artikel->save();
        $artikelsubkategori->save();
        $artikelstatus->save();
        $artikelheadline->save();

        if ($artikel && $artikelsubkategori && $artikelstatus && $artikelheadline) {
            return redirect()->route('myartikel')->with(['success' => 'Success']);
        } else {
            return redirect()->route('myartikel')->with(['error' => 'Failed']);
        }
    }
}
