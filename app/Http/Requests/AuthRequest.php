<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class AuthRequest extends FormRequest
{
    protected User $user;

    public function __construct()
    {
        $this->user = new User();
    }
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return $this->user->getRules();
    }

    public function messages(): array
    {
        return [
            'email.required' => __('user.validation.email'),
            'password.required' => __('user.validation.password'),
        ];
    }
}
