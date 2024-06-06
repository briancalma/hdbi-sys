<?php

namespace App\Http\Requests\Inspector;

use App\Constants\Roles;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->hasRole(Roles::INSPECTOR);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            // 'email' => 'required|email|unique:users,email',
            'role' => 'required|string|in:Real Estate Agent',
            'password' => 'nullable|string|min:8|confirmed',
        ];
    }
}
