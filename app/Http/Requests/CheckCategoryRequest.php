<?php

namespace App\Http\Requests;

use App\Rules\CheckCategoryPid;
use Illuminate\Foundation\Http\FormRequest;

class CheckCategoryRequest extends FormRequest
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
            'name' => 'sometimes|required',
            'pid' => ['sometimes','required','integer',new CheckCategoryPid($this->id)]
        ];
    }
}
