<?php

namespace App\Http\Controllers;

use App\Exports\BirthExport;
use App\Imports\BirthImport;
use App\Models\Birth;
use App\Models\FamilyCard;
use App\Models\Villager;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BornController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $births = Birth::get();

        if (request()->get('id') && request()->get('id') != null) {
            $births = $births->where('id', '=', request()->get('id'));
        }

        return view('pages.birth.index')->with([
            'births' => $births
        ]);
    }

    public function filterreset()
    {
        return redirect()->route('birth.index');
    }

    public function export()
    {
        return Excel::download(new BirthExport, 'Birth.xlsx');
    }

    public function import()
    {
        return view('pages.birth.import');
    }

    public function storeImport(Request $request)
    {
        Excel::import(new BirthImport, $request->file('excel'));

        return redirect()->route('birth.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $families = FamilyCard::get();

        return view('pages.born.create')->with([
            'families' => $families
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
        $image_file = $this->uploadImage($request->file('id_photo'));

        $request->merge([
            'image' => $image_file
        ]);

        Villager::create($request->all());

        return redirect()->route('birth.index')->with('success', 'Data berhasil dibuat');
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
        $families   = FamilyCard::get();
        $births     = Birth::find($id);

        return view('pages.birth.edit')->with([
            'births'    => $births,
            'families'  => $families
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
        $data = Birth::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('birth.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Birth::whereId($id)->delete();

        return redirect()->route('birth.index')->with('success', 'Hapus data berhasil');
    }

    public function uploadImage($image)
    {
        $new_name_image = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('upload_image'), $new_name_image);
        return $new_name_image;
    }

    //unlink buat menghapus file
    public function removeImage($image)
    {
        if (file_exists('upload_image/' . $image)) {
            unlink('upload_image/' . $image);
        }
    }
}
