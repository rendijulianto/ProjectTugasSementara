<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuruRequest extends FormRequest
{
    private function default() {
        return [
            'nip' => ['nullable','string','min:10','max:20'],
            'nama' => ['required','string','min:3','max:50'],
            'alamat' => ['required','string','min:3','max:50'],
            'username' => ['required','string','min:3','max:50'],
            'password' => ['required','string','min:3','max:50'],
        ];
    }

    private function store() {
        $required = $this->default();
        array_push($required['nip'],'unique:guru,nip');
        array_push($required['username'],'unique:guru,username');
        return  $required;
    }


    private function update() {
        $required = $this->default();
        array_push($required['nip'],'unique:guru,nip,'.$this->guru->nip.'');
        array_push($required['username'],'unique:guru,username,'.$this->guru->username.'');
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
            'nip.unique' => 'NIP sudah terdaftar',
            'nip.min' => 'NIP minimal 10 karakter',
            'nip.max' => 'NIP maksimal 20 karakter',
            'nama.required' => 'Nama harus diisi',
            'nama.min' => 'Nama minimal 3 karakter',
            'nama.max' => 'Nama maksimal 50 karakter',
            'alamat.required' => 'Alamat harus diisi',
            'alamat.min' => 'Alamat minimal 3 karakter',
            'alamat.max' => 'Alamat maksimal 50 karakter',
            'username.required' => 'Username harus diisi',
            'username.min' => 'Username minimal 3 karakter',
            'username.max' => 'Username maksimal 50 karakter',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 3 karakter',
            'password.max' => 'Password maksimal 50 karakter',
        ];
    }
}
