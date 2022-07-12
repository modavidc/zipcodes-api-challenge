<?php

namespace App\Http\Requests\ZipCodes;

use Illuminate\Foundation\Http\FormRequest;

class ImportFromTxtRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'file' => 'required|mimes:txt'
        ];
    }
}
