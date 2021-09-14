<?php

namespace App\Http\Controllers;

use App\Http\Requests\FamiliarRequest;
use App\Models\FamilyCard;
use App\Models\Villager;
use Illuminate\Http\Request;

class FamiliarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $families = FamilyCard::findOrFail($id);
        
        return view('pages.family.familiar.create')->with([
            'families' => $families,
        ]);
    }

    // public function createExists($id)
    // {
    //     $families = FamilyCard::findOrFail($id);
    //     $familiars = Villager::where('family_card_id', $id)->first();

    //     return view('pages.family.familiar.create_exists')->with([
    //         'families' => $families,
    //         'familiars' => $familiars
    //     ]);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FamiliarRequest $request, $id)
    {
        {
        $image_file = $this->uploadImage($request->file('id_photo'));

        $request->merge([
            'image' => $image_file
        ]);

        Villager::create($request->all());

        return redirect()->route('family.show', $id)->with('success', 'Berhasil menambah anggota keluarga');
    }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function uploadImage($image)
    {
        $new_name_image = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('upload_image'), $new_name_image);
        return $new_name_image;
    }
}
