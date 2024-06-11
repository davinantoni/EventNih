<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'Title' => 'required|unique:events',
            'EventType_id' => 'required',
            'City' => 'required',
            'Location' => 'required',
            'Date' => 'required',
            'Price' => 'required|numeric',
            'Description' => 'required|min:20',
            'Start_time' => 'required',
            'End_time' => 'required',
            'Seat' => 'required|integer',
            'OrganizerName' => 'required',
            'OrganizerEmail' => 'required|email',
            'OrganizerPhoneNumber' => 'required|string|max:20',
        ];
    }

    public function attributes()
    {
        return [
            'Title' => 'Title',
            'City' => 'City',
            'Location' => 'Location',
            'Date' => 'Date',
            'Price' => 'Price',
            'Description' => 'Description',
            'Seat' => 'Seat',
            'EventType_id' => 'Category',
            'Start_time' => 'Start Time',
            'End_time' => 'End Time',
            'OrganizerName' => 'Name',
            'OrganizerEmail' => 'Email',
            'OrganizerPhoneNumber' => 'Phone Number'
        ];
    }
}
