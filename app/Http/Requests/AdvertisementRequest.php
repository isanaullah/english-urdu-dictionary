<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Advertisement;

class AdvertisementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'position' => 'required|string|in:' . implode(',', array_keys(Advertisement::getPositions())),
            'ad_code' => 'required|string',
            'status' => 'required|in:active,inactive'
        ];
    }

    /**
     * Get custom error messages for validation rules.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The advertisement name is required.',
            'name.max' => 'The advertisement name cannot exceed 255 characters.',
            'position.required' => 'Please select an advertisement position.',
            'position.in' => 'The selected position is invalid.',
            'ad_code.required' => 'The advertisement code is required.',
            'status.required' => 'Please select the advertisement status.',
            'status.in' => 'The selected status is invalid.'
        ];
    }

    /**
     * Get custom attribute names for validation errors.
     */
    public function attributes(): array
    {
        return [
            'name' => 'advertisement name',
            'position' => 'advertisement position',
            'ad_code' => 'advertisement code',
            'status' => 'advertisement status'
        ];
    }
}
