<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreInspectionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'surname' => 'required|string',
            'personal_code' => 'required|string|regex:/^\d{6}-\d{5}/i',
            'date' => 'required|string|date_format:d.m.Y',
            'complaints' => 'sometimes|nullable|string',
            'comorbidities' => 'sometimes|nullable|string',
            'allergies' => 'sometimes|nullable|string',
            'form' => [
                'required',
                Rule::in(['sin', 'dxt']),
            ],
        ];
    }
}
