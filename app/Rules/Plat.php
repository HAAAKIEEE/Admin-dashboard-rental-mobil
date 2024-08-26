<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Plat implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
       // Check if the value is required
       if (is_null($value) || $value === '') {
        $fail('The :attribute field is required.');
        return;
    }

    // Check if the value is a string
    if (!is_string($value)) {
        $fail('The :attribute must be a string.');
        return;
    }

    // Check if the value exceeds 255 characters
    if (strlen($value) > 255) {
        $fail('The :attribute may not be greater than 255 characters.');
        return;
    }

    // Regular expression to match the format DA 1234 ABC
    if (!preg_match('/^[A-Za-z]{1,2} \d{1,4} [A-Za-z]{1,3}$/', $value)) {
        $fail('The :attribute must be in the format DA 1234 ABC.');
    }
    }
}
