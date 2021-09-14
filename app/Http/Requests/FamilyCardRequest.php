<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FamilyCardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'family_number' => 'required|numeric|min:16',
            'villager_id'   => 'required|numeric',
            'address'       => 'required',
            'village'       => 'required',
            'sub_district'  => 'required',
            'district'      => 'required',
            'province'      => 'required',
            'postal_code'   => 'required|numeric',
            'family_photo'  => 'required'
        ];
    }

    public function messages()
    {
        return [
            'family_number.required'=> 'Nomor KK wajib di isi',
            'family_number.min'     => 'Nomor KK minimal 16 karakter',
            'family_number.numeric' => 'Nomor KK harus di isi dengan angka',
            'villager_id.required'  => 'Kepala keluarga harus di isi',
            'villager_id.numeric'  => 'Kepala keluarga harus di isi',
            'address.required'      => 'Alamat wajib di isi',
            'village.required'      => 'Desa wajib di isi',
            'sub_district.required' => 'Kecamatan wajib di isi',
            'district.required'     => 'Kabupaten/Kota wajib di isi',
            'province.required'     => 'Provinsi wajib di isi',
            'postal_code.required'  => 'Kode Pos wajib di isi',
            'postal_code.numeric'   => 'Kode Pos harus di isi dengan angka',
            'family_photo.required' => 'Foto KK wajib di isi'
        ];
    }
}
