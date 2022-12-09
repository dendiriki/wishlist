<?php

namespace App\Http\Controllers;

use App\Models\Commant;
use Illuminate\Http\Request;


class CommantController extends Controller
{
//     public function comment(Request $request)
// {
//     //VALIDASI DATA YANG DITERIMA
//     $this->validate($request, [
//         'username' => 'required',
//         'comment' => 'required'
//     ]);

//     Commant::create([
//         'post_id' => $request->id,
//         //JIKA PARENT ID TIDAK KOSONG, MAKA AKAN DISIMPAN IDNYA, SELAIN ITU NULL
//         'parent_id' => $request->parent_id != '' ? $request->parent_id:NULL,
//         'username' => $request->username,
//         'comment' => $request->comment
//     ]);
//     return redirect()->back()->with(['success' => 'Komentar Ditambahkan']);
// }

}
