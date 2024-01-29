<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class CurrencyConvertRequest extends FormRequest
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
            'coin' => 'required|regex:/^[A-Z0-9-_.]{1,10}$/i',
            'amount' => 'decimal:0,18|gt:0',
        ];
    }

    protected function prepareForValidation()
    {
        if (!$this->wantsJson()) {
            return;
        }
        if ($this->has('amount')) {
            $this->merge(['amount' => $this->query('amount')]);
        }
        $this->merge(['coin' => Arr::last($this->segments())]);
    }
}
