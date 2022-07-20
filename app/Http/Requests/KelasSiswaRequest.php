<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KelasSiswaRequest extends FormRequest
{private function default() {
    return [
        'id_siswa' => ['integer','required', 'exists:siswa,id_siswa'],
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
        'id_siswa.required' => 'Siswa tidak boleh kosong',
        'id_siswa.integer' => 'Siswa harus berupa angka',
        'id_siswa.exists' => 'Siswa tidak ditemukan',
    ];
}
}
