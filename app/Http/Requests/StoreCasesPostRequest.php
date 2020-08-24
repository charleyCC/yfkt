<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCasesPostRequest extends FormRequest
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
            'title'=>'required',
            'remark'=>'required',
            'file'=>'image'
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'remark' => '摘要',
            'file'=>'上传文件',
        ];
    }
}
