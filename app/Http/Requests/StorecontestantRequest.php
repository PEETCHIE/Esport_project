<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorecontestantRequest extends FormRequest
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
            // 'c_name1' => ['required'],
            // 'c_inGameName1' => ['required'],
            // 'c_email1' => ['required'],
            // 'c_tel1' => ['required'],

            // 'c_name2' => ['required'],
            // 'c_inGameName2' => ['required'],
            // 'c_email2' => ['required'],
            // 'c_tel2' => ['required'],

            // 'c_name3' => ['required'],
            // 'c_inGameName3' => ['required'],
            // 'c_email3' => ['required'],
            // 'c_tel3' => ['required'],

            // 'c_name4' => ['required'],
            // 'c_inGameName4' => ['required'],
            // 'c_email4' => ['required'],
            // 'c_tel4' => ['required'],

            // 'c_name5' => ['required'],
            // 'c_inGameName5' => ['required'],
            // 'c_email5' => ['required'],
            // 'c_tel5' => ['required']
        ];
    }
}
