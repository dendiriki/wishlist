<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nominal;

class NominalController extends Controller
{
    public function index()
    {
        $nominal = Nominal::all();

    return view('redaktur.nominal', ['nominal' => $nominal]);
    
    }

    public function new(Request $request)
    {
        $this->validate($request, [
            'nominal' => 'required',
            'point' => 'required',
            'variable' => 'required',
        ]);

        // dd($request->jenis);

        $nominal = Nominal::create([
            'nominal' => trim($request->nominal),
            'point'=> trim($request->point),
            'variable' => trim($request->variable),
        ]);

        if ($nominal) {
            return redirect()->route('nominal')->with(['success' => 'Success']);
        } else {
            return redirect()->route('nominal')->with(['error' => 'Failed']);
        }
    }

    public function edit($id)
    {
        $ska = Nominal::find($id);

        if (empty($ska)) {
            return redirect()->route('nominal');
        }
        // dd($ska);
        return view('redaktur.nominal-edit', ['ska' => $ska]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'nominal' => 'required',
        ]);

        $nominal = nominal::find($id);

        if (empty($nominal)) {
            return redirect()->route('nominal');
        }

        $nominal->nominal = trim($request->nominal);
        $nominal->save();

        if ($nominal) {
            return redirect()->route('nominal')->with(['success' => 'Success']);
        } else {
            return redirect()->route('nominal')->with(['error' => 'Failed']);
        }
    }

    public function delete($id)
    {
        $nominal = Nominal::find($id);

        if (empty($nominal)) {
            return redirect()->route('nominal');
        }

        $nominal->delete();

        if ($nominal) {
            return redirect()->route('nominal')->with(['success' => 'Success']);
        } else {
            return redirect()->route('nominal')->with(['error' => 'Failed']);
        }
    }
}
