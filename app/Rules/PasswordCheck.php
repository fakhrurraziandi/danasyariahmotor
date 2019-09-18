<?php

namespace App\Rules;

use App\CsKreditMotor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Validation\Rule;

class PasswordCheck implements Rule
{
    public $user;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
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
        if(Hash::check($value, $this->user->password)){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Incorrect old password';
    }
}
