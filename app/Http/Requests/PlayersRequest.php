<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PlayersRequest extends Request
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
            // See in Validation Rules on Laravel website for more parameters
            'name'=>'required',
            'position_id'=>'required',
            'photo_id'=>'required|image|mimes:jpg,jpeg,bmp,png|max:2000|dimensions:width=500,height=600'
        ];
    }
}
