<?php

namespace App\Http\Controllers;

use App\Exports\FamilyCardExport;
use App\Http\Requests\FamilyCardRequest;
use App\Imports\FamilyCardImport;
use App\Models\FamilyCard;
use App\Models\Villager;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class FamilyCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $families = FamilyCard::with('villagers')->get();

        if (request()->get('villager_id') && request()->get('villager_id') != null) {
            $families = $families->where('villager_id', '=', request()->get('villager_id'));
        }

        return view('pages.family.index')->with([
            'families' => $families
        ]);
    }

    public function filterreset()
    {
        return redirect()->route('family.index');
    }

    public function export()
    {
        return Excel::download(new FamilyCardExport, 'Familycard.xlsx');
    }

    public function import()
    {
        return view('pages.family.import');
    }

    public function storeImport(Request $request)
    {
        $this->validate($request, [
            'excel' => 'required|file'
        ]);

        Excel::import(new FamilyCardImport, $request->file('excel'));

        return redirect()->route('family.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patriarches = Villager::where([['kinship', 'kepala'], ['status', 'ada']])->get();
        return view('pages.family.create')->with([
            'patriarches' => $patriarches
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FamilyCardRequest $request)
    {
        $image_file = $this->uploadImage($request->file('family_photo'));

        $request->merge([
            'image' => $image_file
        ]);

        // $data = $request->all();

        // $item = Villager::findOrFail($request->villager_id);
        // $item->family_card_id = $request->family_card_id;
        // $item->save();

        // FamilyCard::create($data);
        FamilyCard::create($request->all());

        return redirect()->route('family.index')->with('success', 'Tambah data berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $families = FamilyCard::find($id);
        $familiars = Villager::where('family_card_id',$id)->get();
        
        return view('pages.family.show')->with([
            'families' => $families,
            'familiars' => $familiars
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
        $patriarches = Villager::get();
        $families = FamilyCard::with('villagers')->find($id);
        return view('pages.family.edit')->with([
            'families' => $families,
            'patriarches' => $patriarches
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FamilyCardRequest $request, $id)
    {
        $data = FamilyCard::findOrFail($id);

        $data->update($request->all());
        return redirect()->route('family.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FamilyCard::whereId($id)->delete();

        return redirect()->route('family.index');
    }

    public function uploadImage($image)
    {
        $new_name_image = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('upload_image'), $new_name_image);
        return $new_name_image;
    }
}
