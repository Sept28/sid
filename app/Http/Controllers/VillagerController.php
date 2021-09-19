<?php

namespace App\Http\Controllers;

use App\Exports\VillagerExport;
use App\Http\Requests\VillagerRequest;
use Illuminate\Http\Request;
use App\Models\FamilyCard;
use App\Models\Villager;
use App\Http\Controllers\Controller;
use App\Imports\VillagerImport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class VillagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Villager::where('status', 'ada');

        if (request()->get('name') && request()->get('name') != null) {
            $data = $data->where('name', '=', request()->get('name'));
        }

        if (request()->get('gender') && request()->get('gender') != null) {
            $data = $data->where('gender', '=', request()->get('gender'));
        }

        if (request()->get('religion') && request()->get('religion') != null) {
            $data = $data->where('religion', '=', request()->get('religion'));
        }

        if (request()->get('blood_type') && request()->get('blood_type') != null) {
            $data = $data->where('blood_type', '=', request()->get('blood_type'));
        }
        
        $villagers = $data->get();
        return view('pages.villager.index')->with([
            'villagers' => $villagers
        ]);
    }

    public function filterreset()
    {
        return redirect()->route('villager.index');
    }

    public function export()
    {
        return (new VillagerExport)->download('Villager.xlsx');
    }

    public function import()
    {
        return view('pages.villager.import');
    }

    public function storeImport(Request $request)
    {
        $this->validate($request, [
            'excel' => 'required|file'
        ]);

        Excel::import(new VillagerImport, $request->file('excel'));

        return redirect()->route('villager.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villagers = Villager::get();

        return view('pages.villager.create', compact('villagers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VillagerRequest $request)
    {
        $image_file = $this->uploadImage($request->file('id_photo'));

        $request->merge([
            'image' => $image_file
        ]);

        Villager::create($request->all());

        return redirect()->route('villager.index')->with('success', 'Posting data succes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $villagers = Villager::findOrFail($id);
        return view('pages.villager.show')->with([
            'villagers' => $villagers
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
        $villagers = Villager::find($id);
        $families = FamilyCard::get();
        return view('pages.villager.edit')->with([
            'villagers' => $villagers,
            'families' => $families
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VillagerRequest $request, $id)
    {
        $data = Villager::findOrFail($id);
        
        $data->update($request->all());
        return redirect()->route('villager.index')->with('success', 'Ubah data sukses');
    }

    public function konfirmasi($id)
    {
        alert()->warning('Peringatan !', 'Anda yakin akan menghapus data ? ')
        ->showConfirmButton(
        '<form action="'. route('villager.destroy', $id).'" method="POST">
            ' . method_field('delete') . csrf_field() . '
            <button type="submit"
                aria-label="Delete"
            >
                Hapus
            </button>
        </form>','#3085d6')->toHtml()
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
        $villager = Villager::whereId($id)->firstOrFail();

        $villager->delete();

        Alert::success('Success', 'Data berhasil dihapus');
        return back();
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
