<?php

namespace App\Http\Requests\Laboratories;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLabRequest extends FormRequest
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
            'user_id'       => 'required|int',
            'week_no'       => 'required|int',
            'title'         => 'required|string',
            'description'   => 'required|string',
            'file'          => 'nullable|file',
            'questions'     => 'nullable|string',
            'labs'          => 'nullable|string',
        ];
    }
}
