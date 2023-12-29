<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'bahan_id' => 'required|exists:bahans,id', // Ensure bahan_id exists in bahans table
            'warna_id' => 'required|exists:warnas,id', // Ensure warna_id exists in warnas table
            'ukuran_id' => 'required|exists:ukurans,id', // Ensure ukuran_id exists in ukurans table
        ];
    }
}
