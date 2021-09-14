<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FamiliarRequest extends FormRequest
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
            'family_number' => 'required|max:16',
            'id_number' => 'required|max:16',
            'name' => 'required|max:255',
            'age' => 'required|integer',
            'birth_date' => 'required',
            'birth_place' => 'required|string',
            'gender' => 'required',
            'blood_type' => 'required',
            'address' => 'required',
            'religion' => 'required',
            'marital_status' => 'required',
            'citizenship' => 'required',
            'education' => 'required',
            'parent' => 'required',
            'id_photo' => 'required|image',
            'kinship' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'id_number.required'    => 'Nomor KTP wajib di isi',
            'id_number.min'         => 'Nomor KTP minimal 16 karakter',
            'id_number.numeric'     => 'Nomor KTP harus di isi dengan angka',
            'family_number.required'=> 'Nomor KK wajib di isi',
            'family_number.min'     => 'Nomor KK minimal 16 karakter',
            'family_number.numeric' => 'Nomor KK harus di isi dengan angka',
            'name.required'         => 'Nama wajib di isi',
            'age.required'          => 'Usia wajib di isi',
            'birth_place.required'  => 'Tempat lahir wajib di isi',
            'birth_date.required'   => 'Tanggal lahir wajib di isi',
            'gender.required'       => 'Tanggal Lahir wajib di isi',
            'blood_type.required'   => 'Tempat Lahir wajib di isi',
            'address.required'      => 'Provinsi wajib di isi',
            'religion.required'     => 'Kode Pos wajib di isi',
            'citizenship.required'  => 'Kewarganegaraan wajib di isi',
            'education.required'    => 'Pendidikan di isi',
            'parent.required'       => 'Orang Tua wajib di isi',
            'id_photo.required'     => 'foto KTP wajib di isi',
            'kinship.required'      => 'Hubungan keluarga wajib di isi',
            'marital_status.required'   => 'Status kawin harus di isi',
        ];
    }
}
