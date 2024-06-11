<?php

namespace App\Http\Requests\RealEstateAgent;

use App\Constants\Roles;
use Illuminate\Foundation\Http\FormRequest;

class CreateOrderDetailsFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->hasRole(Roles::REAL_ESTATE_AGENT);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'order_notes' => ['required', 'string', 'max:255'],
            'order_total_rooms' => ['required', 'integer', 'min:1'],
            'order_type_id' => ['required', 'exists:order_types,id'],
            // 'order_have_second_dwelling' => ['nullable', 'string'],
            'order_dwelling_notes' => ['nullable','string', 'max:255'],
            'order_handling_time_id' => ['required', 'exists:handling_times,id'],
            'order_preferred_contact' => ['required', 'string', 'in:Self,Vendors,Office Manager'],
            'order_contact_name' => ['exclude_if:order_preferred_contact,Self','required', 'string', 'max:255'],
            'order_contact_email' => ['exclude_if:order_preferred_contact,Self','required', 'string', 'max:255'],
            'order_contact_mobile_number' => ['exclude_if:order_preferred_contact,Self','required', 'string', 'max:255'],
        ];
    }
}
