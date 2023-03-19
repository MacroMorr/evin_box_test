<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MobileNumberRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return preg_match('/^\d{11}$/', $value);
    }

    /**
     * Get the validation error message.
     * @return string
     */
    public function message()
    {
        return 'Номер телефона должен состоять из 11 цифр!';
    }
}
