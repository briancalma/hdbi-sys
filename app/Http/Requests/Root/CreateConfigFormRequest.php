<?php

namespace App\Http\Requests\Root;

use App\Constants\Roles;
use Illuminate\Foundation\Http\FormRequest;

class CreateConfigFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->hasRole(Roles::ROOT);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'key' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'type' => 'required|string|in:string,integer,boolean',
        ];
    }
}
