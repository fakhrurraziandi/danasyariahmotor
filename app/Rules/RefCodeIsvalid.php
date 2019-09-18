<?php

namespace App\Rules;

use App\User;
use Illuminate\Contracts\Validation\Rule;

class RefCodeIsvalid implements Rule
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
        $mitra = User::where('ref_code', $value)->get();
        
        if($mitra->count()){
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Ref Code Tidak valid, harap hubungi CS kami untuk mendapatkan ref code.';
    }
}
