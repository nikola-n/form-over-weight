<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProgramMemberRequest extends FormRequest
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
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after:start_date',
            'trainer_id' => 'required|not_in:0',
            'program_id' => 'nullable',
            'gym_id'     => 'sometimes|required|not_in:0',
            'gyms_id'    => 'sometimes|required|not_in:0',
        ];
    }
}
