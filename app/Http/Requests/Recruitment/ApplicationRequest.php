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
            'qq'            => 'required|string|max:30',
            'phone'         => 'required|string|max:30',
            'email'         => 'required|email',
            'introduction'  => 'required|string|max:1000',
            'expectation'   => 'required|string|max:1000',
            'skill'         => 'required|string|max:1000',
        ];
    }
}
