<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInspectionRequest extends FormRequest
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
            'has_separations' => 'sometimes',
            'almonds' => 'nullable|exists:almonds,id',
            'almonds_2' => 'nullable|exists:almonds,id',
            'mucosas' => 'nullable|exists:mucosas,id',
            'mucosas_2' => 'nullable|exists:mucosas,id',
            'nasal_breathing_throught_noses' => 'nullable|exists:nasal_breathing_throught_noses,id',
            'nasal_passages' => 'nullable|array',
            'nasal_passages.*' => 'nullable|exists:nasal_passages,id',
            'nasal_septums' => 'nullable|exists:nasal_septums,id',
            'separations' => 'nullable|array',
            'separations.*' => 'nullable|exists:separations,id',
            'throats' => 'nullable|array',
            'throats.*' => 'nullable|exists:throats,id',
            'throats_2' => 'nullable|array',
            'throats_2.*' => 'nullable|exists:throats,id',
        ];
    }
}
