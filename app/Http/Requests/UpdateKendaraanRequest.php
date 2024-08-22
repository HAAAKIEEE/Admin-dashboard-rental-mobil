<?php

namespace App\Http\Requests;

use App\Rules\Plat;
use Illuminate\Foundation\Http\FormRequest;

class UpdateKendaraanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'jenis' => 'required|string|max:255',
            'plat' => new Plat,
            'penumpang' => 'required|integer|max:10',
            'harga' => 'required|integer|max:9999999',
            'file' => 'required|file'
        ];
    }
}
