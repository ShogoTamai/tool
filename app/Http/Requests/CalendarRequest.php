<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalendarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'calendar.companyId' => 'required',
            'calendar.start' => 'required|date',
            'calendar.end' => 'required|date|after_or_equal:calendar.start',
        ];
    }
}
