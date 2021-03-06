<?php

namespace App\Http\Requests;

use App\Rules\CheckProductCid;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'cid'=>['required','integer',new CheckProductCid()],
            'title'=>'required',
            'remark'=>'required',
            'file'=>'required|image',
            'contents'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'cid.required' => '请先添加分类'
        ];
    }
}
