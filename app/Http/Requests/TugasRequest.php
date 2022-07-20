<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TugasRequest extends FormRequest
{
    private function default() {
       
        return [
           'judul' => 'required|min:4|max:60|string',
           'konten' => 'required|min:4|max:1000|string',
           'tanggal_tutup' => 'required|date_format:Y-m-d\TH:i',
        ];
    }

    private function store() {
        $required = $this->default();
        return  $required;
    }


    private function update() {
        $required = $this->default();
        return  $required;
    }

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
        switch ($this->method()) {
            case "POST" :
                $validate = $this->store();
                break;
            case "PATCH":
            case "PUT" :
                $validate = $this->update();
                break;
            default :
                $validate = $this->view();
        }
        return $validate;
    }
    public function messages() {
        return [
            'judul.required' => 'Judul tidak boleh kosong',
            'konten.required' => 'Content tidak boleh kosong',
            'tanggal_tutup.required' => 'Tanggal tutup tidak boleh kosong',
            'tanggal_tutup.date_format' => 'Tanggal tutup tidak valid',
            'id_jadwal.required' => 'Jadwal tidak boleh kosong',
            'id_jadwal.exists' => 'Jadwal tidak ditemukan',
        ];
    }
}
