<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KelasRequest extends FormRequest
{
    private function default() {
        return [
           'nama' => 'required|min:4|max:60',
            'tahun_ajaran' => 'required|min:9|max:9',
            'jurusan' => 'required|in:IPA,IPS',
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
            'nama.required' => 'Nama tidak boleh kosong',
            'nama.min' => 'Nama minimal 4 karakter',
            'nama.max' => 'Nama maksimal 60 karakter',
            'tahun_ajaran.required' => 'Tahun ajaran tidak boleh kosong',
            'tahun_ajaran.min' => 'Tahun ajaran minimal 9 karakter',
            'tahun_ajaran.max' => 'Tahun ajaran maksimal 9 karakter',
            'jurusan.required' => 'gJurusan tidak boleh kosong',
            'jurusan.in' => 'Jurusan tidak valid',
        ];
    }
}
