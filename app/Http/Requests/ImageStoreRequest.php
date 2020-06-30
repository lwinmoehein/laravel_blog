<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageStoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            //
            'image'=>'required|max:2000|mimes:jpeg,png',
            'imageable_id'=>'required|integer'
        ];
    }
}
