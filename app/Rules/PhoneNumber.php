<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PhoneNumber implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Validasi nomor telepon harus dimulai dengan +62 dan tidak menggunakan 08
        if (!preg_match('/^\+62[0-9]{9,}$/', $value)) {
            $fail('Nomor telepon harus dimulai dengan +62 dan tidak boleh menggunakan 08.');
        }
    }
}
