<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MataPelajaranRequest extends FormRequest
{
    private function default() {
        return [
           'nama' => 'required|min:4|max:60|string',
           'id_kurikulum' => 'required|exists:kurikulum,id_kurikulum',
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
            'nama.string' => 'Nama harus berupa karakter',
            'id_kurikulum.required' => 'Kurikulum tidak boleh kosong',
            'id_kurikulum.exists' => 'Kurikulum tidak ditemukan',
        ];
    }
}
