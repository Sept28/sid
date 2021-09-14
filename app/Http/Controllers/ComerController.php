<?php

namespace App\Http\Controllers;

use App\Exports\ComerExport;
use App\Imports\ComerImport;
use App\Models\Comer;
use App\Models\Villager;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ComerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $comers = Comer::get();

        if (request()->get('id') && request()->get('id') != null) {
            $comers = $comers->where('id', '=', request()->get('id'));
        }

        if (request()->get('gender') && request()->get('gender') != null) {
            $comers = $comers->where('gender', '=', request()->get('gender'));
        }

        return view('pages.comer.index')->with([
            'comers' => $comers
        ]);
    }

    public function filterreset()
    {
        return redirect()->route('comer.index');
    }

    public function export()
    {
        return Excel::download(new ComerExport, 'Comer.xlsx');
    }

    public function import()
    {
        return view('pages.comer.import');
    }

    public function storeImport(Request $request)
    {
        Excel::import(new ComerImport, $request->file('excel'));

        return redirect()->route('comer.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reporters = Villager::get();
        return view('pages.comer.create')->with([
            'reporters' => $reporters
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
        Comer::create($request->all());

        return redirect()->route('comer.index')->with('success', 'Berhasil pendatang baru');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comers = Comer::find($id);

        return view('pages.comer.show')->with([
            'comers' => $comers
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reporters = Villager::get();
        $comers = Comer::find($id);  
        return view('pages.comer.edit')->with([
            'reporters' => $reporters,
            'comers' => $comers
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
        $data = Comer::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('comer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comer::whereId($id)->delete();

        return redirect()->route('comer.index');
    }
}
