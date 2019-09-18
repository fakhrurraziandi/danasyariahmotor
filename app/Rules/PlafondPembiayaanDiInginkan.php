<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PlafondPembiayaanDiInginkan implements Rule
{

    public $data;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
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
        echo $plafond_pembiayaan_diinginkan = (int) $value;
        echo '<br />';
        echo $plafond_pembiayaan_disetujui = (int) $this->data->plafond_pembiayaan_disetujui;

        die();

        if($plafond_pembiayaan_diinginkan >= $plafond_pembiayaan_disetujui){
            return false;
        }else{
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
        return '"Nilai Pembiayaan Yang Di Inginkan" tidak boleh lebih besar dari "Nilai Cair Maksimal Yang Di Terima".';
    }
}
