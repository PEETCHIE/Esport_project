<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Updatecompetition_listRequest extends FormRequest
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
            //
                'competition_name' => ['required'],
                'opening_date' => ['required'],
                'end_date' => ['required'],
                'game_name' => ['required'],
                'start_date' => ['required'],
                'competition_end_date' => ['required'],
                'competition_amount' => ['required'],
                'competition_rule' => ['required'],
                'competition_type' => ['required'],
                'cl_round' => ['required'],
        ];
    }
}
