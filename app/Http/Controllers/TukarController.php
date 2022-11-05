<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Point;
use App\Models\user;
use App\Models\Notifikasi;
use App\Models\Nominal;
use App\Models\Riwayatpoin;

class TukarController extends Controller
{
    public function index($id)
    {
        $nominal = Nominal::all()->where('variable', '=', '1');
        $nominal2 = Nominal::all()->where('variable', '=', '2');
        $nominal3 = Nominal::all()->where('variable', '=', '3');
        $point = Point::find($id);
        return view('jurnalis.tukar', [
            'point' => $point, 'nominal' => $nominal, 'nominal2' => $nominal2, 'nominal3' => $nominal3
        ]);
    }

    public function limapuluh($id)
    {

        $point = Point::find($id);
        // $nama = $point->nama_user;

        return view('jurnalis.limapuluh', [
            'point' => $point,
        ]);
    }

    public function limapuluhkirim($id, Request $request)
    {



        $point = Point::find($id);
        $id_user = $point->id_user;
        $user = User::find($id_user);
        $id_point = $user->name;
        $nominal = Nominal::all()->where('variable', '=', '1')->first();
        


        // dd($nominal->variable);

        $jumlah_point = $point->jumlah_point;

        if ($jumlah_point >= 50) {

            if (empty($point)) {
                return redirect()->route('tukar');
            }

            $point = Point::with(['user'])
                ->where('nama_user', $id_point)->first();
            $point->jumlah_point -= $nominal->point;

            $point->save();

            $riwayat = new Riwayatpoin();

            $riwayat->id_point = $point->id;
            $riwayat->id_user = $user->id;
            $riwayat->jumlah_point = $point->jumlah_point;
            $riwayat->nama_user = $point->nama_user;
            $riwayat->keterangan = 'Point Publikasi Artikel berhasil di tukarkan ' . $nominal->point . ' point' ;
            // $riwayat->assignRole('jurnalis');
            $riwayat->save();

            $this->validate($request, [
                'nama_bank' => 'required',
                'no_rek' => 'required',
                'telpon' => 'required',
            ]);

            $notifikasi = new Notifikasi();

            $notifikasi->id_point = $point->id;
            $notifikasi->id_user = $user->id;
            $notifikasi->id_riwayat = $riwayat->id;
            $notifikasi->nama_bank = $request->nama_bank;
            $notifikasi->no_rek = $request->no_rek;
            $notifikasi->telpon = $request->telpon;
            $notifikasi->pesan = $riwayat->keterangan;
            $notifikasi->keterangan = 'proses';

            // $notifikasi->assignRole('jurnalis');
            $notifikasi->save();

            if ($point) {
                return redirect()->route('mypoint.jurnalis')->with(['success' => 'Success']);
            } else {
                return redirect()->route('mypoint.jurnalis')->with(['error' => 'Failed']);
            }
        } else {
            return redirect()->route('mypoint.jurnalis')->with(['error' => 'point anda tidak cukup']);
        }
    }

    public function seratus($id)
    {

        $point = Point::find($id);
        // $nama = $point->nama_user;

        return view('jurnalis.seratus', [
            'point' => $point,
        ]);
    }

    public function seratuskirim($id, Request $request)
    {



        $point = Point::find($id);
        $id_user = $point->id_user;
        $user = User::find($id_user);
        $id_point = $user->name;
        $nominal = Nominal::all()->where('variable', '=', '2')->first();

        $jumlah_point = $point->jumlah_point;

        if ($jumlah_point >= 100) {

            if (empty($point)) {
                return redirect()->route('tukar');
            }

            $point = Point::with(['user'])
                ->where('nama_user', $id_point)->first();
            $point->jumlah_point -= $nominal->point;

            $point->save();

            $riwayat = new Riwayatpoin();

            $riwayat->id_point = $point->id;
            $riwayat->id_user = $user->id;
            $riwayat->jumlah_point = $point->jumlah_point;
            $riwayat->nama_user = $point->nama_user;
            $riwayat->keterangan = 'Point Publikasi Artikel berhasil di tukarkan ' . $nominal->point . ' point' ;
            // $riwayat->assignRole('jurnalis');
            $riwayat->save();

            $this->validate($request, [
                'nama_bank' => 'required',
                'no_rek' => 'required',
                'telpon' => 'required',
            ]);

            $notifikasi = new Notifikasi();

            $notifikasi->id_point = $point->id;
            $notifikasi->id_user = $user->id;
            $notifikasi->id_riwayat = $riwayat->id;
            $notifikasi->nama_bank = $request->nama_bank;
            $notifikasi->no_rek = $request->no_rek;
            $notifikasi->telpon = $request->telpon;
            $notifikasi->pesan = $riwayat->keterangan;
            $notifikasi->keterangan = 'proses';

            // $notifikasi->assignRole('jurnalis');
            $notifikasi->save();

            if ($point) {
                return redirect()->route('mypoint.jurnalis')->with(['success' => 'Success']);
            } else {
                return redirect()->route('mypoint.jurnalis')->with(['error' => 'Failed']);
            }
        } else {
            return redirect()->route('mypoint.jurnalis')->with(['error' => 'point anda tidak cukup']);
        }
    }

    public function seratuslimapuluh($id)
    {

        $point = Point::find($id);
        // $nama = $point->nama_user;

        return view('jurnalis.seratuslimapuluh', [
            'point' => $point,
        ]);
    }

    public function seratuslimapuluhkirim($id, Request $request)
    {



        $point = Point::find($id);
        $id_user = $point->id_user;
        $user = User::find($id_user);
        $id_point = $user->name;
        $nominal = Nominal::all()->where('variable', '=', '3')->first();

        $jumlah_point = $point->jumlah_point;

        if ($jumlah_point >= 150) {

            if (empty($point)) {
                return redirect()->route('tukar');
            }

            $point = Point::with(['user'])
                ->where('nama_user', $id_point)->first();
            $point->jumlah_point -= $nominal->point;

            $point->save();

            $riwayat = new Riwayatpoin();

            $riwayat->id_point = $point->id;
            $riwayat->id_user = $user->id;
            $riwayat->jumlah_point = $point->jumlah_point;
            $riwayat->nama_user = $point->nama_user;
            $riwayat->keterangan = 'Point Publikasi Artikel berhasil di tukarkan ' . $nominal->point . ' point' ;
            // $riwayat->assignRole('jurnalis');
            $riwayat->save();

            $this->validate($request, [
                'nama_bank' => 'required',
                'no_rek' => 'required',
                'telpon' => 'required',
            ]);

            $notifikasi = new Notifikasi();

            $notifikasi->id_point = $point->id;
            $notifikasi->id_user = $user->id;
            $notifikasi->id_riwayat = $riwayat->id;
            $notifikasi->nama_bank = $request->nama_bank;
            $notifikasi->no_rek = $request->no_rek;
            $notifikasi->telpon = $request->telpon;
            $notifikasi->pesan = $riwayat->keterangan;
            $notifikasi->keterangan = 'proses';

            // $notifikasi->assignRole('jurnalis');
            $notifikasi->save();

            if ($point) {
                return redirect()->route('mypoint.jurnalis')->with(['success' => 'Success']);
            } else {
                return redirect()->route('mypoint.jurnalis')->with(['error' => 'Failed']);
            }
        } else {
            return redirect()->route('mypoint.jurnalis')->with(['error' => 'point anda tidak cukup']);
        }
    }

    public function konfrim($id)
    {
        $notifikasi = new Notifikasi();
        $notifikasi = Notifikasi::find($id);


        $notif = $notifikasi->keterangan;



        if ($notif != 'sukses'){
            $notifikasi->keterangan = 'sukses';

            // $notifikasi->assignRole('jurnalis');
            $notifikasi->save();

            return redirect()->route('mypoint.redaktur')->with(['success' => 'Success']);
        } else {
            return redirect()->route('mypoint.redaktur')->with(['error' => 'Failed']);
        }

    }
}
