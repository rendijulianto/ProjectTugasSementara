<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MataPelajaranGuruRequest extends FormRequest
{
    private function default() {
        return [
            'id_guru' => ['integer','required', 'exists:guru,id_guru'],
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
            'id_guru.required' => 'Guru tidak boleh kosong',
            'id_guru.integer' => 'Guru harus berupa angka',
            'id_guru.exists' => 'Guru tidak ditemukan',
        ];
    }
}
