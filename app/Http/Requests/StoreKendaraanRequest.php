<?php

namespace App\Http\Requests;

use App\Rules\Plat;
use Illuminate\Foundation\Http\FormRequest;

class StoreKendaraanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true; // Set this to true to allow all requests
    }

    public function rules()
    {
        return [
            'jenis' =>['required','string','max:255'] ,
            'plat' => new Plat, // Custom rule handles required, string, and max:255
            'penumpang' => 'required|integer|max:10',
            'harga' => 'required|integer|max:9999999',
            'file' => 'required|file',
        ];
    }
}
