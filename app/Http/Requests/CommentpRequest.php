<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentpRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'commentp.title' => 'required|string|max:4000',
            'commentp.body' => 'required|string|max:4000',
        ];
    }
}
