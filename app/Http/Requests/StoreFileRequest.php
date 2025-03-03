<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFileRequest extends FormRequest
{

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
        return [
            'files.*'=> 'required|mimes:png,jpg,jpeg,svg,pdf|max:5120'
        ];
    }

    public function messages(){
        return [

            'radi file ramro haal muji'        ];
    }
}
