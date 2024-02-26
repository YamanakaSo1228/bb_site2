<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlayerRequest extends FormRequest
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
            'position' => 'required',
            'uniform_number' => 'required|max:99',
            'avg' => 'required|numeric|max:1',
            'era' => 'nullable|numeric|max:99',
            'player_name' => 'required | max:30',
        ];
    }
}
