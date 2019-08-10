<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use File;

class ResumeRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        $allowed_files = ['application/pdf','application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
        if(in_array($value->getClientMimeType(), $allowed_files)){
            return true;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Only pdf/doc/docx files are allowed';
    }
}
