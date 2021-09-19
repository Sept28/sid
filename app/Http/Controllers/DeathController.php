<?php

namespace App\Http\Controllers;

use App\Exports\DeathExport;
use App\Imports\DeathImport;
use App\Models\Death;
use App\Models\Villager;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class DeathController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $deaths     = Death::get();

        if (request()->get('id') && request()->get('id') != null) {
            $deaths = $deaths->where('id', '=', request()->get('id'));
        }

        return view('pages.death.index')->with([
            'deaths' => $deaths
        ]);
    }

    public function filterreset()
    {
        return redirect()->route('death.index');
    }

    public function export()
    {
        return Excel::download(new DeathExport, 'Death.xlsx');
    }

    public function import()
    {
        return view('pages.death.import');
    }

    public function storeImport(Request $request)
    {
        Excel::import(new DeathImport, $request->file('excel'));

        return redirect()->route('death.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villagers = Villager::where('status', 'ada')->get();

        return view('pages.death.create')->with([
            'villagers' => $villagers
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
        $item->status = 'meninggal';
        $item->save();

        Death::create($data);

        return redirect()->route('death.index')->with('success', 'Data berhasil dibuat');
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
        $deaths     = Death::findOrFail($id);
        $villagers  = Villager::get();

        return view('pages.death.edit')->with([
            'deaths' => $deaths,
            'villagers' => $villagers
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
        $data = Death::findOrFail($id);

        $item = Villager::findOrFail($request->villager_id);
        $item->status = 'meninggal';
        $item->save();

        $data->update($request->all());

        return redirect()->route('death.index');
    }

    public function konfirmasi($id)
    {
        alert()->warning('Peringatan !', 'Anda yakin akan menghapus data ? ')
        ->showConfirmButton(
            '<form action="' . route('death.destroy', $id) . '" method="POST">
            ' . method_field('delete') . csrf_field() . '
            <button type="submit"
                aria-label="Delete"
            >
                Hapus
            </button>
        </form>',
            '#3085d6'
        )->toHtml()
            ->showCancelButton('Batal', '#aaa')->reverseButtons();

        return back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $death = Death::whereId($id)->firstOrFail();

        $death->delete();

        Alert::success('Success', 'Data berhasil dihapus');
        return back();
    }
}
