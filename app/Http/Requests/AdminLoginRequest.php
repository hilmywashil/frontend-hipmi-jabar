<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AdminLoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }

    public function authenticate(): void
    {
        $credentials = $this->getCredentials();

        if (!Auth::guard('admin')->attempt($credentials, $this->boolean('remember'))) {
            throw ValidationException::withMessages([
                'username' => __('Kredensial yang Anda masukkan tidak sesuai.'),
            ]);
        }
    }

    protected function getCredentials(): array
    {
        $username = $this->input('username');

        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
            return [
                'email' => $username,
                'password' => $this->input('password'),
            ];
        }

        return [
            'username' => $username,
            'password' => $this->input('password'),
        ];
    }
}