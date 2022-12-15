<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
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
            'name' => 'required|string',
            'booking_date' => 'required',
            'flexibility' => 'required|exists:flexibilities,id',
            'vehicle_size' => 'required|exists:vehicle_sizes,id',
            'contact_number' => 'required|string|max:14',
            'email_address' => 'required|string',
        ];
    }
}
