<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Point;
use App\Models\Leaderboard;
use App\Models\Riwayatpoin;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Redirector;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'jk' => ['required', 'string'],
            'alamat' => ['required', 'string'],
            'ktp' => ['required', 'file', 'mimes:jpeg,png,jpg,gif,svg']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        $file_upload = $data['ktp'];

        $fileName = time() . '.' . $file_upload->getClientOriginalExtension();

        $file_upload->move(public_path('uploads'), $fileName);

        $user = new User();

        $user->foto = '';
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->jk = $data['jk'];
        $user->alamat = $data['alamat'];
        $user->ktp = $fileName;
        // $user->id_point =  $user->id;
        $user->assignRole('jurnalis');
        $user->save();

        $poin = new Point();

        $poin->id_user = $user->id;
        $poin->jumlah_point = 0;
        $poin->nama_user = $data['name'];
        $poin->assignRole('jurnalis');
        $poin->save();

        $leaderboard = new Leaderboard();
        $leaderboard->user_id = $user->id;
        $leaderboard->rank = 0;
        $leaderboard->badge = 'NEW MEMBERS';
        $leaderboard->save();


        $riwayat = new Riwayatpoin();

        $riwayat->id_point = $poin->id;
        $riwayat->id_user = $user->id;
        $riwayat->jumlah_point = $poin->jumlah_point;
        $riwayat->nama_user = $poin->nama_user;
        $riwayat->keterangan = '';
        // $riwayat->assignRole('jurnalis');
        $riwayat->save();

        return $user;
    }
}
