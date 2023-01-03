<?php

namespace App\Http\Requests;

use App\Models\Addon;
use App\Models\Package;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'package' => [
                'required',
                'numeric',
                Rule::exists(table: (new Package())->getTable(), column: 'id'),
            ],
            'selected_date' => Package::rules($this->package)['selected_date'],
            'selected_time' => [
                'required',
                'numeric',
                function ($attribute, $value, $fail) {
                    if (! Carbon::createFromTimestamp(timestamp: $value)) {
                        $fail('Please select a valid time');
                    }
                },
            ],
            'first_name' => [
                'required',
                'string',
                'min:3',
                'max:50',
            ],
            'last_name' => [
                'required',
                'string',
                'min:3',
                'max:50',
            ],
            'email' => [
                'required',
                'email',
                'indisposable',
                'string',
                'max:255',
            ],
            'phone' => [
                'required',
                'string',
                'max:255',
                'phone:KE',
            ],
            'terms' => [
                'required',
                'boolean',
            ],
            'addons' => ['nullable', 'sometimes', 'array'],
            'addons.*' => [
                Rule::exists(table: (new Addon())->getTable(), column: 'id'),
            ],
            'has_preferred_location' => ['nullable', 'boolean'],
            'preferred_location' => [
                'nullable',
                Rule::requiredIf(
                    fn () => $this->has_preferred_location,
                ),
                'string',
                'min:3',
            ],
            'notes' => ['nullable', 'min:5'],
            'total' => ['required', 'numeric'],
        ];
    }

    public function messages(): array
    {
        return [
            'phone' => 'The phone number is required and must be a Kenyan phone number.',
            'indisposable' => 'Disposable email addresses are not allowed.',
        ];
    }
}
