<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ToursCreateRequest extends Request
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
            //
            'title'=>'required',
            'price'=>'required',
            //'package'=>'required',
            'destination_id'=>'required',
            'category_id'=>'required',
            'body'=>'required',
			'myfile' => 'required',
			'myfile.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
}
