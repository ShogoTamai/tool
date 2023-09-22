<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'company.name' => 'required|string|max:100',
            'company.body' => 'required|string|max:4000',
            'company.upload_url' => 'required|string|max:100',
        ];
    }
}
