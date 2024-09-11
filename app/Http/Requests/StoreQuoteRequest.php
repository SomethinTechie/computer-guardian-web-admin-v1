<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuoteRequest extends FormRequest
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
            'user_id' => ['required'],
            'device' => ['required'],
            'description' => ['required'],
            'make' => ['required'],
            'ram' => ['required'],
            'model' => ['required'],
            'processor' => ['required'],
            'storage' => ['required'],
            'is_collection' => ['required'],
            'is_dropoff' => ['sometimes'],
            'pickup' => ['sometimes'],
            'pickup_date' => ['sometimes'],
            'pickup_time' => ['sometimes'],
            'is_collection' => ['required'],
            'status' => ['required'],
        ];
    }
}
