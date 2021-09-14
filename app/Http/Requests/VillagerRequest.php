<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VillagerRequest extends FormRequest
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
            'id_number'     => 'required|min:16',
            'name'          => 'required|max:255',
            'age'           => 'required|numeric',
            'birth_date'    => 'required|date',
            'birth_place'   => 'required|string',
            'gender'        => 'required',
            'blood_type'    => 'required',
            'address'       => 'required',
            'religion'      => 'required',
            'marital_status'=> 'required',
            'citizenship'   => 'required',
            'education'     => 'required',
            'parent'        => 'required',
            'id_photo'      => 'required'
        ];
    }

    public function messages()
    {
        return [
            'id_number.required'    => 'NIK wajib di isi',
            'id_number.min'         => 'NIK minimal 16 karakter',
            'id_number.numeric'     => 'NIK harus di isi dengan angka',
            'name.required'         => 'Nama wajib di isi',
            'age.required'          => 'Usia wajib di isi',
            'gender.required'       => 'Tanggal Lahir wajib di isi',
            'birth_date.required'   => 'Tanggal lahir wajib di isi',
            'birth_place.required'  => 'Tempat lahir di isi',
            'blood_type.required'   => 'Tempat Lahir wajib di isi',
            'address.required'      => 'Provinsi wajib di isi',
            'religion.required'     => 'Kode Pos wajib di isi',
            'marital_status.required'   => 'Status perkawinan',
            'citizenship.required'  => 'Kewarganegaraan wajib di isi',
            'education.required'    => 'Pendidikan di isi',
            'parent.required'       => 'Orang Tua wajib di isi',
            'id_photo.required'     => 'foto KTP wajib di isi'
        ];
    }
}
