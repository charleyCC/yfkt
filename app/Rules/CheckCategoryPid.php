<?php

namespace App\Rules;

use App\Category;
use Illuminate\Contracts\Validation\Rule;

class CheckCategoryPid implements Rule
{
    private $id = 0;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        //
        $this->id = $id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
        $ids = Category::getChildsById($this->id);
        if (in_array($value,$ids)){
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.check_category_pid');
    }
}
