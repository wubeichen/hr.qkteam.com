<?php

namespace App\Http\Requests\Recruitment;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
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
            'name'          => 'required|string|max:10',
            'gender'        => 'required|boolean',
            'birthday'      => 'required|date',
            'school_number' => 'required|string|max:20',
            'department'    => 'required|string|max:30',
            'major'         => 'required|string|max:30',
            'qq'            => 'required|string|max:30',
            'phone'         => 'required|string|max:30',
            'email'         => 'required|email',
            'introduction'  => 'nullable|string|max:1000',
            'homepage'      => 'nullable|string|max:100',
            'github'        => 'nullable|string|max:100',
            'expectation'   => 'nullable|string|max:1000',
            'skills'        => 'nullable|array|max:100',
            'skill'         => 'nullable|string|max:1000',
        ];
    }
}
