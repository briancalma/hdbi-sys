<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValueTypeMatchesTypeRule implements ValidationRule
{

    public function __construct(private $type)
    {
        //
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($this->type === 'boolean') {
            if ($value !== "true" && $value !== "false") {
                $fail('Invalid value for boolean type.');
            }
        }

        if ($this->type === 'integer') {
            if (!is_numeric($value)) {
                $fail('Invalid value for integer type.');
            }
        }
    }
}
