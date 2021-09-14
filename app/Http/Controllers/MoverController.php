<?php

namespace App\Http\Controllers;

use App\Exports\MoverExport;
use App\Imports\MoverImport;
use App\Models\Mover;
use App\Models\Villager;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MoverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movers = Mover::get();

        if (request()->get('name') && request()->get('name') != null) {
            $movers = $movers->where('name', '=', request()->get('name'));
        }

        return view('pages.moves.index')->with([
            'movers' => $movers
        ]);
    }

    public function filterreset()
    {
        return redirect()->route('move.index');
    }

    public function export()
    {
        return Excel::download(new MoverExport, 'Mover.xlsx');
    }

    public function import()
    {
        return view('pages.moves.import');
    }

    public function storeImport(Request $request)
    {
        Excel::import(new MoverImport, $request->file('excel'));

        return redirect()->route('move.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movers = Villager::where('status', 'ada')->get();

        return view('pages.moves.create')->with([
            'movers' => $movers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $item = Villager::findOrFail($request->villager_id);
        $item->status = 'pindah';
        $item->save();
        
        Mover::create($data);

        return redirect()->route('move.index')->with('success', 'Tambah data berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movers = Mover::find($id);
        $names = Mover::get();

        return view('pages.moves.edit')->with([
            'movers' => $movers,
            'names' => $names
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Mover::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('move.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mover::whereId($id)->delete();

        return redirect()->route('move.index')->with('success', 'Data berhasil dibuat');
    }
}
