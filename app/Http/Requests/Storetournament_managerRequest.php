<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Storetournament_managerRequest extends FormRequest
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
            'agency'=>'required',
            'agency_tel'=>'required',
            'agency_email'=>'required',
            'manager_name'=>'required',
            'manager_tel'=>'required',
            'manager_email'=>'required',
            'coordinator_name'=>'required',
            'coordinator_tel'=>'required',
            'coordinator_email'=>'required',
            'coordinator_line'=>'required',
            'date'=>'required',
            'coordinator_address'=>'required',
        ];
    }
}
