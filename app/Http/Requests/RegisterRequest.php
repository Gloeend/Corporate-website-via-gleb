<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed fn
 * @property mixed mn
 * @property mixed ln
 * @property mixed password
 * @property mixed username
 */
class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'username' => 'unique:users|min:5|max:31',
            'fn' => 'required|min:2',
            'ln' => 'required|min:2',
            'mn' => 'required|min:2',
            'password' => 'required|min:6|max:63|same:password_repeat',
            'password_repeat' => 'min:6',
        ];
    }
}
