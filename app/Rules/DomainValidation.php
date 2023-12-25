<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Stancl\Tenancy\Database\Models\Domain;

class DomainValidation implements ValidationRule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function validate(string $attribute, mixed $value, Closure $fail): bool
    {
        $domain = $value;

        return Domain::where('domain', '=', $domain)->count() == 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This domain has already been taken';
    }
}
