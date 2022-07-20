<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiswaRequest extends FormRequest
{

    private function default() {
        return [
            'nama' => 'required|min:4|max:60',
            'nis' => ['min:10', 'max:10', 'required'],
            'password' => 'required|min:6|max:60',
            'jenis_kelamin' => 'required|in:P,L',
        ];
    }

    private function store() {
        $required = $this->default();
        
        array_push($required['nis'],'unique:siswa,nis');
        return  $required;
    }


    private function update() {
        $required = $this->default();
        array_push($required['nis'],'unique:siswa,nis,'.$this->siswa->nis.'');
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
            'nis.required' => 'NIS tidak boleh kosong',
            'nis.min' => 'NIS minimal 10 karakter',
            'nis.max' => 'NIS maksimal 10 karakter',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password minimal 6 karakter',
            'password.max' => 'Password maksimal 60 karakter',
            'jenis_kelamin.required' => 'Jenis kelamin tidak boleh kosong',
            'jenis_kelamin.in' => 'Jenis kelamin harus Laki Laki atau Prempuan',
        ];
    }
}
